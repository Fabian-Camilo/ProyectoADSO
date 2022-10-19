<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <!--content-->
        <div class="">
            <!--body-->
            <div class="justify-center flex-auto p-5 text-center ">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex items-center w-4 h-4 mx-auto -m-1 text-red-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="flex items-center w-16 h-16 mx-auto text-red-500" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                <h2 class="py-4 text-xl font-bold ">¿Estas Seguro?</h3>
                    <p class="px-8 text-sm text-gray-500">Se eliminará el certificado y toda la información de este, no podras descargar nuevamente su código QR</p>
            </div>
        <!--footer-->
            <div class="p-3 mt-2 space-x-4 text-center md:block">
                <button wire:click="$set('isOpenDeleteModal', false)"
                    class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-gray-600 bg-white border rounded-md shadow-sm md:mb-0 hover:shadow-lg hover:bg-gray-100">
                    Cancelar
                </button>
                <button wire:click="delete()"
                    class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-md shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">Eliminar</button>
            </div>
        </div>
        </div>

    </div>
</div>
