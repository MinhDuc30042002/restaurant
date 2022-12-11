@switch($currentStep)
    @case(1)
        <livewire:dashboard.checkout.firststep />
    @break

    @case(2)
        <livewire:dashboard.checkout.secondstep />
    @break

    @default
@endswitch
