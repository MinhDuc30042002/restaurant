<?php

namespace App\Http\Livewire\Dashboard\Group;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{

    public function getGroup()
    {
        $users = User::with('groups')->get();
        return $users;
    }

    public function render()
    {
        return view('livewire.dashboard.group.index',[
            'users' => $this->getGroup(),
        ]);
    }
}
