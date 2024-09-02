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
    <div class="container mt-5">
        <h2>{{ ucfirst(config('app.name')) }}</h2>
        <form method="POST" action="{{ route('offers.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                    placeholder="Enter Offer Name">
                <x-error name='name' />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputPassword1"
                    placeholder="Enter Offer Description">
                <x-error name='description' />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="number" step='0.01' name="price" class="form-control" id="exampleInputPassword1"
                    placeholder="Enter Offer price">
                <x-error name='price' />
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
