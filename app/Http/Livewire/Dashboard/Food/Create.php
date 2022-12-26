<?php

namespace App\Http\Livewire\Dashboard\Food;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $categories;

    public $fillable = [];

    public $action = ['saved' => false];

    public function render()
    {
        $this->categories = Category::all();

        return view('livewire.dashboard.food.create', ['list_categories' => $this->categories]);
    }

    public function modelData()
    {
        return [
            'name' => $this->fillable['name'],
            'price' => $this->fillable['price'],
            'available_quantity' => $this->fillable['available_quantity'],
            'description' => $this->fillable['description'] ?? '',
        ];
    }

    public function saveFood()
    {
        $this->validate();

        $this->fillable['image']->storeAs('images/upload', $this->fillable['image']->getClientOriginalName());
        $result = [...$this->modelData(), 'image' => $this->fillable['image']->getClientOriginalName()];

        $category = Category::find($this->fillable['category']);
        $category->foods()->create($result);

        $this->action['saved'] = true;
        session()->flash('success', 'Add item successfully');
        $this->reset();
    }

    protected $rules = [
        'fillable.name' => 'required',
        'fillable.price' => 'required|max:6',
        'fillable.available_quantity' => 'required',
        'fillable.category' => 'required',
        'fillable.image' => 'required',
    ];

    protected $messages = [
        'fillable.name.required' => ':attribute không được bỏ trống.',
        'fillable.price.required' => ':attribute không được bỏ trống.',
        'fillable.available_quantity.required' => ':attribute không được bỏ trống.',
        'fillable.category.required' => 'Chọn :attribute.',
        'fillable.image.required' => 'Chọn :attribute.',
    ];

    protected $validationAttributes = [
        'fillable.name' => 'Tên món ăn',
        'fillable.price' => 'Giá món ăn',
        'fillable.available_quantity' => 'Số lượng món ăn',
        'fillable.category' => 'thể loại món ăn',
        'fillable.image' => 'Hình ảnh',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
