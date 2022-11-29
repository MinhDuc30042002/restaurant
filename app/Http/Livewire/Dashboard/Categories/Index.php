<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $categories;
    public $name;
    public $message;

    public string $search = '';
    protected $listeners = ['removeCategory'];

    use WithPagination;

    public function render()
    {
        return view('livewire.dashboard.categories.index');
    }

    public function removeCategory($id)
    {
        Category::destroy($id);
        $this->emit('removeCategory', $id);
        $this->message = 'Đã xóa thành công';
    }
}
