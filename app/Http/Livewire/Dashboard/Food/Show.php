<?php

namespace App\Http\Livewire\Dashboard\Food;

use App\Models\Food;
use Livewire\Component;

class Show extends Component
{
    public $identify;

    public function render()
    {
        $detailFood = Food::findOrFail($this->identify);
        return view('livewire.dashboard.food.show', ['data' => $detailFood]);
    }

}
