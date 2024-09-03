<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <x-navbar />
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <div style="text-align: {{ config('app.locale') == 'en' ? 'right' : 'left' }}">
            <a href="{{ route('offers.create') }}"><button
                    class="btn btn-sm btn-outline-primary">{{ __('offers.Offer Create') }}
                </button></a>
        </div>
        <h2 class="mb-4" style="text-align: {{ config('app.locale') == 'en' ? 'left' : 'right' }}">
            {{ __('offers.Offer') }}</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('offers.Offer Image') }}</th>
                        <th scope="col">
                            {{ __('offers.Offer Name ' . ucfirst(LaravelLocalization::getCurrentLocale())) }}</th>
                        <th scope="col">
                            {{ __('offers.Offer Description ' . ucfirst(LaravelLocalization::getCurrentLocale())) }}
                        </th>
                        <th scope="col">{{ __('offers.Offer Price') }}</th>
                        <th scope="col">
                            {{ __('offers.Offer Features ' . ucfirst(LaravelLocalization::getCurrentLocale())) }}</th>
                        <th scope="col">{{ __('Update') }}</th>
                        <th scope="col">{{ __('Delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr>
                            <th scope="row">{{ $offer->id }}</th>
                            <td><img src="{{ asset('images/offers/' . $offer->image) }}" height="50"
                                    alt="this is offer image" /></td>
                            <td>{{ $offer->name }}</td>
                            <td>{{ $offer->description }}</td>
                            <td>{{ $offer->price }}</td>
                            <td>{{ $offer->features ?? ' - ' }}</td>
                            <td> <a href="{{ route('offers.edit', $offer->id) }}"><button
                                        class="btn btn-sm btn-outline-primary">{{ __('offers.Update') }}
                                    </button></a></td>
                            <td> <a href="{{ route('offers.destroy', $offer->id) }}"><button
                                        class="btn btn-sm btn-outline-danger">{{ __('offers.Delete') }}
                                    </button></a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
