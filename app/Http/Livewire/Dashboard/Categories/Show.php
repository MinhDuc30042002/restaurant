<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Models\Category;
use App\Models\Food;
use Livewire\Component;

class Show extends Component
{
    public $search = '';

    public $ident;

    private $foods;

    public $select;

    private $categories;

    public $modalDialog = ['create' => false];

    public $action = ['saved' => false];

    public function render()
    {
        $this->categories = Category::all();

        if (! isset($this->select)) {
            $this->select = $this->ident;
        }

        $this->foods = Food::whereHas('categories', function ($q) {
            $q->whereIn('category_id', [$this->select]);
        })->get();

        if ($this->search != '') {
            $this->foods = Food::where('name', 'like', '%'.$this->search.'%')->get();
        }

        sleep(0.5);

        return view('livewire.dashboard.categories.show', ['data' => $this->foods, 'list_categories' => $this->categories]);
    }

    public function showCreateModal()
    {
        return redirect('/dashboard/foods/create');
    }

    public function saveFood()
    {
        $this->validate();

        $this->action['saved'] = true;
        $this->reset();
    }
}
