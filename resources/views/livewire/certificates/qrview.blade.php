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
                    @if ($certificate)
                        <a download={{$certificate->code."png"}} href="{{$certificate->code."png"}}" title="Click para descargar">
                            <img src="data:image/png;base64,
                            {!! base64_encode(
                             QrCode::format('png')
                             ->size(300)
                             ->mergeString(Storage::get('public/' . Auth::user()->company->logo_photo_path), 0.3)
                             ->errorCorrection('H')
                             ->margin(5)
                             ->generate('http://www.simplesoftware.io'),
                            ) !!}
                            ">
                        </a>
                        <a download={{$certificate->code."png"}} href="{{$certificate->code."png"}}" title="Click para descargar">
                            <img src="data:image/png;base64,
                            {!! base64_encode(
                             QrCode::format('png')
                             ->size(300)
                             ->mergeString(Storage::get('public/' . Auth::user()->company->logo_photo_path), 0.3,true)
                             ->errorCorrection('H')
                             ->margin(5)
                             ->generate('http://www.simplesoftware.io'),
                            ) !!}
                            ">
                        </a>
                    @endif

                </div>
                <!--footer-->
                <div class="p-3 mt-2 space-x-4 text-center md:block">
                    <button wire:click="$set('isOpenQrModal', false)"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-gray-600 bg-white border rounded-md shadow-sm md:mb-0 hover:shadow-lg hover:bg-gray-100">
                        Cerrar
                    </button>
                    <button wire:click="delete()"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-md shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">Descargar</button>
                </div>
            </div>
        </div>

    </div>
</div>
