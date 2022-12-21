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

    public $profile_photo_path;

    public $group;

    public $created_at;

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
        $this->staff = $user->is_staff;
        $this->manager = $user->is_manager;
        $this->profile_photo_path = $user->profile_photo_path;

        $gr = $this->user->groups()->get();
        $this->group = $gr[0]->name;

        $this->created_at = $user->created_at;
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.forms.show-employee-form');
    }
}
