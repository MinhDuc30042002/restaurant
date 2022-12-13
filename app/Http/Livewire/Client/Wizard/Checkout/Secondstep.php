<?php

namespace App\Http\Livewire\Client\Wizard\Checkout;

use Livewire\Component;

class Secondstep extends Component
{
    public function render()
    {
        return view('livewire.client.wizard.checkout.secondstep');
    }

    protected function secondStepSubmit()
    {
        $wizard = new Wizard();
        $wizard->secondStepSubmit();
    }
}
