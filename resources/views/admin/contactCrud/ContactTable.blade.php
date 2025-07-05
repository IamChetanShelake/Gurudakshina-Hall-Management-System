@extends('admin.layout.masteradmin')
@section('content')
    <div class="col-12">
        <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            {{-- <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3"> --}}
                <div class="shadow-dark border-radius-lg pt-4 pb-3"
                            style="background-color: #70533A;">
                    <h6 class="text-white text-capitalize ps-3">Contact Details</h6>
                </div>
        </div>
        {{-- <div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        $("#successMessage, #failMessage").fadeOut('slow');
                    }, 3000); // 3 seconds
                });
            </script>

        </div> --}}


        {{-- <div class="d-flex justify-content-end p-3">
            <a class="btn btn-outline-primary btn-lg px-4 py-2"  href="/viewaddcontact">Add Contact</a>
        </div> --}}



        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th> --}}
                </tr>
                </thead>
                <tbody>
                {{--<tr>
                    <td>
                        @foreach($abouts as $about)
                    <div class="d-flex px-2 py-1">
                        <div>
                        <img src="{{ asset('About_images/' . $service->image) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$about->title}}</h6>

                        </div>
                    </div>
                    </td>
                    <td>
                    <p class="text-xs font-weight-bold mb-0">{{$about->description}}</p>

                    </td> --}}
                    {{-- <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Online</span>
                    </td>
                    <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                    </td>
                    <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                    </a>
                    </td>
                </tr>--}}
                @foreach($contacts as $contact)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">

                            <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$contact->title}}</h6>

                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">

                            <div class="d-flex flex-column justify-content-center">
                            <p class="text-wrap">{!!$contact->description!!}</p>
                            </div>
                        </div>
                    </td>
                    {{-- <
                    {{-- <td>
                        @if(isset($about) && $about->image)
                        <img src="{{ asset('images/' . $about->image) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="about Image">
                        @else
                            <p>No Image Available</p>
                        @endif
                    </td> --}}

                    <td class="align-middle text-center text-sm">
                    <a class="btn btn-info" href="{{route('View.Contact',$contact->id)}}">View</a>
                    </td>

                    <td class="align-middle text-center text-sm">
                    <a href="{{route('Edit.Contact',$contact->id)}}" class="btn btn-success" >
                        Edit
                    </a>
                    <a class="btn btn-danger" href="{{route('Delete.Contact',$contact->id)}}">
                        Delete
                    </a>
                    </td>
                    <td class="align-middle text-center">


                        {{-- <form action="{{route('Delete.About',$about->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form> --}}

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>

    </div>
@endsection
