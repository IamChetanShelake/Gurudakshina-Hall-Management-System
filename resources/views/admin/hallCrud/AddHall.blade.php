@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75">
            <h2 class="text-center mb-4 text-primary">Add Hall</h2>
            <form action="{{ route('halls.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Hall Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('name') is-invalid @enderror"
                           id="name" name="name" placeholder="Enter hall name..." required>
                    @error('name')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="sub_title" class="form-label fw-bold">Sub Title</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('sub_title') is-invalid @enderror"
                           id="sub_title" name="sub_title" placeholder="Enter sub title...">
                    @error('sub_title')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="short_description" class="form-label fw-bold">Short Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="short_description" id="short_description" placeholder="Enter short description here..." rows="6" required></textarea>
                    @error('short_description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Hall Price</label>
                    <input type="number" class="form-control border rounded-3 shadow-sm ps-3 @error('price') is-invalid @enderror"
                           id="price" name="price" placeholder="Enter hall price..." >
                    @error('price')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="description" id="summernote" placeholder="Write a detailed description here..." rows="6" required></textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="capacity" class="form-label fw-bold">Capacity</label>
                    <input type="number" class="form-control border rounded-3 shadow-sm ps-3 @error('capacity') is-invalid @enderror"
                           id="capacity" name="capacity" placeholder="Enter hall capacity..." required>
                    @error('capacity')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="area" class="form-label fw-bold">Area (sq. ft.)</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('area') is-invalid @enderror"
                           id="area" name="area" placeholder="Enter hall area..." required>
                    @error('area')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Upload Image</label>
                    <input type="file" name="image" class="form-control border rounded-3 shadow-sm ps-3" accept="image/*">
                    @error('image')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="images" class="form-label fw-bold">Upload Images</label>
                    <input type="file" name="images[]" class="form-control border rounded-3 shadow-sm ps-3" accept="image/*" multiple>
                    @error('images.*')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>


                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                    <a href="/adminhalls" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection
