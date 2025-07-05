@extends('admin.layout.masteradmin')
@section('content')
    <div class="col-12">
        <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            {{-- <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3"> --}}
                <div class="shadow-dark border-radius-lg pt-4 pb-3"
                            style="background-color: #70533A;">
                    <h6 class="text-white text-capitalize ps-3">Donation Details</h6>
                </div>
        </div>
        {{-- <div>
            <div class="p-3">
                <div class="p-3">
                    @if(session('success'))
                        <div class="alert alert-success" id="successMessage">
                            {{ session('success') }}
                        </div>
                    @elseif (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                    @endif

                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        $("#successMessage").fadeOut('slow');
                    }, 3000);
                });
            </script>

        </div> --}}


        <div class="d-flex justify-content-end p-3">
            <a class="btn btn-outline-primary btn-lg px-4 py-2"  href="{{route('View.AddDonation')}}">Add Donation</a>
        </div>



        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Donation Amount</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quotation</th>
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
                    @foreach($donations as $donation)
                    <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$donation->donar_name}}</h6>
                            </div>
                        </div>
                        </td>

                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">₹{{$donation->amount}}/-</h6>
                                </div>
                            </div>
                        </td>


                        <td class="align-middle text-center text-sm">
                            <a class="btn btn-info" href="{{route('View.Donation',$donation->id)}}">View</a>
                        </td>

                        <td class="align-middle text-center text-sm">
                        <a href="" class="btn btn-success" >
                            Edit
                        </a>
                        {{-- <a class="btn btn-danger" href="{{route('Delete.Donation',$donation->id)}}">
                            Delete
                        </a> --}}
                        </td>

                        <td>
                            <div class="d-flex px-2 py-1 justify-content-center">
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="{{route('Donation.Quotation',$donation->id)}}"
                                        class="btn btn-sm shadow-sm text-white d-flex align-items-center justify-content-center gap-2"
                                        style="background-color: #007bff; border-color: #007bff;">
                                        <span class="material-symbols-outlined" style="font-size: 18px;">request_quote</span>
                                        <span>Quotation</span>
                                    </a>
                                </div>
                            </div>
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
