@props([
    'route' => '',
    'title' => '',
    'submitLabel' => '',
    'value' => [
        'id' => '',
        'name_ar' => '',
        'name_en' => '',
        'description_en' => '',
        'description_ar' => '',
        'price' => '',
        'features_ar' => '',
        'features_en' => '',
        'image' => null,
    ],
])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    {{-- <!-- Bootstrap CSS --> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{--  jquery cdn necessary for the ajax --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <x-navbar />
    <div class="container mt-5" style="text-align: {{ config('app.locale') == 'en' ? 'left' : 'right' }}">
        <div style="text-align: {{ config('app.locale') == 'en' ? 'right' : 'left' }}">
            <a href="{{ route('offers.index') }}"><button class="btn btn-sm btn-outline-primary">{{ __('offers.Home') }}
                </button></a>
        </div>
        <h2>{{ $title }}</h2>
        {{-- div trail --}}
        <div class="alert alert-success" style="display: none;" id="success_div">
            {{ __('تم تحديث العنصر بنجاح') }}
        </div>
        <form id="myForm" method="POST" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @if (Str::endsWith($route, 'offers/' . $value['id']))
                @method('put')
            @endif
            {{-- to send only the id --}}
            <input name="id" type="text" value="{{ $value['id'] }}" hidden>
            <x-input name="name_ar" label="{{ __('offers.Offer Name Ar') }}" :value="$value" />
            <x-input name="name_en" label="{{ __('offers.Offer Name En') }}" :value="$value" />
            <x-input name="description_ar" label="{{ __('offers.Offer Description Ar') }}" :value="$value" />
            <x-input name="description_en" label="{{ __('offers.Offer Description En') }}" :value="$value" />
            <x-input name="price" type="number" step="0.01" label="{{ __('offers.Offer Price') }}"
                :value="$value" />
            <x-input name="image" type="file" accept="image/*" label="{{ __('offers.Offer Image') }}"
                :value="$value" />
            <img class="mt-3 mb-3" src="{{ asset('images/offers/' . $value['image']) }}" height="50"
                {{ $value['image'] ?? 'hidden' }} />
            <x-input name="features_ar" label="{{ __('offers.Offer Features Ar') }}" :value="$value" />
            <x-input name="features_en" label="{{ __('offers.Offer Features En') }}" :value="$value" />

            <button id="AjaxId" class="btn btn-primary mt-2 mb-2">{{ $submitLabel }}</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    {{-- @stack('scripts') --}}
</body>

</html>
