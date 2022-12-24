<?php

namespace App\Http\Livewire\Dashboard\Food;

use App\Models\Category;
use App\Models\Food;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    public $search;

    public $loadMore = 5;

    public $selectedCategories = [];

    protected $queryString = [
        'selectedCategories' => ['as' => 'categories'],
        'search' => ['as' => 'q'],
    ];

    public function render()
    {
        $categories = Category::all();

        return view('livewire.dashboard.food.index', [
            'data' => $this->getFoods(),
            'list_categories' => $categories,
        ]);
    }

    public function getFoods()
    {
        $foods = Food::where(function ($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        });
        if ($this->selectedCategories) {
            $foods = Food::whereHas('categories', function ($query) {
                return $query->whereIn('category_id', $this->selectedCategories);
            });
        }

        return $foods->paginate($this->loadMore);
    }

    public function loadMoreFoods(){
        $this->loadMore = $this->loadMore + 5;
    }

    public function showCreateModal()
    {
        return redirect(route('food.create'));
    }
}
