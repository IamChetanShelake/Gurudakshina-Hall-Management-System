@extends('admin.layout.masteradmin')

@section('content')

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center text-primary mb-3">{{ $hall->name }}</h2>

        <div class="mb-3">
            <h5><strong>Sub Title:-</strong> {{ $hall->short_description }}</h5>
            <h5><strong>Capacity:-</strong> {{ $hall->capacity }}</h5>
            <h5><strong>Area:-</strong> {{ $hall->area }}</h5>
            <h5><strong>Price:-</strong> {{ $hall->price ? $hall->price : "Not Available Right now" }}</h5>
            <h5><strong>Main Image:-</strong></h5>

            <img src="{{ asset("Hall_images/$hall->image") }}" class="card-img-top" alt="Hall Image" style="width: 400px; height: 200px; object-fit: cover;">
        </div>

        <h4 class="text-center mb-3">Hall Images</h4>

        @if($hall->images->count() > 0)
        <div class="row">
            @foreach($hall_images as $image)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('Hall_images/' . $image->image_path) }}" class="card-img-top" alt="Hall Image">
                    <div class="card-body text-center">
                        {{-- <form action="{{ route('hall.images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-muted">No images available for this hall.</p>
        @endif

        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('halls.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
</div>

@endsection
