<?php

namespace App\Http\Livewire\Dashboard\Checkout;

use Livewire\Component;

class Wizard extends Component
{
    public $currentStep = 1;

    public function render()
    {
        return view('livewire.dashboard.checkout.wizard');
    }

    public function firstStepSubmit()
    {
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $this->currentStep = 4;
    }

    public function submitForm()
    {
        $this->currentStep = 1;
    }

    public function clearForm()
    {
        $this->reset();
    }
}
