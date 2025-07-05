@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75">
            <h2 class="text-center mb-4 text-primary">Add Page</h2>
            <form action="{{ route('Add.Page') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('name') is-invalid @enderror"
                           id="title" name="title" placeholder="Enter a meaningful title..." required>
                    @error('title')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="description" id="summernote" placeholder="Write a detailed description here..." rows="6" required></textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>


                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                    <a href="{{route('Page.Table')}}" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection
