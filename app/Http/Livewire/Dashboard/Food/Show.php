<?php

namespace App\Http\Livewire\Dashboard\Food;

use App\Models\Category;
use App\Models\Food;
use Livewire\Component;

class Show extends Component
{
    public $identify;
    public Food $fillable;

    public function render()
    {
        $this->fillable = Food::findOrFail($this->identify);
        $list_categories = Category::all();
        return view('livewire.dashboard.food.show', ['data' => $this->fillable, 'list_categories' => $list_categories]);
    }

    protected $rules = [
        'fillable.name'               => 'required',
        'fillable.price'              => 'required',
        'fillable.available_quantity' => 'required',
        'fillable.category'           => 'required',
        'fillable.image'              => 'required'
    ];
}
