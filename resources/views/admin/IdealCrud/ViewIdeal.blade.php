@extends('admin.layout.masteradmin')
@section('content')

<body>
        <div class="container my-5">
            <h1 class="my-3">Ideal For Details</h1>

            <a class="btn btn-primary" href="/">Check In the Website</a>
            {{-- <a href="/view" class="btn btn-primary my-3">View Product</a> --}}

            <!-- Loop through products and display each one -->
            {{-- <div>
                <a class="btn btn-primary" href="/OpenUpdate">Edit service</a>
            </div> --}}

            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Contact Title:-</strong> {{ $contact->title   }}</p>
                    <p><strong>Description:-</strong> {!! $contact->description   !!}</p>

                    {{-- <p><strong>Image:</strong></p>
                    @if(isset($about) && $about->image)
                    <img src="{{ asset('images/' . $about->image) }}" class="img-fluid" alt="service Image" style="max-width: 400px; height: auto;">
                    @else
                        <p>No Image Available</p>
                    @endif --}}
                    {{-- <div class="mt-3">
                        <a href="{{route('Edit.Service',$service->id)}}" class="btn btn-warning">Update service</a>
                    </div>--}}
                </div>
            </div>
            <a href="/admincontacts" class="btn btn-outline-secondary px-4">Back</a>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYzTZbU4UugTxvyhDQPlzNF6BfSUi1zHyh+kc3Cq3NfNmo" crossorigin="anonymous"></script>
    </body>


@endsection


