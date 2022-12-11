<?php

namespace App\Http\Livewire\Dashboard\Checkout;

use Livewire\Component;

class Secondstep extends Component
{
    public function render()
    {
        return view('livewire.dashboard.checkout.secondstep');
    }

    protected function secondStepSubmit()
    {
        $wizard = new Wizard();
        $wizard->secondStepSubmit();
    }
}
