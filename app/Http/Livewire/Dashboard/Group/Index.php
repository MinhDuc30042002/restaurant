<?php

namespace App\Http\Livewire\Dashboard\Group;

use Livewire\Component;
use App\Models\Group;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['resetPage' => 'resetPage'];

    public function getGroup()
    {
        $groups = Group::with('permissions');
        return $groups->paginate(10);
    }

    public function render()
    {
        return view('livewire.dashboard.group.index',[
            'groups' => $this->getGroup(),
        ]);
    }
}
