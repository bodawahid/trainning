<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('offers.Offer') }}</title>
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
            @if (Str::endsWith(URL::current(), 'offers/trash'))
                <a href="{{ route('offers.index') }}"><button
                        class="btn btn-sm btn-outline-primary">{{ __('offers.Home') }}
                    </button></a>
            @else
                <a href="{{ route('offers.create') }}"><button
                        class="btn btn-sm btn-outline-primary">{{ __('offers.Offer Create') }}
                    </button></a>
                <a href="{{ route('offers.trash') }}"><button
                        class="btn btn-sm btn-outline-danger">{{ __('offers.Offer Trash') }}
                    </button></a>
            @endif
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
                        @if (Str::endsWith(URL::current(), 'offers/trash'))
                            <th scope="col">{{ __('Deleted_at') }}</th>
                            <th scope="col">{{ __('Restore') }}</th>
                            <th scope="col">{{ __('Permenant Delete') }}</th>
                        @else
                            <th scope="col">{{ __('created_at') }}</th>
                            <th scope="col">{{ __('Update') }}</th>
                            <th scope="col">{{ __('Delete') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if ($offers->first())
                        @foreach ($offers as $offer)
                            <tr>
                                <th scope="row">{{ $offer->id }}</th>
                                <td><img src="{{ asset('images/offers/' . $offer->image) }}" height="50"
                                        alt="this is offer image" /></td>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->description }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ $offer->features ?? ' - ' }}</td>
                                @if (Str::endsWith(URL::current(), 'offers/trash'))
                                    <td>{{ $offer->deleted_at }}</td>
                                    <td> <a href="{{ route('offers.restore', $offer->id) }}"><button
                                                class="btn btn-sm btn-outline-primary">{{ __('offers.Restore') }}
                                            </button></a></td>
                                    <td>
                                        <form action="{{ route('offers.force.delete', $offer->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger">{{ __('offers.Force Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td>{{ $offer->created_at }}</td>
                                    <td> <a href="{{ route('offers.edit', $offer->id) }}"><button
                                                class="btn btn-sm btn-outline-primary">{{ __('offers.Update') }}
                                            </button></a></td>
                                    <td>
                                        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger">{{ __('offers.Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">
                                <h3 class="text-center mt-4 mb-4">{{ __('offers.No Offers') }}</h3>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
