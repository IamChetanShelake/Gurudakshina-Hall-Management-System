@extends('admin.layout.masteradmin')

@section('content')
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-70">
            <h2 class="text-center mb-4 text-primary">Update Image</h2>
            <form action="{{route('Update.Image', $image->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <div class="col-1">
                        <img height="80" width="80" style=" margin-left:10px; border-radius:5px;"
                            src="{{ asset('Gallery/' . $image->image) }}" alt="">
                    </div>
                    <input type="file" name="image" class="form-control border rounded-3 shadow-sm ps-3" accept="image/*" required>
                    @error('image')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update Image</button>
                    <a href="/image" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
