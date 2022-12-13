@switch($currentStep)
    @case(1)
        <livewire:client.wizard.checkout.firststep />
    @break

    @case(2)
        <livewire:client.wizard.checkout.secondstep />
    @break

    @default
@endswitch
