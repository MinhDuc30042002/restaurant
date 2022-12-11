<?php

namespace App\Http\Livewire\Dashboard\Checkout;

use Livewire\Component;

class Firststep extends Component
{
    public $slot;

    public function render()
    {
        return view('livewire.dashboard.checkout.firststep');
    }

    protected function firstStepSubmit()
    {
        $wizard = new Wizard();
        $wizard->firstStepSubmit();
    }
}
