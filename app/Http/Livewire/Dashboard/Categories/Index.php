<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $category = [];
    public $saved = false;

    public $action = ['saved' => false];

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
            [
                'data' => Category::withCount('foods')->orderByDesc('id')->paginate(5)
            ]
        );
    }

    public function showModal()
    {
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
        $this->validate();

        Category::create(['name' => $this->name]);
        $this->modalDialog = false;
        $this->reset();
        $this->action['saved'] = true;
    }

    protected function hiddenSaved()
    {
        $this->action['saved'] = false;
    }

    public function showFood($id)
    {
        return redirect('/dashboard/food/category/' . $id);
    }

    public function removeCategory($id)
    {
        Category::destroy($id);
    }

    protected function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'The :attribute cannot be empty.'
        ];
    }

    protected function attributes()
    {
        return [
            'name' => 'Địa chỉ email'
        ];
    }
}
