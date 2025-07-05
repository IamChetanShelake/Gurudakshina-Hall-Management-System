@extends('admin.layout.masteradmin')
@section('content')
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-50">
            <h2 class="text-center mb-4 text-primary">Update Accessorie</h2>
            <form action="{{route('Update.Accessorie', $accessorie->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Accessorie Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('name') is-invalid @enderror"
                           id="name" name="name" placeholder="Enter Name" value="{{$accessorie->name}}" required>
                    @error('name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="number" class="form-control border rounded-3 shadow-sm ps-3 @error('name') is-invalid @enderror"
                           id="quantity" name="quantity" placeholder="Enter Quantity" value="{{$accessorie->quantity}}" >
                    @error('quantity')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="number" class="form-control border rounded-3 shadow-sm ps-3 @error('price') is-invalid @enderror"
                           id="price" name="price" placeholder="Enter Price" value="{{$accessorie->price}}" >
                    @error('price')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hours" class="form-label fw-bold">Hours</label>
                    <input type="number" class="form-control border rounded-3 shadow-sm ps-3 @error('hours') is-invalid @enderror"
                           id="hours" name="hours" placeholder="Enter Hours" value="{{$accessorie->hours}}" >
                    @error('hours')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>



                <!-- Submit & Back Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update Accessories</button>
                    <a href="/accessories" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
