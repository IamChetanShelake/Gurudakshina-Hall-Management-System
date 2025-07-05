@extends('admin.layout.masteradmin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


<body>
    <div class="container my-5">
        <h1 class="my-3">Accessorie Details</h1>


        {{-- <a href="/view" class="btn btn-primary my-3">View Product</a> --}}

        <!-- Loop through products and display each one -->
        {{-- <div>
            <a class="btn btn-primary" href="/OpenUpdate">Edit service</a>
        </div> --}}

        <div class="card mb-4">
            <div class="card-body">

                <h5 class="card-title">Accessorie Name: {{ $accessorie->name }}</h5>
                <p><strong>Quantity :</strong> {{ $accessorie->quantity}}</p>
                <p><strong>Price :</strong> {{ $accessorie->price }}</p>
                <p><strong>Hours :</strong> {{ $accessorie->hours}}</p>

            </div>
        </div>
        <a href="/accessories" class="btn btn-outline-secondary px-4">Back</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYzTZbU4UugTxvyhDQPlzNF6BfSUi1zHyh+kc3Cq3NfNmo" crossorigin="anonymous"></script>
</body>


@endsection
