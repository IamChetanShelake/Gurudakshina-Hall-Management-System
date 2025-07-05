@extends('admin.layout.masteradmin')

@section('content')
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-50">
            <h2 class="text-center mb-4 text-primary">Add Testimonials</h2>
            <form action="{{route('Add.Test')}}" method="POST" enctype="multipart/form-data">
                @csrf



                <!-- Name Input -->
                {{-- <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm @error('title') is-invalid @enderror"
                           id="title" name="title" placeholder="Enter title" required>
                    @error('title')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div> --}}

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Testimonial Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('title') is-invalid @enderror"
                           id="title" name="title" placeholder="Enter Name" required>
                    @error('name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="description" id="description" placeholder="Write a description here..." rows="4" required></textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>



                <!-- Designation Input -->
                {{-- <div class="mb-3">
                    <label for="designation" class="form-label fw-bold">Enter Designation</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm @error('designation') is-invalid @enderror"
                           id="designation" name="designation" placeholder="Enter Designation" required>
                    @error('designation')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div> --}}

                <!-- Ratings Input -->


                <!-- Image Upload -->
                {{-- <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <input type="file" name="image" class="form-control border rounded-3 shadow-sm" accept="image/*" required>
                    @error('image')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div> --}}

                <!-- Submit & Back Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Add Testimonial</button>
                    <a href="/testimonials" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
