<?php

namespace App\Http\Livewire\Dashboard\Food;

use App\Models\Category;
use App\Models\Food;
use Livewire\Component;

class Show extends Component
{
    public $identify;

    public $fillable = array();

    public $foodDetail;

    public function render()
    {

        return view('livewire.dashboard.food.show',[
            'list_categories' => Category::all(),
        ]);
    }

    public function mount()
    {
        $this->foodDetail = Food::findOrFail($this->identify);
        $this->modelData();
    }

    public function displayDialog()
    {
        $this->displayModal = true;
    }

    public function hiddenDialog()
    {
        $this->displayModal = false;
    }

    public function destroyFood($id)
    {
        dd($id);
    }

    public function updateFood($id)
    {
        Food::find($id)->update($this->fillable());
        $this->action['updated'] = true;
        session()->flash('success', 'Updated item successfully');
    }

    public function modelData()
    {    $categories = $this->foodDetail->categories()->get();
         $category = $categories[0]->id;
        return [

            $this->fillable['name'] = $this->foodDetail->name,
            $this->fillable['price'] = $this->foodDetail->price,
            $this->fillable['image'] = $this->foodDetail->image,
            $this->fillable['description'] = $this->foodDetail->description,
            $this->fillable['category'] = $category
        ];
    }

}
