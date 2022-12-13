<?php

namespace App\Http\Livewire\Client\Wizard\Checkout;

use Livewire\Component;

class Firststep extends Component
{
    public $slot;

    public function render()
    {
        return view('livewire.client.wizard.checkout.firststep');
    }

    protected function firstStepSubmit()
    {
        $wizard = new Wizard();
        $wizard->firstStepSubmit();
    }
}
