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
            <?php $base = base64_encode(app(\App\Services\QrService::class)->generateQrWithLogo('http://www.simplesoftware.io', Auth::user()->company->logo_photo_path, 300, 0.3)); ?>
            <img src="data:image/png;base64, {!! $base !!}">
        </a>

    </div>
</x-slot>
