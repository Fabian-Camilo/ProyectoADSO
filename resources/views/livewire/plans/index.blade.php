<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Nuestros Planes') }}
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

            <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                <button wire:click="create()" type="button"
                    class="inline-flex justify-center w-full px-4 py-2 m-4 text-base font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>{{ __('Nuevo Plan') }}
                </button>
            </div>
            @if ($isOpen)
                @include('livewire.plans.create')
            @endif
            {{-- @if ($isOpenTotals)
            @include('livewire.stores.create_total')
            @endif
            @if ($isOpenDeleteTotal)
            @include('livewire.stores.delete_total')
            @endif
            @if ($isOpenDeleteStore)
            @include('livewire.stores.delete_store')
            @endif --}}
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="flex flex-col flex-wrap justify-center gap-3 mt-2 md:flex-row">
                            {{-- inicia --}}
                            <div class="antialiased w-full h-full bg-gray text-black-400 font-inter p-10">
                                <div class="container px-4 mx-auto">
                                    <div>
                                        <div id="title" class="text-center my-10">
                                            <h1 class="font-bold text-3xl text-black">Nuestros Planes</h1>
                                            <p class="text-light text-gray-500 text-xl">
                                                Acá encontraras la información de nuestros planes
                                            </p>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-evenly gap-10 pt-10">
                                            @if ($plans->count())
                                                @foreach ($plans as $plan)
                                                    <div id="plan"
                                                        class="rounded-lg text-center overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
                                                        <div id="title"
                                                            class="w-full py-5 border-b border-gray-800">
                                                            <h2 class="font-normal text-3xl text-black">
                                                                {{ $plan->name }}</h2>
                                                            <h2 class="font-bold text-blue-500 text-3xl mt-2">
                                                                $ {{ number_format($plan->price, 0, ',', '.') }}
                                                                <sup><small> COP</small></sup>
                                                            </h2>
                                                        </div>
                                                        <div id="content" class="">
                                                            <div id="icon" class="my-5">
                                                                @if ($plan->svg)
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-12 w-12 mx-auto fill-stroke text-blue-600"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="1"
                                                                            d="{{ $plan->svg }}" />
                                                                    </svg>
                                                                @endif
                                                                <p class="text-gray-800 pt-2">
                                                                    $
                                                                    {{ number_format($plan->price / $plan->duration, 0, ',', '.') }}
                                                                    <sup><small> COP</small></sup> /Mes
                                                                </p>
                                                            </div>
                                                            <div id="contain"
                                                                class="leading-8 mb-10 text-lg font-light">
                                                                <ul>
                                                                    <li>{{ $plan->duration }} {{ __('Meses') }}</li>
                                                                    <li>Certificados Ilimitados<small>*</small></li>
                                                                    <li>Consultas Ilimitadas<small>*</small></li>
                                                                    <li>Soporte Ilimitado<small>*</small></li>
                                                                    <li>Hasta 3 Usuarios por Empresa</li>
                                                                </ul>
                                                                <p class="text-gray-400 text-sm pt-2">
                                                                    <small>*durante la vigencia del plan</small>
                                                                </p>
                                                                <div id="choose" class="w-full mt-10 px-6">
                                                                    <a href="#"
                                                                        class="w-full text-white block bg-blue-500 font-medium text-xl py-4 rounded-xl hover:shadow-lg transition duration-200 ease-in-out hover:bg-blue-900">Elegir</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>{{-- termina --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
