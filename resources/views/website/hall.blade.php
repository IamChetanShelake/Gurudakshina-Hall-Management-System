@extends('website.layout.master')

@section('content')



        <!-- content begin -->
        <div class="no-bottom no-top" id="content">


            <div id="top"></div>


            <section id="subheader" class="relative jarallax text-light">
                <img src="{{asset('website/assets/images/background/Background.jpg')}}" class="jarallax-img" alt="">
                <div class="container relative z-index-1000">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h1>Our Halls</h1>
                            <p class="mt-3 lead">Experience the perfect fusion of grandeur and functionality in our thoughtfully designed halls. Book your hall today.</p>
                            <ul class="crumb">
                                <li><a href="{{route('Index.Page')}}">Home</a></li>
                                <li >Our Halls</li>

                            </ul>
                            <div style="margin-top: 70px;">
                                <a type="button" class="text-white px-5 py-2" style="background-color: #AB8965; border-radius: 8px; transition: 0.3s;" data-bs-toggle="modal" data-bs-target="#pinModal">
                                    Book Hall
                                </a>
                            </div>




                                {{-- <a type="button" class="text-white px-5 py-2" style="background-color: #70533A; border-radius: 8px; transition: 0.3s;" data-bs-toggle="modal" data-bs-target="#pinModal">
                                    Book Hall
                                </a> --}}
                        </div>

                    </div>
                </div>


                <div class="de-overlay"></div>


            </section>




            <section class="relative lines-deco">
                <div class="container">
                    <div class="row g-4">
                        <!-- room begin -->
                        @foreach ($halls as $hall)


                        <div class="col-lg-4 col-sm-6" >
                            <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay=".3s" style="border:#AB8965 solid 4px;">
                                <img src="{{asset('Hall_images/'.$hall->image)}}" class="img-fluid" alt="" style="height:300px; ">
                                <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered" >

                                    <a class="btn-line" href="{{route('HallDetail.Page',$hall->id)}}">View Details</a>

                                   <!-- Book Now Link -->
                                        <div class="text-center mt-4">
                                            {{-- <a href="{{route('Booknow.Page', ['booking_code' => ''])}}" class="text-white px-5 py-2" style="background-color: #70533A; border-radius: 8px; transition: 0.3s;" onclick="event.preventDefault(); showBookingPopup();">
                                                Book Now
                                            </a> --}}
                                            {{-- <a type="button" class="text-white px-5 py-2" style="background-color: #70533A; border-radius: 8px; transition: 0.3s;" data-bs-toggle="modal" data-bs-target="#pinModal">
                                                Book Hall
                                            </a> --}}

                                        </div>


                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                    <h3 class="mb-0">{{$hall->name}}</h3>
                                    <div class="text-center fs-14">
                                        <span class="mx-2">
                                           Capacity: {{$hall->capacity}}
                                        </span>
                                        <span class="mx-2">
                                           Area: {{$hall->area}} ft
                                        </span>
                                    </div>
                                </div>
                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                            </div>
                        </div>
                        @endforeach
                        <!-- room end -->

                        {{-- <!-- room begin -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay=".4s">
                                <img src="{{asset('website/assets/images/room/2.webp')}}" class="img-fluid" alt="">
                                <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="fs-14">From</div>
                                    <h3 class="fs-40 lh-1 mb-4">$129</h3>
                                    <a class="btn-line" href="{{route('HallDetail.Page',$hall->id)}}">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                    <h3 class="mb-0">Deluxe Room</h3>
                                    <div class="text-center fs-14">
                                        <span class="mx-2">
                                            2 Guests
                                        </span>
                                        <span class="mx-2">
                                            35 ft
                                        </span>
                                    </div>
                                </div>
                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                            </div>
                        </div>
                        <!-- room end -->

                        <!-- room begin -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay=".5s">
                                <img src="{{asset('website/assets/images/room/3.webp')}}" class="img-fluid" alt="">
                                <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="fs-14">From</div>
                                    <h3 class="fs-40 lh-1 mb-4">$139</h3>
                                    <a class="btn-line" href="{{route('HallDetail.Page')}}">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                    <h3 class="mb-0">Premier Room</h3>
                                    <div class="text-center fs-14">
                                        <span class="mx-2">
                                            2 Guests
                                        </span>
                                        <span class="mx-2">
                                            35 ft
                                        </span>
                                    </div>
                                </div>
                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                            </div>
                        </div>
                        <!-- room end -->

                        <!-- room begin -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay=".7s">
                                <img src="{{asset('website/assets/images/room/4.webp')}}" class="img-fluid" alt="">
                                <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="fs-14">From</div>
                                    <h3 class="fs-40 lh-1 mb-4">$149</h3>
                                    <a class="btn-line" href="{{route('HallDetail.Page')}}">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                    <h3 class="mb-0">Family Suite</h3>
                                    <div class="text-center fs-14">
                                        <span class="mx-2">
                                            4 Guests
                                        </span>
                                        <span class="mx-2">
                                            60 ft
                                        </span>
                                    </div>
                                </div>
                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                            </div>
                        </div>
                        <!-- room end -->

                        <!-- room begin -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay=".9s">
                                <img src="{{asset('website/assets/images/room/5.webp')}}" class="img-fluid" alt="">
                                <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="fs-14">From</div>
                                    <h3 class="fs-40 lh-1 mb-4">$179</h3>
                                    <a class="btn-line" href="{{route('HallDetail.Page')}}">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                    <h3 class="mb-0">Luxury Suite</h3>
                                    <div class="text-center fs-14">
                                        <span class="mx-2">
                                            4 Guests
                                        </span>
                                        <span class="mx-2">
                                            70 ft
                                        </span>
                                    </div>
                                </div>
                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                            </div>
                        </div>
                        <!-- room end -->

                        <!-- room begin -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay="1.1s">
                                <img src="{{asset('website/assets/images/room/6.webp')}}" class="img-fluid" alt="">
                                <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="fs-14">From</div>
                                    <h3 class="fs-40 lh-1 mb-4">$199</h3>
                                    <a class="btn-line" href="{{route('HallDetail.Page')}}">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                    <h3 class="mb-0">Presidential Suite</h3>
                                    <div class="text-center fs-14">
                                        <span class="mx-2">
                                            2 Guests
                                        </span>
                                        <span class="mx-2">
                                            90 ft
                                        </span>
                                    </div>
                                </div>
                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                            </div>
                        </div>
                        <!-- room end --> --}}
                    </div>
                </div>
            </section>
        </div>

        <!-- Book Now Button -->
    {{-- <div class="text-center mt-4">
        <button class="btn btn-lg text-white px-5 py-2" style="background-color: #70533A; border-radius: 8px; transition: 0.3s;" onclick="showBookingPopup()">
            Book Now
        </button>
    </div> --}}

    <!-- Booking PIN Modal -->
    {{-- <div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('check.booking.pin') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="pinModalLabel">Enter Booking Code</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="pin">Booking PIN:</label>
                        <input type="text" name="pin" id="pin" class="form-control" placeholder="Enter Booking Code" required>
                        @if(session('error'))
                            <span class="text-danger">{{ session('error') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="text-white px-2 py-1" style="background-color: #7a7a79; border-radius: 8px; transition: 0.3s;" data-bs-dismiss="modal">Close</a>

                        <button type="submit" class="text-white px-3 py-1"
                            style="background-color: #70533A; border-radius: 8px; transition: 0.3s;">
                            Verify & Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('check.booking.pin') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="pinModalLabel">Enter Booking Code</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- ✅ Booking Code Note -->
                        <div class="alert alert-info text-center" role="alert">
                            <strong>Note:</strong> If you have filled out the enquiry form and received a booking code from the admin, enter it below.
                            Otherwise, please fill out the enquiry form first.
                            <div style="text-align: center; margin-top: 10px;">
                                <a href="{{ route('Enquiry.Page') }}" class="text-white px-3 py-1" style="background-color: #86797a; border-radius: 8px; transition: 0.3s;">
                                    Fill Enquiry Form
                                </a>
                            </div>
                        </div>

                        <!-- ✅ Booking Code Input -->
                        <label for="pin" class="form-label">Booking PIN:</label>
                        <input type="text" name="pin" id="pin" class="form-control" placeholder="Enter Booking Code" required>

                        @if(session('error'))
                            <span class="text-danger">{{ session('error') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <!-- ❌ Close Button -->
                        <a type="button" class="text-white px-2 py-1" style="background-color: #7a7a79; border-radius: 8px; transition: 0.3s;" data-bs-dismiss="modal">
                            Close
                        </a>

                        <!-- ✅ Enquiry Button -->


                        <!-- ✅ Verify Button -->
                        <button type="submit" class="text-white px-3 py-1" style="background-color: #AB8965; border-radius: 8px; transition: 0.3s;">
                            Verify & Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- content close -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('error'))
                var pinModal = new bootstrap.Modal(document.getElementById('pinModal'));
                pinModal.show();
            @endif
        });
    </script>





@endsection
