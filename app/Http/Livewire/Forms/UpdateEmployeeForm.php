<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
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

    public $is_manager;

    public $is_staff;

    protected $listeners = ['showUpdateUserForm' => 'show'];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
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
        $validatedData = $this->validate();
        Log::debug($validatedData);
        $this->user->update($validatedData);
    }

    public function show(User $user)
    {
        $this->authorize('update', $user);
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_manager = $user->is_manager;
        $this->is_staff = $user->is_staff;
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.forms.update-employee-form');
    }
}
