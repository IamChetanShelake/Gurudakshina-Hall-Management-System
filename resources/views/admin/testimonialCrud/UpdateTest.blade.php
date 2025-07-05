@extends('admin.layout.masteradmin')
@section('content')
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-50">
            <h2 class="text-center mb-4 text-primary">Update Testimonials</h2>
            <form action="{{route('Update.Test', $test->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Testimonial Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm @error('title') is-invalid @enderror"
                           id="title" value="{{$test->title}}" name="title" placeholder="Enter title" required>
                    @error('title')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="description" id="description" placeholder="Write a detailed description here..." rows="6" required>{{$test->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <!-- Name Input -->
                {{-- <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Testimonial Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{$test->name}}" placeholder="Enter Name" required>
                    @error('name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div> --}}


                <!-- Designation Input -->
                {{-- <div class="mb-3">
                    <label for="designation" class="form-label fw-bold">Enter Designation</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm @error('designation') is-invalid @enderror"
                           id="designation" value="{{$test->designation}}" name="designation" placeholder="Enter Designation" required>
                    @error('designation')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div> --}}

                <!-- Ratings Input -->


                <!-- Image Upload -->
                {{-- <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <div class="col-1">
                        <img height="80" width="80" style=" margin-left:10px; border-radius:5px;"
                            src="{{ asset('Testomonial_images/' . $test->image) }}" alt="">
                    </div>
                    <input type="file" name="image" class="form-control border rounded-3 shadow-sm" accept="image/*" >
                    @error('image')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div> --}}

                <!-- Submit & Back Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update Testimonial</button>
                    <a href="/testimonials" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
