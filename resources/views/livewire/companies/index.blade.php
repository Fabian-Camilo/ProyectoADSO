<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Administrar Empresas
    </h2>
</x-slot>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
            @if (session()->has('message'))
                <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-2 border-teal-500 rounded-b shadow-md"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            {{-- @if ($isOpenArticleModal)
                @include('livewire.inventories.create')
            @endif
            @if ($isOpenDeleteModal)
                @include('livewire.inventories.delete')
            @endif --}}
            <div class="flex items-center justify-between px-4 py-3 bg-whiteborder-gray-200 sm:px-6">
                <button type="button" wire:click='openArticleModal()'
                    class="inline-flex justify-center w-full px-4 py-2 m-4 text-base font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>Nueva Empresa
                </button>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                        <input wire:model="search" class="block w-full m-1 text-sm rounded-md shadow-sm form-input"
                            type="text" placeholder="Buscar empresa...">
                        <select wire:model="perPage"
                            class="block w-auto m-1 text-sm text-gray-500 rounded-md shadow-sm outline-none form-input">
                            <option value="1">1 por página</option>
                            <option value="5">5 por página</option>
                            <option value="10">10 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                        <button wire:click='clear' class="block m-1 rounded-md shadow-sm form-input">X</button>

                        <button wire:click='download' type="button" @if (!$companies->count()) disabled @endif
                            class="flex px-4 py-2 mx-5 text-white transition-transform transform bg-green-800 rounded-md shadow-lg outline-none form-input focus:ring-4 active:scale-x-75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span class="ml-2">Excel</span>
                        </button>

                    </div>
                    @if ($companies->count())
                        <div class="p-4 overflow-hidden shadow sm:rounded-lg ">
                            <div class="overflow-x-auto">
                                <table class="min-w-full mx-1 divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                Nit
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                Página Web
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                Teléfono
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                Usuarios
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                Acción
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                                <td class="px-3 py-3 text-sm text-center text-gray-500 whitespace-nowrap">
                                                    {{ $company->id }}
                                                </td>
                                                <td class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $company->name }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $company->nit }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $company->website }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $company->email }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $company->telephone }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ count($company->users) }}
                                                        </div>
                                                        {{-- @if ($article->stock > $article->alert)
                                                            <div class="text-sm text-gray-500">
                                                                Alarma: {{ $article->alert }} {{ $article->unit }}
                                                            </div>
                                                        @else
                                                            <div class="text-sm text-red-500">
                                                                Alarma: {{ $article->alert }} {{ $article->unit }}
                                                            </div>
                                                        @endif --}}

                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-sm font-medium text-center whitespace-nowrap">
                                                    <button type="button" {{-- wire:click='edit_article({{ $company->id }})' --}}
                                                        class="px-2 py-3 text-blue-600 hover:text-blue-900">Editar</button>
                                                    <button type="button" {{-- wire:click='openDeleteModal({{ $company->id }})' --}}
                                                        class="px-2 py-3 text-red-600 hover:text-red-900">Eliminar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                {{ $companies->links() }}
                            </div>
                        </div>
                    @else
                        @if ($search)
                            <div
                                class="justify-between px-4 py-3 text-center text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                                No se encontraron resultados para la búsqueda
                                <strong>"{{ $search }}"</strong> en la página {{ $page }} al
                                mostrar {{ $perPage }} por página
                            </div>
                        @else
                            <div
                                class="justify-between px-4 py-3 text-center text-gray-500 bg-white border-t border-gray-200 sm:px-6">
                                No se encontraron resultados en la página {{ $page }} al mostrar
                                {{ $perPage }} por página
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
