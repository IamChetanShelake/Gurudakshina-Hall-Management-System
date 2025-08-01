@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75"> <!-- Changed from w-50 to w-75 -->
            <h2 class="text-center mb-4 text-primary">Update Page</h2>
            <form action="{{route('Update.HallPage',$hallpage->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('title') is-invalid @enderror"
                           id="title" value="{{$hallpage->title}}" name="title" placeholder="Enter Title" >
                    @error('title')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="description" id="summernote" placeholder="Enter Description" rows="6" required>{{$hallpage->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label fw-bold">Select Hall</label>
                    <select class="form-control border rounded-3 shadow-sm ps-3 ps-3 @error('description') is-invalid @enderror" id="hall_id" name="hall_id" required>
                        <option value="">-- Select Hall --</option>
                        @foreach($halls as $hall)
                        <option value="{{ $hall->id }}" {{ $hallpage->hall_id == $hall->id ? 'selected' : '' }}>
                            {{ $hall->name }}
                        </option>


                        @endforeach
                    </select>
                </div>



                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                    <a href="{{route('HallPage.Table')}}" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>


</body>
@endsection
