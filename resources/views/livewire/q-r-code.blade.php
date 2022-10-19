<x-slot name="header">
    <div class="card-body text-center">
        {{-- {!! QrCode::generate('http://www.simplesoftware.io') !!}
        {{-- {{!!QrCode::format('png')->merge('https://cdn-icons-png.flaticon.com/512/263/263100.png', .3, true)->generate('http://www.simplesoftware.io');!!}} --}}
        <hr><br><br>
        {{ Storage::path('public/' . Auth::user()->company->logo_photo_path) }}
        <br>{{--
        {{Auth::user()->company->logo_photo_path}}
        {!! QrCode::format('png')->mergeString(Storage::get(asset('storage/' . Auth::user()->company->logo_photo_path)), 0.3)->generate() !!}
         --}}

         <a class="border-2 text-center" download="sinamet.png" href="QRSINAMET" title="QRSINAMET">
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

    </div>
</x-slot>
