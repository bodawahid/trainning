<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Bootstrap Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <x-navbar />
    <div class="container mt-5" style="text-align: {{ config('app.locale') == 'en' ? 'left' : 'right' }}">
        <h2>{{ __('offers.Offer Create') }}</h2>
        <form method="POST" action="{{ route('offers.store') }}">
            @csrf
            <x-input name="name_ar" label="{{ __('offers.Offer Name Ar') }}" />
            <x-input name="name_en" label="{{ __('offers.Offer Name En') }}" />
            <x-input name="description_ar" label="{{ __('offers.Offer Description Ar') }}" />
            <x-input name="description_en" label="{{ __('offers.Offer Description En') }}" />
            <x-input name="price" type="number" step="0.01" label="{{ __('offers.Offer Price') }}" />
            <x-input name="features_ar" label="{{ __('offers.Offer Features Ar') }}" />
            <x-input name="features_ar" label="{{ __('offers.Offer Features En') }}" />

            <button type="submit" class="btn btn-primary mt-2 mb-2">{{ __('offers.submit') }}</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
