<?php

namespace App\Http\Livewire\Dashboard\Group;

use Livewire\Component;
use App\Models\Group;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showMore = 10;

    protected $listeners = ['resetPage' => 'resetPage'];

    public function getGroup()
    {
        $groups = Group::with('permissions');
        return $groups->paginate($this->showMore);
    }

    public function buttonShowMore(){
        $this->showMore = $this->showMore + 5;
    }

    public function render()
    {
        return view('livewire.dashboard.group.index',[
            'groups' => $this->getGroup(),
        ]);
    }
}
