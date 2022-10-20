<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-gray-200 rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-7xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <!--content-->
            <div class="w-auto">
                <section class="w-auto py-1 bg-blueGray-50 ">
                    <div class="w-auto px-4 mx-auto mt-6 lg:w-11/12">
                        <div
                            class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-white">
                            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                                <div class="flex justify-between text-center">
                                    <h6 class="text-xl font-bold text-blueGray-700">
                                        {{ $this->certificate_id ? 'Modificar Certificado' : 'Crear Certificado' }}
                                    </h6>
                                    <button wire:click='closeModal()'
                                        class="inline-flex px-4 py-2 mr-1 text-s font-bold text-white uppercase transition-all duration-150 ease-linear bg-red-600 rounded shadow outline-none active:bg-red-800 hover:shadow-md focus:outline-none"
                                        type="button">
                                        X
                                    </button>
                                </div>
                            </div>
                            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                                <form>
                                    <h6 class="mt-3 mb-6 text-s font-bold uppercase text-blueGray-400">
                                        Información Certificado
                                    </h6>
                                    <div class="flex flex-wrap">
                                        <div class="w-full px-4 lg:w-4/12">
                                            <div class="relative w-full mb-3">
                                                <label class="block mb-2 text-s font-bold uppercase text-blueGray-600">
                                                    Código
                                                </label>
                                                <input {{-- wire:keydown.enter="search_code()" --}} wire:model='code' type="text"
                                                    class="w-full px-3 py-3 text-s transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                                                    placeholder="Ej: Código del Certificado">
                                                @error('code')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="w-full px-4 lg:w-4/12">
                                            <div class="relative w-full mb-3">
                                                <label class="block mb-2 text-s font-bold uppercase text-blueGray-600">
                                                    Válido Desde
                                                </label>
                                                <input wire:model='valid_since' type="date"
                                                    class="w-full px-3 py-3 text-s uppercase transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">
                                                @error('valid_since')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="w-full px-4 lg:w-4/12">
                                            <div class="relative w-full mb-3">
                                                <label class="block mb-2 text-s font-bold uppercase text-blueGray-600">
                                                    Válido Hasta
                                                </label>
                                                <input wire:model='valid_until' type="date"
                                                    class="w-full px-3 py-3 text-s uppercase transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">
                                                @error('valid_until')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mt-6 border-b-1 border-blueGray-300">

                                    <h6 class="mt-3 mb-2 text-s font-bold uppercase text-blueGray-400">
                                        Información Extra
                                    </h6>
                                    <label class="block mb-4 text-s text-gray-600">
                                        Agrega los campos personalizados para incluir en tu certificado
                                    </label>
                                    <div class="flex flex-wrap">
                                        <div class="w-full px-4 lg:w-12/12">
                                            <div class="relative w-full mb-3">
                                                <label class="block mb-2 text-s font-bold uppercase text-blueGray-900">
                                                    Nombre del Campo
                                                </label>
                                                <span class="text-gray-600">
                                                    Indica que nombre del campo vas a incluir en tu certificado
                                                </span>
                                                <input type="text" wire:model='element.name'
                                                    class="w-full px-3 py-3 text-s transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                                                    @if ($element['type'] == 'text') placeholder="Ejemplo: Emitido Para"
                                                    @elseif ($element['type'] == 'number') placeholder="Ejemplo: Total Muestras"
                                                    @else placeholder="Ejemplo: Fecha próxima calibración" @endif>
                                                @error('element.name')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="w-full px-4 lg:w-6/12">
                                            <div class="relative w-full mb-3">
                                                <label class="block mb-2 text-s font-bold uppercase text-blueGray-600">
                                                    Tipo del Campo
                                                </label>
                                                <span class="text-gray-600">
                                                    Selecciona el tipo de campo que vas a incluir en tu certificado
                                                </span>
                                                <select wire:model='element.type'
                                                    class="w-full px-3 py-3 text-s transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">
                                                    <option selected value="text">Texto</option>
                                                    <option value="number">Número</option>
                                                    <option value="date">Fecha</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full px-4 lg:w-6/12">
                                            <div class="relative w-full mb-3">
                                                <label class="block mb-2 text-s font-bold uppercase text-blueGray-600">
                                                    Valor del Campo
                                                </label>
                                                <span class="text-gray-600">
                                                    Indica el valor del campo vas a incluir en tu certificado
                                                </span>
                                                <input type={{ $element['type'] }} wire:model='element.value'
                                                    class="w-full px-3 py-3 text-s transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring"
                                                    @if ($element['type'] == 'text') placeholder="Ejemplo: EMPRESA ABC"
                                                    @elseif ($element['type'] == 'number') placeholder="Ejemplo: 80" @endif>
                                                @error('element.value')
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="w-full px-4 mb-6 mx-auto text-center md:w-12/12">
                                            <button type="button" wire:click='addElement()'
                                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-s sm:leading-5">
                                                Agregar Campo
                                            </button>
                                        </div>
                                        @if (count($elements))
                                            <table class="border-collapse min-w-full mx-1 divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                            Nombre
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                            Valor
                                                        </th>
                                                        <th scope="col"
                                                            class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                            Acción
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($this->elements as $key => $item)
                                                        <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                                            <td
                                                                class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    <input type="text"
                                                                        wire:model='elements.{{ $key }}.name'
                                                                        class="w-full px-3 py-3 text-s transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">

                                                                </div>
                                                            </td>
                                                            <td
                                                                class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    <input type={{ $item["type"] }} required
                                                                        wire:model='elements.{{ $key }}.value'
                                                                        class="w-full px-3 py-3 text-s transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring">

                                                                </div>
                                                            </td>
                                                            <td
                                                                class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                                <button type="button" wire:click='deleteElement({{$key}})'
                                                                    class="px-2 py-3 text-red-600 hover:text-red-900">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                      </svg>
                                                                       Eliminar
                                                                      </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <footer class="relative pt-8 pb-6 mt-2">
                            <div class="container px-4 mx-auto">
                                <div class="flex flex-wrap items-center justify-center md:justify-between">
                                    <div class="w-full px-4 mx-auto text-center md:w-6/12">
                                        <button type="button" wire:click='store()'
                                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-s sm:leading-5">
                                            Guardar
                                        </button>
                                    </div>
                                    <div class="w-full px-4 mx-auto text-center md:w-6/12">
                                        <button type="button" wire:click='closeModal()'
                                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-green sm:text-s sm:leading-5">
                                            Cancelar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </section>
            </div>
            <!--content-->
        </div>

    </div>
</div>
