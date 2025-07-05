@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75"> <!-- Changed from w-50 to w-75 -->
            <h2 class="text-center mb-4 text-primary">Update Our Facilitie</h2>
            <form action="{{route('Update.OurFacilitie',$ourfacilite->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('title') is-invalid @enderror"
                           id="title" value="{{$ourfacilite->title}}" name="title" placeholder="Enter Title" readonly>
                    @error('title')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="description" id="description" placeholder="Enter Description" rows="6" required>{{$ourfacilite->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <div class="col-1">
                        <img height="80" width="80" style=" margin-left:10px; border-radius:5px;"
                            src="{{ asset('OurFacilite_images/' . $ourfacilite->image) }}" alt="">
                    </div>
                    <input type="file" name="image" class="form-control border rounded-3 shadow-sm ps-3" accept="image/*">
                    @error('image')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                    <a href="/ourfacilitie" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>


</body>
@endsection
