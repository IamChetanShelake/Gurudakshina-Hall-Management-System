@extends('admin.layout.masteradmin')

@section('content')
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-70">
            <h2 class="text-center mb-4 text-primary">Add Team Member</h2>
            <form action="{{route('Add.Team')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('name') is-invalid @enderror"
                           id="name" name="name" placeholder="Enter Name" required>
                    @error('name')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label fw-bold">Role</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('designation') is-invalid @enderror"
                           id="designation" name="designation" placeholder="Enter Designation" required>
                    @error('designation')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('description') is-invalid @enderror"
                              name="description" id="summernote" placeholder="Enter Description" rows="6" required></textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <input type="file" name="image" class="form-control border rounded-3 shadow-sm ps-3" accept="image/*">
                    @error('image')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Add Team Member</button>
                    <a href="/team" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
