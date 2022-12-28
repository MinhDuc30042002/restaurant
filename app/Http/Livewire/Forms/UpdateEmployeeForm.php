<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use App\Models\Group;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateEmployeeForm extends Component
{
    use AuthorizesRequests;

    public $open = false;

    public $user;

    public $name;

    public $email;

    public $address;

    public $phong_number;

    public $gender;

    public $group_id;

    public $is_manager;

    public $is_staff;

    protected $listeners = ['showUpdateUserForm' => 'show'];

    protected function rules()
    {
        return [
            'firstname' => 'required|string|max:50',
            'lastname' =>  'required|string|max:50',
            'phone_number' => ['required','numeric', 'digits:10'],
            'address' => 'required',
            'group_id' => 'required',
            'gender' => '',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
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
        'group.required' => ':attribute không được bỏ trống',
        'gender.required' => ':attribute không được bỏ trống',
        'email.required' => ':attribute không được bỏ trống',
        'email.unique' => ':attribute này đã được sử dụng',
        'email.max' => ':attribute quá dài, tối đa 255 kí tự',
        'email.email' => ':attribute không đúng',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $validationAttributes = [
        'firstname' => 'Họ',
        'lastname' => 'Tên',
        'phone_number' => 'Số điện thoại',
        'group_id' => 'Chức vụ',
        'gender' => 'Giới tính',
        'address' => 'Địa chỉ',
        'email' => 'Địa chỉ mail'
    ];

    public function submit()
    {
        $validatedData = $this->validate();
        Log::debug($validatedData);
        $groupId = (int)$this->group_id;
        $this->user->update([...$validatedData, 'name' => $this->firstname.' '.$this->lastname]);
        $this->user->groups()->sync([$groupId]);
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => 'Cập nhật '.$this->name.'  thành công']);
        $this->open = false;
        $this->emitUp('resetPage');
    }

    public function show(User $user)
    {
        $this->authorize('update', $user);
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->address = $user->address;

        $gr = $this->user->groups;
        if ($gr->count()) {
            $this->group_id = $gr[0]->id;
        }

        $this->phone_number = $user->phone_number;
        $this->gender = $user->gender;
        $this->is_manager = $user->is_manager;
        $this->is_staff = $user->is_staff;
        $this->open = true;
    }

    public function render()
    {
        $list_group = Group::all();
        return view('livewire.forms.update-employee-form', ['list_group' => $list_group]);
    }
}
