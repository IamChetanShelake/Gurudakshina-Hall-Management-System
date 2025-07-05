@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75"> <!-- Changed from w-50 to w-75 -->
            <h2 class="text-center mb-4 text-primary">Update Page</h2>
            <form action="{{route('Update.Page',$page->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('title') is-invalid @enderror"
                           id="title" value="{{$page->title}}" name="title" placeholder="Enter Title" readonly>
                    @error('title')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="description" id="summernote" placeholder="Enter Description" rows="6" required>{{$page->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>



                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                    <a href="/page" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>


</body>
@endsection
