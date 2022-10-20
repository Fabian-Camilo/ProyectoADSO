<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-4 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <!--content-->
            <div class="pt-4">
                <!--body-->
                <div>
                    <h2 class="text-gray-800 leading-tight text-center">
                        Código qr certificado <strong>{{$certificate->code}}</strong>
                    </h2>
                    @if ($certificate)
                        <a download={{$certificate->code.".png"}} href="{{$this->qr_image}}" title="Clic para Descargar">
                        <img style="max-width: 300px; display:block; margin:auto;" src="{{$this->qr_image}}">
                        </a>
                    @endif
                    <h2 class="text-sm text-gray-500 leading-tight text-center">
                        Clic en la imagen para descargar
                    </h2>
                </div>
                <!--footer-->
                <div class="p-3 mt-2 space-x-4 text-center md:block">
                    <button wire:click="$set('isOpenQrModal', false)"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-md shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">Cerrar</button>
                </div>
            </div>
        </div>

    </div>
</div>
