<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-8 text-2xl">
        Bienvenido, <strong>{{ Auth::user()->name }}</strong>!
        <br><br>
        <div class="bg-white rounded-3xl border shadow-xl p-8 w-100">
            <div class="flex justify-between items-center mb-4">

                    <img class="h-20 w-auto"
                        src="{{ asset('storage/' . Auth::user()->company->logo_photo_path) }}"
                        alt="{{ Auth::user()->company->name }}">
                <div>
                    <span
                        class="font-bold text-green-500">{{ Auth::user()->company->certificates->count() }}</span><br />
                    <span class="font-medium text-xs text-gray-500 flex justify-end">Total Certificados</span>
                </div>
            </div>
        </div>
    </div>

    <hr class="p-2">
</div>
