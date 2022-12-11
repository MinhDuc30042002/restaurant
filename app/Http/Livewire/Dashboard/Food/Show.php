<?php

namespace App\Http\Livewire\Dashboard\Food;

use App\Models\Category;
use App\Models\Food;
use Livewire\Component;

class Show extends Component
{
    public $identify;

    public function render()
    {
        return view('livewire.dashboard.food.show');
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
    {
        return [
            $this->food['name'] = $this->foodDetail->name,
            $this->food['price'] = $this->foodDetail->price,
            $this->food['image'] = $this->foodDetail->image,
            $this->food['description'] = $this->foodDetail->description
        ];
    }

}
