@extends('admin.layout.masteradmin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        {{-- <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3"> --}}
                            <div class="shadow-dark border-radius-lg pt-4 pb-3"
                                style="background-color: #70533A;">
                                <h6 class="text-white text-capitalize ps-3">Product List</h6>
                            </div>
                    </div>

                    {{-- <div class="p-3">
                        @if(session('success'))
                            <div class="alert alert-success" id="successMessage">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            setTimeout(function() {
                                $("#successMessage").fadeOut('slow');
                            }, 3000);
                        });
                    </script> --}}

                    <div class="d-flex justify-content-end p-3">
                        <a class="btn btn-outline-primary btn-lg px-4 py-2" href="{{ route('Image.Add') }}">Add Image</a>
                    </div>

                    <div class="card-body px-3 pb-3">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Name</th> --}}

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Image</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">View</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($images as $image)
                                        <tr>
                                            <td>
                                            @if(isset($image) && $image->image)
                                            <img src="{{ asset('Gallery/'.$image->image) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="Testomonial Image">
                                            @else
                                                <p>No Image Available</p>
                                            @endif
                                        </td>
                                            {{-- <td class="text-wrap">
                                                {!! $product->description !!}
                                            </td> --}}
                                            {{-- <td>
                                                <h6 class="mb-0 text-sm">{{ $product->type->title }}</h6>
                                            </td> --}}

                                            <td>
                                                <a href="{{ route('View.Image', $image->id) }}" class="btn btn-info">View </a>
                                            </td>



                                            <td>
                                                <a class="btn btn-success" href="{{route('Edit.Image',$image->id)}}">Edit</a>
                                                <a class="btn btn-danger" href="{{route('Delete.Image', $image->id)}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
