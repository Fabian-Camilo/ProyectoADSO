<div class="p-12">
    <div class="w-full flex items-center justify-center">
        <div
            class="xl:w-1/3 sm:w-1/2 w-full 2xl:w-1/4 flex flex-col items-center py-16 md:py-12 bg-gradient-to-r from-gray-100 to-gray-200 rounded-lg shadow-lg">
            <div class="w-full flex items-center justify-center">
                <div class="flex flex-col items-center">
                    <img tabindex="0" class="focus:outline-none my-4"
                        src="https://www.ateam.com.co/wp-content/uploads/2021/08/logo_300.png"
                        alt={{ $company->name }} />
                    <p tabindex="0"
                        class="focus:outline-none mt-2 text-3xl md:text-2xl break-normal font-bold text-center text-gray-900 uppercase">
                        {{ $company->name }}
                    </p>
                    <p tabindex="0"
                        class="focus:outline-none mt-2 text-l md:text-base font-semibold break-normal text-center text-gray-900 uppercase">
                        <strong>Nit: </strong>{{ $company->nit }}
                    </p>
                </div>
            </div>
            <div class="my-6 w-full flex items-center justify-center">
                <div class="flex flex-col items-center">
                    <p tabindex="0"
                        class="focus:outline-none mt-2 text-l md:text-base font-semibold break-normal text-center text-gray-900 uppercase">
                        Datos del Certificado
                    </p>
                </div>
            </div>
            <table class="border-collapse min-w-full mx-1 divide-y divide-gray-200">
                <tbody>
                    <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-10 py-3 font-medium text-left whitespace-nowrap">
                            <div class="text-sm font-medium font-bold text-gray-900">
                                Certificado:
                            </div>
                        </td>
                        <td class="px-10 py-3 font-medium text-right whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $certificate->code }}
                            </div>
                        </td>
                    </tr>
                    <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-10 py-3 font-medium text-left whitespace-nowrap">
                            <div class="text-sm font-medium font-bold text-gray-900">
                                Valido desde:
                            </div>
                        </td>
                        <td class="px-10 py-3 font-medium text-right whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ date_format(date_create($certificate->valid_since), 'Y-m-d') }}
                            </div>
                        </td>
                    </tr>
                    <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-10 py-3 font-medium text-left whitespace-nowrap">
                            <div class="text-sm font-medium font-bold text-gray-900">
                                Valido hasta:
                            </div>
                        </td>
                        <td class="px-10 py-3 font-medium text-right whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ date_format(date_create($certificate->valid_until), 'Y-m-d') }}
                            </div>
                        </td>
                    </tr>
                    @if (count($elements))
                        @foreach ($elements as $key => $item)
                            <tr class="py-10 border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-10 py-3 font-medium text-left whitespace-nowrap">
                                    <div class="text-sm font-medium font-bold text-gray-900">
                                        {{ $item["name"] }}
                                    </div>
                                </td>
                                <td class="px-10 py-3 font-medium text-right whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $item["value"] }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="w-full flex justify-center mt-7">
                <div class="flex flex-col">
                    <button
                        class="text-xl block mx-2 mt-5 bg-white transition duration-150 ease-in-out hover:bg-gray-100 hover:text-green-600 rounded border border-green-800 text-green-800 px-8 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-green-800">
                        Contactar Empresa
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
