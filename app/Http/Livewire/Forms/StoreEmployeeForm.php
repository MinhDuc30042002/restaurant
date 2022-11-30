<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class StoreEmployeeForm extends Component
{
    use AuthorizesRequests;

    public $open = false;

    public $name;

    public $email;

    public $is_manager;

    public $is_staff;

    protected $listeners = ['showStoreUserForm' => 'show'];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'is_staff' => '',
            'is_manager' => '',
        ];
    }

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create', User::class);
        $validatedData = $this->validate();
        User::create([...$validatedData, 'password' => 'password']);
    }

    public function show()
    {
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.forms.store-employee-form');
    }
}
