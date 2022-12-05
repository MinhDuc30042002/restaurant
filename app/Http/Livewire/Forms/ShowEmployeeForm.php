<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Livewire\Component;

class ShowEmployeeForm extends Component
{
    public $maxWidth = '3xl';

    public $open = false;

    public $user;
    public $name;
    public $firstname;
    public $lastname;
    public $email;
    public $phone_number;
    public $gender;
    public $address;
    public $staff;
    public $manager;

    protected $listeners = ['showUserForm' => 'show'];

    public function show(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->gender = $user->gender;
        $this->address = $user->address;
        $this->staff = $user->staff;
        $this->manager = $user->manager;
        $this->open = true;
    }


    public function render()
    {
        return view('livewire.forms.show-employee-form');
    }
}
