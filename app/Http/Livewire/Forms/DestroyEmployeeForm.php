<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DestroyEmployeeForm extends Component
{
    use AuthorizesRequests;

    public $open = false;

    public $user;

    protected $listeners = ['showDestroyUserForm' => 'show'];

    public function submit()
    {
        $this->authorize('delete', $this->user);
        $this->user->delete();
        $this->open = false;
        $this->emitUp('resetPage');
    }

    public function show(User $user)
    {
        $this->user = $user;
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.forms.destroy-employee-form');
    }
}
