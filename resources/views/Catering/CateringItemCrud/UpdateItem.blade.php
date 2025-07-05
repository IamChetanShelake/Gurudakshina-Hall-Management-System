@extends('Catering.layout.masteradmin')

@section('content')
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-70">
            <h2 class="text-center mb-4 text-primary">Update Item</h2>
            <form action="{{route('Update.ItemC', $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="item_name" class="form-label fw-bold">Item Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('item_name') is-invalid @enderror"
                           id="item_name" name="item_name" value="{{$item->item_name}}" placeholder="Enter item name" required>
                    @error('item_name')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('description') is-invalid @enderror"
                              name="description" id="description"  placeholder="Enter Description" rows="3" >{{$item->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="number" class="form-control border rounded-3 shadow-sm ps-3 @error('quantity') is-invalid @enderror"
                           id="quantity" name="quantity" value="{{$item->quantity}}" placeholder="Enter quantity" >
                    @error('quantity')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="number" class="form-control border rounded-3 shadow-sm ps-3 @error('price') is-invalid @enderror"
                           id="price" value="{{$item->price}}" name="price" placeholder="Enter price" required>
                    @error('price')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>









                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Add Item</button>
                    <a href="/itemC" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
