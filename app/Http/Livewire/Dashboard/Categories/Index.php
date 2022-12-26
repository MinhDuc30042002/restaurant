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

    public $modalDelete;

    public $name;

    public $tempID;

    public string $search = '';

    use WithPagination;

    public function render()
    {
        return view(
            'livewire.dashboard.categories.index',
            [
                'data' => Category::withCount('foods')->orderByDesc('id')->paginate(5),
            ]
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
        $validatedData = $this->validate();
        Category::where('id', '=', $this->tempID)->update($validatedData);
        $this->modalDialog = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => 'Cập nhật '.$this->name.' thành công']);
        $this->reset();
    }

    public function storeCategory()
    {
        $this->validate();

        Category::create(['name' => $this->name]);
        $this->modalDialog = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Đã thêm thể loại '.$this->name.' thành công']);
        $this->reset();
        $this->action['saved'] = true;
    }

    protected function hiddenSaved()
    {
        $this->action['saved'] = false;
    }

    public function showFood($id)
    {
        return redirect(route('food.index').'?categories[0]='.$id);
    }

    public function delete(){
        Category::destroy($this->tempID);
        $this->modalDelete = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Đã xóa thành công']);
    }

    public function removeCategory($id)
    {
        $this->modalDelete = true;
        $this->tempID = $id;

    }

    protected function rules()
    {
        return [
            'name' => 'required|max:50|min:3',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => ':attribute không được bỏ trống',
            'name.max' => ':attribute quá dài tối đa :max kí tự',
            'name.min' => ':attribute quá ngắn',
        ];
    }

    protected $validationAttributes = [
        'name' => 'Tên thể loại',
    ];
}
