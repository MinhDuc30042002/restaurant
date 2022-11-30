<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $category = [];

    public $modalDialog;
    public $modalUpdate;

    public $name;
    public $tempID;

    public string $search = '';
    use WithPagination;

    public function render()
    {
        return view(
            'livewire.dashboard.categories.index',
            ['data' => Category::paginate(5)]
        );
    }

    public function showModal()
    {
        $this->reset();
        $this->modalDialog = true;
    }

    public function showModalUpdate($id)
    {
        $this->modalUpdate = true;
        $category = Category::find($id);
        $this->name = $category->name;
        $this->tempID = $id;
    }

    public function updateCategory()
    {
        Category::where('id', '=', $this->tempID)->update(['name' => $this->name]);
        $this->modalDialog = false;
        $this->reset();
    }

    public function storeCategory()
    {
        Category::create(['name' => $this->name]);
        $this->modalDialog = false;
        $this->reset();
    }

    public function removeCategory($id)
    {
        Category::destroy($id);
    }
}
