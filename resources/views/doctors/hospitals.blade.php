<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Hospital') }}</title>
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
        {{-- <div style="text-align: {{ config('app.locale') == 'en' ? 'right' : 'left' }}">
            @if (Str::endsWith(URL::current(), 'hospitals/trash'))
                <a href="{{ route('hospitals.index') }}"><button
                        class="btn btn-sm btn-outline-primary">{{ __('hospitals.Home') }}
                    </button></a>
            @else
                <a href="{{ route('hospitals.create') }}"><button
                        class="btn btn-sm btn-outline-primary">{{ __('hospitals.hospital Create') }}
                    </button></a>
                <a href="{{ route('hospitals.trash') }}"><button
                        class="btn btn-sm btn-outline-danger">{{ __('hospitals.hospital Trash') }}
                    </button></a>
            @endif
        </div> --}}
        <h2 class="mb-4" style="text-align: {{ config('app.locale') == 'en' ? 'left' : 'right' }}">
            {{ __('Hospitals') }}</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">
                            {{ __('Address') }}
                        </th>
                        <th scope="col">
                            {{ __('Created at') }}
                        </th>
                        <th>
                            Doctors Number
                        </th>
                        <th> Show Doctors</th>
                        {{-- <th scope="col">{{ __('hospitals.hospital Price') }}</th>
                        <th scope="col">
                            {{ __('hospitals.hospital Features ' . ucfirst(LaravelLocalization::getCurrentLocale())) }}</th>
                        @if (Str::endsWith(URL::current(), 'hospitals/trash'))
                            <th scope="col">{{ __('Deleted_at') }}</th>
                            <th scope="col">{{ __('Restore') }}</th>
                            <th scope="col">{{ __('Permenant Delete') }}</th>
                        @else
                            <th scope="col">{{ __('created_at') }}</th>
                            <th scope="col">{{ __('Update') }}</th>
                            <th scope="col">{{ __('Delete') }}</th>
                        @endif --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($hospitals->first())
                        @foreach ($hospitals as $hospital)
                            <tr>
                                <th scope="row">{{ $hospital->id }}</th>
                                {{-- <td><img src="{{ asset('images/hospitals/' . $hospital->image) }}" height="50" --}}
                                {{-- alt="this is hospital image" /></td> --}}
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->address }}</td>
                                {{-- <td>{{ $hospital->price }}</td> --}}
                                {{-- <td>{{ $hospital->features ?? ' - ' }}</td> --}}
                                {{-- @if (Str::endsWith(URL::current(), 'hospitals/trash'))
                                    <td>{{ $hospital->deleted_at }}</td>
                                    <td> <a href="{{ route('hospitals.restore', $hospital->id) }}"><button
                                                class="btn btn-sm btn-outline-primary">{{ __('hospitals.Restore') }}
                                            </button></a></td>
                                    <td>
                                        <form action="{{ route('hospitals.force.delete', $hospital->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger">{{ __('hospitals.Force Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td>{{ $hospital->created_at }}</td>
                                    <td> <a href="{{ route('hospitals.edit', $hospital->id) }}"><button
                                                class="btn btn-sm btn-outline-primary">{{ __('hospitals.Update') }}
                                            </button></a></td>
                                    <td>
                                        <form action="{{ route('hospitals.destroy', $hospital->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger">{{ __('hospitals.Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                @endif --}}
                                <td>{{ $hospital->created_at }}</td>
                                <td>{{ $hospital->doctors->count() }}</td>
                                <td><a href="{{ route('hospitals.doctors', $hospital->id) }}"><button
                                            class="btn btn-sm btn-outline-primary">Show Doctors</button></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">
                                <h3 class="text-center mt-4 mb-4">{{ __('hospitals.No hospitals') }}</h3>
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
