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

    public $name;

    protected $listeners = ['showDestroyUserForm' => 'show'];

    public function submit()
    {
        $this->authorize('delete', $this->user);
        $this->user->delete();
        $this->open = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Đã xóa '.$this->name.' thành công']);
        $this->emitUp('resetPage');
    }

    public function show(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.forms.destroy-employee-form');
    }
}
