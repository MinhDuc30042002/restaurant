<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use App\Models\Group;
use App\Mail\MailCreateAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Str;

class StoreEmployeeForm extends Component
{
    use AuthorizesRequests;

    public $maxWidth = '3xl';

    public $open = false;

    // public $name;

    public $firstname;

    public $lastname;

    public $phone_number;

    public $address;

    public $email;

    public $gender;

    public $is_manager = 0;

    public $is_staff = 0;

    public $group_id;

    protected $listeners = ['showStoreUserForm' => 'show'];

    protected function rules()
    {
        return [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'address' => 'required',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'group_id' => 'required',
            'is_staff' => '',
            'is_manager' => '',
        ];
    }

    protected $messages = [
        'firstname.required' => ':attribute không được bỏ trống',
        'firstname.max' => ':attribute quá dài, tối đa 50 kí tự',
        'lastname.required' => ':attribute không được bỏ trống',
        'lastname.max' => ':attribute quá dài, tối đa 50 kí tự',
        'phone_number.phone_number' => ':attribute không được bỏ trống',
        'address.required' => ':attribute không được bỏ trống',
        'gender.required' => ':attribute không được bỏ trống',
        'group_id.required' => ':attribute không được bỏ trống',
        'email.required' => ':attribute không được bỏ trống',
        'email.unique' => ':attribute này đã được sử dụng',
        'email.max' => ':attribute quá dài, tối đa 255 kí tự',
        'email.email' => ':attribute không đúng',
    ];

    protected $validationAttributes = [
        'firstname' => 'Họ',
        'lastname' => 'Tên',
        'phone_number' => 'Số điện thoại',
        'gender' => 'Giới tính',
        'address' => 'Địa chỉ',
        'email' => 'Địa chỉ mail',
        'group_id' => 'Chức vụ',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create', User::class);
        $validatedData = $this->validate();
        // dd($validatedData);
        $name = $this->firstname.' '.$this->lastname;
        $password = Str::random(8);
        $hashed_random_password = Hash::make($password);
        $group = Group::find($this->group_id);
        $group->users()->create([...$validatedData, 'name' => $name, 'password' => $hashed_random_password]);        $this->open = false;
        Mail::to($this->email)->send(new MailCreateAccount($name, $password, $group->name));
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thêm thành công']);
        $this->emitUp('resetPage');
    }

    public function show()
    {
        $this->reset();
        $this->open = true;
    }

    public function render()
    {   $list_group = Group::all();
        return view('livewire.forms.store-employee-form', [ 'list_group' => $list_group,]);
    }
}
