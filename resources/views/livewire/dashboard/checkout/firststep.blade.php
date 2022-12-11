<x-wizard.firststep>
    @section('box')
        <div class="mt-10 pt-6 border-t border-gray-200 sm:flex sm:items-center sm:justify-between">
            <button wire:click='firstStepSubmit'
                class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 block w-full sm:ml-6 sm:order-last sm:w-auto">
                Phương thức vận chuyển
            </button>
            <a href="https://demo.cartify.dev/cart"
                class="flex items-center justify-center mt-4 text-sm text-gray-500 sm:mt-0 sm:text-left hover:text-gray-700">
                <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg> Quay lại giỏ hàng
            </a>
        </div>
    @endsection
</x-wizard.firststep>
