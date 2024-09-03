@props([
    'route' => '',
    'title' => '',
    'submitLabel' => '',
    'value' => [
        'name_ar' => '',
        'name_en' => '',
        'description_en' => '',
        'description_ar' => '',
        'price' => '',
        'features_ar' => '',
        'features_en' => '',
        'image' => '',
    ],
])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @if (!Str::endsWith($route, '/offers'))
                @method('put')
            @endif
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

            <button type="submit" class="btn btn-primary mt-2 mb-2">{{ $submitLabel }}</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
