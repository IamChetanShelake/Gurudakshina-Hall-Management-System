@extends('website.layout.master')
@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">

        <div id="top"></div>

        <section id="subheader" class="relative jarallax text-light">
            <img src="{{ asset('website/assets/images/background/Background.jpg') }}" class="jarallax-img" alt="">
            <div class="container relative z-index-1000">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h1>{{ $hall->name }}</h1>
                        <ul class="crumb">
                            <li><a href="{{ route('Index.Page') }}">Home</a></li>
                            <li class="active">{{ $hall->name }}</li>
                        </ul>
                        <div class="spacer-double"></div>
                    </div>
                </div>
            </div>
            <div class="de-overlay"></div>
        </section>

        <section class="relative z-4 lines-deco no-top no-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="mt-70">
                            <div class="row g-0">
                                <div class="col-md-6 text-center">
                                    <div class="bg-color text-light p-4 h-100 wow fadeInRight" data-wow-delay=".0s">
                                        <div class="de_count fs-15 wow fadeInRight" data-wow-delay=".4s">
                                            <h2 class="mb-0">{{ $hall->capacity }}</h2>
                                            <span>Capacity</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 text-center">
                                    <div class="text-light p-4 h-100 wow fadeInRight" data-bgcolor="#70533A"
                                        data-wow-delay=".2s">
                                        <div class="de_count fs-15 wow fadeInRight" data-wow-delay=".6s">
                                            <h2 class="mb-0">{{ $hall->area }} sq ft</h2>
                                            <span>Area</span>
                                        </div>
                                    </div>
                                </div>



                                    {{-- <div class="col-md-6 text-center">
                                            <div class="text-light p-4 h-100 wow fadeInRight" data-bgcolor="#70533A" data-wow-delay=".2s">
                                                <div class="de_count fs-15 wow fadeInRight" data-wow-delay=".6s">
                                                    <a class="btn-main btn-line no-bg mt-lg-4" href="reservation.html">Book Now</a>
                                                </div>
                                            </div>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative lines-deco">
            {{-- <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <h3 class="wow fadeInUp">{{ $hall->short_description }}</h3>
                    </div>
                </div>
            </div> --}}

            <div class="spacer-single"></div>
            <div class="container py-5">
                <!-- Hall Description -->
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-10">
                        <h6 style="color: #AB8965">WELCOME TO</h6>
                        <div class="row align-items-center">
                            <!-- Left Side: Hall Name -->
                            <div class="col-md-6 text-start">
                                <h2>{{ $hall->name }}</h2>
                            </div>
                            <!-- Right Side: Hall Description -->
                            <div class="col-md-6 text-end">
                                <p class="text-dark" style="text-align: left">
                                    {!! $hall->short_description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            {{-- new WORKING CODDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD --}}
            {{-- <div class="relative wow fadeIn">
                    <div class="owl-custom-nav menu-float" data-target="#custom-room-carousel">
                        <a class="custom-btn-next"></a>
                        <a class="custom-btn-prev"></a>

                        <div id="custom-room-carousel" class="owl-2-cols-center owl-carousel owl-theme" >
                            <!-- Room begin -->
                            @foreach ($hall_images as $image)
                                <div class="item"  >
                                    <div class="hover relative text-light" style="height: 400px;">
                                        <img src="{{ asset('Hall_images/' . $image->image_path) }}" class="w-100"
                                            alt="" style="height: 400px; border-radius: 3%;">
                                    </div>
                                </div>
                            @endforeach
                            <!-- Room end -->
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

                <script>
                    $(document).ready(function () {
                        $("#custom-room-carousel").owlCarousel({
                            loop: true,               // Enable infinite looping
                            margin: 10,               // Space between slides
                            nav: true,                // Show next/prev buttons
                            dots: false,              // Hide default dots
                            autoplay: true,           // Auto-slide enabled
                            autoplayTimeout: 2000,    // Move every 3 seconds
                            autoplayHoverPause: true, // Pause on hover
                            responsive: {
                                0: { items: 1 },       // 1 item on small screens (mobile)
                                600: { items: 2 },     // 2 items on tablets and above
                                1024: { items: 2 }     // 2 items on desktops
                            }
                        });

                        // Custom Navigation Buttons (Specific to this Carousel)
                        $(".custom-btn-next").click(function () {
                            $("#custom-room-carousel").trigger("next.owl.carousel");
                        });

                        $(".custom-btn-prev").click(function () {
                            $("#custom-room-carousel").trigger("prev.owl.carousel");
                        });
                    });
                </script> --}}

            {{-- <div class="slider-container relative wow fadeIn" style=" position: relative; width: 100%; overflow: hidden;  padding: 0 20px;">
                    <div class="center-image" style="display: flex; justify-content: center; margin-bottom: 20px;">
                        <img src="{{ asset('Hall_images/' . $hall->image) }}" alt="" style="width: 1180px; height: 560px; border-radius: 3%; margin-bottom: 50px;">
                    </div>
                    <!-- Swiper Slider -->
                    <div class="swiper-container" style="padding: 0 100px;">
                        <div class="swiper-wrapper">
                            @foreach ($hall_images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('Hall_images/' . $image->image_path) }}" class="w-100" alt="" style="height: 350px; border-radius: 3%;">
                                </div>
                            @endforeach
                        </div>
                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>

                    </div>
                </div>


                <!-- Swiper JS -->
                <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var swiper = new Swiper(".swiper-container", {
                            loop: true,  // Infinite loop
                            slidesPerView: 2,
                            spaceBetween: 10,
                            autoplay: {
                                delay: 0,  // No delay
                                disableOnInteraction: false,
                                pauseOnMouseEnter: false
                            },
                            speed: 3000,  // Adjust speed for smooth transition
                            allowTouchMove: false,  // Disable manual sliding
                        });
                    });
                </script> --}}

            <div class="slider-container relative wow fadeIn"
                style="position: relative; width: 100%; overflow: hidden; padding: 0 20px;">
                <div class="center-image" style="display: flex; justify-content: center; margin-bottom: 20px;">
                    <img src="{{ asset('Hall_images/' . $hall->image) }}" alt=""
                        style="width: 100%; max-width: 1180px; height: 550px; border-radius: 3%; margin-bottom: 0px;">
                </div>

                <!-- Swiper Slider -->
                <div class="swiper-container" style="width: 90%; max-width: 1200px; margin: 0 auto; overflow: hidden;">
                    <div class="swiper-wrapper">
                        @foreach ($hall_images as $image)
                            <div class="swiper-slide" style="width: 50%; flex-shrink: 0; height: 300px; border-radius: 3%;">
                                <img src="{{ asset('Hall_images/' . $image->image_path) }}" class="w-100" alt=""
                                    style="height: 300px; border-radius: 3%; width: 100%;">
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var swiper = new Swiper(".swiper-container", {
                        loop: true, // Enables smooth looping

                        slidesPerView: 2, // Show exactly 2 images
                        spaceBetween: 20, // Space between images
                        centeredSlides: false, // Ensures no cropped images on the sides
                        autoplay: {
                            delay: 2000, // Move every 2 seconds
                            disableOnInteraction: false
                        },
                        speed: 1000, // Smooth transition effect
                    });
                });
            </script>





            <div class="spacer-double"></div>

            {{-- <div class="row g-4 justify-content-center"> --}}
            {{-- <div class="container">
                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/guests.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">4 Guests</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/size.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">35 Feets Size</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/door.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Connecting Rooms</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/bed.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">1 King Bed</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/tv.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Cable TV</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/shower.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Shower</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/safebox.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Safebox</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/wifi.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Free WiFi</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/desk.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Work Desk</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/balcony.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Balcony</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/bathub.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Bathub</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/city.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">City View</p>
                            </div>
                        </div>
                    </div>
                </div> --}}



            {{-- <div class="container">
                    <!-- The Grand Auditorium Description -->
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-12 text-center">
                            <h2>{{$hall->name}}</h2>
                            <p class="text-dark">
                                 {!!$hall->description!!}
                            </p>
                        </div>
                    </div>

                    <!-- Key Features Section -->
                    <div class="row g-4 justify-content-center mt-4">
                        <div class="col-lg-12 text-center">
                            <h3>Key Features</h3>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/guests.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Capacity: 500+ seats</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/tv.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">High-quality sound system</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/lighting.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Advanced lighting</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/balcony.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Spacious stage with backstage</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/door.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Fully air-conditioned</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/accessibility.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Accessible for disabilities</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ideal For Section -->
                    <div class="row g-4 justify-content-center mt-4">
                        <div class="col-lg-12 text-center">
                            <h3>Ideal For</h3>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/conference.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Academic Conferences</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/cultural.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Cultural Shows</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/award.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Award Ceremonies</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 wow fadeInRight" data-wow-delay=".2s">
                            <div class="d-block relative">
                                <img src="{{asset('website/assets/images/icons/lecture.png')}}" class="w-40px" alt="">
                                <p class="absolute abs-middle ml70 text-dark fw-500">Guest Lectures</p>
                            </div>
                        </div>
                    </div>
                </div> --}}



            {{-- <div style="display: flex; justify-content: space-between; padding-left: 160px; font-family: Arial, sans-serif;">
                    <!-- Left Side: Key Features -->
                    <div style="width: 45%;">
                        <h3 style="font-weight: bold;">KEY FEATURES</h3>
                        <div style="border-top: 1px solid #ccc; margin-bottom: 20px; width: 500px;"></div>
                        <ul style="list-style: none; padding: 0;">
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-users" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Capacity of 500 people
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-volume-up" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                High-quality sound system
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-snowflake" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Fully Air-conditioned
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-theater-masks" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Spacious stage with backstage
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-lightbulb" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Advanced Lighting
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-wheelchair" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Accessible for disabilities
                            </li>
                        </ul>
                    </div>

                    <!-- Right Side: Ideal For -->
                    <div style="width: 50%;">
                        <h3 style="font-weight: bold; text-align: left;">IDEAL FOR</h3>
                        <div style="border-top: 1px solid #ccc; margin-bottom: 20px; width: 500px;"></div>
                        <ul style="list-style: none; padding: 0;">
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-users" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                <span style="display: flex; align-items: center;">Academic Conferences</span>
                            </li>

                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-theater-masks" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                <span style="display: flex; align-items: center;">Cultural Shows</span>
                            </li>

                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-award" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                <span style="display: flex; align-items: center;">Award Ceremonies</span>
                            </li>

                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-chalkboard-teacher" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                <span style="display: flex; align-items: center;">Guest Lectures</span>
                            </li>
                        </ul>
                    </div>
                </div> --}}

            <div
                style="display: flex; flex-wrap: wrap; justify-content: center; padding: 20px 100px; font-family: Arial, sans-serif;">
                <!-- Left Side: Key Features -->
                <div style="width: 45%; min-width: 300px; padding: 20px; margin: 0 20px;">
                    <h3 style="font-weight: bold;">KEY FEATURES</h3>
                    <div style="border-top: 1px solid #ccc; margin-bottom: 20px; width: 100%;"></div>
                    <ul style="list-style: none; padding: 0;">
                        @foreach ($hall->keys as $key)
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-check-circle" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                {{ $key->title }}
                            </li>
                        @endforeach
                        {{-- <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-volume-up" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                High-quality sound system
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-snowflake" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Fully Air-conditioned
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-theater-masks" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Spacious stage with backstage
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-lightbulb" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Advanced Lighting
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-wheelchair" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Accessible for disabilities
                            </li> --}}
                    </ul>
                </div>

                <!-- Right Side: Ideal For -->
                <div style="width: 45%; min-width: 300px; padding: 20px; margin: 0 20px;">
                    <h3 style="font-weight: bold;">IDEAL FOR</h3>
                    <div style="border-top: 1px solid #ccc; margin-bottom: 20px; width: 100%;"></div>
                    <ul style="list-style: none; padding: 0;">
                        @foreach ($hall->ideals as $ideal)
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div
                                    style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-check-circle" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                {{ $ideal->title }}
                            </li>
                        @endforeach
                        {{-- <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-theater-masks" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Cultural Shows
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-award" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Award Ceremonies
                            </li>
                            <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                <div style="width: 50px; height: 50px; background-color: #f3e8db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-chalkboard-teacher" style="font-size: 24px; color: #755c48;"></i>
                                </div>
                                Guest Lectures
                            </li> --}}
                    </ul>
                </div>
            </div>







        </section>
        {{-- <div style="text-align: center;" >
            <a class=" mb-4" href="{{ route('HallPage.Privacy', ['id' => $hall->id]) }}">
                <button class="mb-4"
                    style="font-size: 20px; font-weight: 600; border-radius: 15px; background-color: #AB8965; color: white;">View
                    Terms And Condition</button>
            </a>
        </div> --}}
        <div style="text-align: center;">
            <a href="{{ route('HallPage.Privacy', ['id' => $hall->id]) }}"
            class="mb-4"
            style="display: inline-block; font-size: 20px; font-weight: 600; border-radius: 15px; background-color: #AB8965;
                    color: white; text-decoration: none; padding: 10px 20px; border: none;">
                View Terms And Condition
            </a>
        </div>

    </div>


    {{-- <section class="relative bg-light pt80 lines-deco">
        <div class="container-fluid relative z-2">
            <div class="row g-4">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="subtitle wow fadeInUp mb-3">Discover</div>
                    <h2 class="mb-0 wow fadeInUp">More Halls</h2>
                </div>

                <div class="col-lg-12">
                    <div class="owl-custom-nav menu-float px-5" data-target="#more-rooms">
                        <a class="btn-next"></a>
                        <a class="btn-prev"></a>

                        <div id="more-rooms" class="owl-3-cols owl-carousel owl-theme">
                            <!-- room begin -->
                            @foreach ($halls as $hall)
                                <div class="item">
                                    <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay=".3s">
                                        <img src="{{ asset('Hall_images/' . $hall->image) }}"
                                            class="w-100 rounded-up-100" alt="" style="height: 450px">
                                        <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered">

                                            <a class="btn-line" href="{{ route('HallDetail.Page', $hall->id) }}">View
                                                Details</a>
                                        </div>
                                        <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1 rounded-up-100">
                                        </div>
                                        <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                            <h3 class="mb-0">{{ $hall->name }}</h3>
                                            <div class="text-center fs-14">
                                                <span class="mx-2">
                                                    {{ $hall->capacity }}
                                                </span>
                                                <span class="mx-2">
                                                    {{ $hall->area }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- room end -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    <section class="relative bg-light lines-deco">
        <div class="container-fluid relative z-2">
            <div class="row g-4">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="subtitle wow fadeInUp mb-3">Discover</div>
                    <h2 class="wow fadeInUp">More Halls</h2>
                </div>

                <div class="col-lg-12">
                    <div class="owl-custom-nav menu-float px-5">
                        <a class="btn-prev"></a>
                        <a class="btn-next"></a>

                        <div id="room-carousel" class="owl-3-cols owl-carousel owl-theme">
                            @foreach ($halls as $hall)
                                <div class="item">
                                    <div class="hover relative text-light text-center wow fadeInUp" data-wow-delay=".3s">
                                        <img src="{{ asset('Hall_images/' . $hall->image) }}"
                                            class="w-100 rounded-up-100" alt="" style="height:450px;">
                                        <div class="abs hover-op-1 z-4 hover-mt-40 abs-centered">
                                            <a class="btn-line" href="{{ route('HallDetail.Page', $hall->id) }}">View
                                                Details</a>
                                        </div>
                                        <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1 rounded-up-100">
                                        </div>
                                        <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                            <h3 class="mb-0">{{ $hall->name }}</h3>
                                            <div class="text-center fs-14">
                                                <span class="mx-2">{{ $hall->capacity }}+ capacity</span>
                                                <span class="mx-2">{{ $hall->area }} sqft area</span>
                                            </div>
                                        </div>
                                        <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery & Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script>
        $(document).ready(function() {
            var owl = $("#room-carousel");

            owl.owlCarousel({
                loop: true,
                margin: 15,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 800,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            $(".btn-next").click(function() {
                owl.trigger("next.owl.carousel");
            });

            $(".btn-prev").click(function() {
                owl.trigger("prev.owl.carousel");
            });
        });
    </script>

    </div>
    <!-- content close -->
@endsection
