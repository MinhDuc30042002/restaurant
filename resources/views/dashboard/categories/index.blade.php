<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:dashboard.categories.index :categories="$categories" />
            </div>
        </div>
    </div>

    @push('modals')
        <script>
            const modalButton = document.getElementById('modalButton')
            const ruleDialog = document.getElementById('dialog')
            const cancle = document.getElementById('cancle')
            const btn_delete = document.querySelectorAll('.btn-delete')

            modalButton.addEventListener('click', async () => {
                ruleDialog.style.display = "block"
            })

            cancle.addEventListener('click', async () => {
                ruleDialog.style.display = "none"
            })

            btn_delete.forEach(btn => {
                btn.addEventListener('click', async () => {
                    const id = btn.dataset.id
                    Livewire.emit('removeCategory', id);
                })
            });
        </script>
    @endpush
</x-app-layout>
