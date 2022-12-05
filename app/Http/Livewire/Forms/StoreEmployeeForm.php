<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

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

    public $is_manager = 0;

    public $is_staff = 0;

    protected $listeners = ['showStoreUserForm' => 'show'];

    protected function rules()
    {
        return [
            'firstname' => 'required|string|max:50',
            'lastname' =>  'required|string|max:50',
            'phone_number' => ['required','numeric', 'digits:10'],
            'address' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'is_staff' => '',
            'is_manager' => '',
        ];
    }

    protected $messages = [
        'firstname.required' => ':attribute không được bỏ trống',
        'lastname.required' => ':attribute không được bỏ trống',
        'phone_number.phone_number' => ':attribute không được bỏ trống',
        'address' => ':attribute không được bỏ trống',
        'email.required' => ':attribute không được bỏ trống',
        'email.unique' => ':attribute này đã được sử dụng',
        'email.email' => ':attribute không đúng',
    ];

    protected $validationAttributes = [
        'firstname' => 'Họ',
        'lastname' => 'Tên',
        'phone_number' => 'Số điện thoại',
        'address' => 'Địa chỉ',
        'email' => 'Địa chỉ mail'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create', User::class);
        $validatedData = $this->validate();
        User::create([...$validatedData, 'name' => $this->firstname.' '.$this->lastname,'password' => 'password']);
        $this->open = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Thêm thanhg công']);
        $this->emitUp('resetPage');
    }

    public function show()
    {
        $this->reset();
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.forms.store-employee-form');
    }
}
