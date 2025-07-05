@extends('website.layout.master')

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">

        <div id="top"></div>

        <section class="section-dark text-light no-top no-bottom position-relative overflow-hidden z-1000">
            <div class="v-center">
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach ($landings as $landing)
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="swiper-inner"
                                    data-bgimage="url('{{ asset('Landing_images/' . $landing->image) }}')">
                                    <div class="sw-caption">
                                        <div class="container">
                                            <div class="row g-4 align-items-center ">

                                                <div class="spacer-double"></div>

                                                <div class="col-lg-6 offset-lg-3 text-center ">
                                                    <div class="spacer-single"></div>
                                                    <div class="sw-text-wrapper">
                                                        <div class="slider-extra mb-3">
                                                            <span class="d-stars">
                                                                <i class="icofont-star"></i>
                                                                <i class="icofont-star"></i>
                                                                <i class="icofont-star"></i>
                                                                <i class="icofont-star"></i>
                                                                <i class="icofont-star"></i>
                                                            </span>
                                                        </div>
                                                        <h1 class="slider-title mb-4">{{ $landing->title }}</h1>
                                                        <p class=" slider-teaser px-4 mb-0">
                                                            {!! $landing->description !!}</p>
                                                        <div class="spacer-30"></div>
                                                        <a class="btn-main mb10 mb-3" href="{{ route('Hall') }}">Discover
                                                            Halls</a>
                                                    </div>
                                                </div>
                                                <div class="spacer-single"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="abs abs-centered w-40 d-none d-lg-block"
                                        style="margin-top:20px !important;">
                                        <div class="box-slider-decor"></div>
                                    </div>
                                    <div class="sw-overlay op-2"></div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Slides -->

                        <!-- Slides -->
                        {{-- <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url('{{ asset('website/assets/banner/2.jpeg') }}')">
                                <div class="sw-caption z-1000">
                                    <div class="container">
                                        <div class="row g-4 align-items-center">

                                            <div class="spacer-double"></div>

                                            <div class="col-lg-8 offset-lg-2 text-center">
                                                <div class="spacer-single"></div>
                                                <div class="sw-text-wrapper">
                                                    <div class="slider-extra mb-3">
                                                        <span class="d-stars">
                                                            <i class="icofont-star"></i>
                                                            <i class="icofont-star"></i>
                                                            <i class="icofont-star"></i>
                                                            <i class="icofont-star"></i>
                                                            <i class="icofont-star"></i>
                                                        </span>
                                                    </div>
                                                    <h1 class="slider-title mb-4">A Vision Rooted in Excellence</h1>
                                                    <p class="col-lg-8 offset-lg-2 slider-teaser px-4 mb-0">An initiative of
                                                        Gokhale Education Society, established in 1918, Gurudakshina Hall
                                                        blends tradition with innovation—offering a dynamic space for
                                                        academic discussions, cultural events, and professional growth.</p>
                                                    <div class="spacer-30"></div>
                                                    <a class="btn-main mb10 mb-3" href="{{ route('Hall') }}">Discover
                                                        Halls</a>
                                                </div>
                                            </div>

                                            <div class="spacer-single"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="abs abs-centered w-40" style="margin-top:20px !important;">
                                    <div class="box-slider-decor"></div>
                                </div>
                                <div class="sw-overlay op-2"></div>
                            </div>
                        </div> --}}
                        <!-- Slides -->

                        <!-- Slides -->

                        <!-- Slides -->

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>



                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </section>

        {{-- <div class="bg-dark text-light pt30 pb30">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-9">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-3 text-lg-start text-center">
                            <h3 class="mb-0">Reservation</h3>
                        </div>

                        <div class="col-md-3">
                            <div class="text-center ">
                                <h6 class="id-color mb-1">Choose Date</h6>
                                <input type="text" id="date-picker" class="form-control no-border no-bg bg-focus-color text-white fs-20 text-right text-center" name="date" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center ">
                                <h6 class="id-color">Adult</h6>
                                <div class="de-number">
                                    <span class="d-minus">-</span>
                                    <input type="text" class="no-border no-bg" value="1">
                                    <span class="d-plus">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center ">
                                <h6 class="id-color">Children</h6>
                                <div class="de-number">
                                    <span class="d-minus">-</span>
                                    <input type="text" class="no-border no-bg" value="0">
                                    <span class="d-plus">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-3 text-lg-end text-center">
                        <a class="btn-main" href="rooms.html">Check Availability</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <section class="relative lines-deco">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 sm-hide">
                        <div class="relative wow fadeInUp" data-wow-delay=".3s">
                            <div class="abs top-0 w-100">
                                <div class="shape-mask-1 jarallax">
                                    {{-- <img src="{{ asset('website/assets/images/misc/Audi gr - Copy.jpg') }}"
                                        class="jarallax-img" alt=""> --}}
                                    <img src="{{ asset('website/assets/images/misc/Audi gr.jpg') }}" class="jarallax-img"
                                        alt="">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 text-center">
                        <div class="wow scaleIn">
                            <div class="subtitle mb-3">Welcome To Gurudakshina Hall</div>
                            <h2 class="wow fadeInUp">Exceptional Hospitality at Gurudakshina
                            </h2>

                            <div class="text-center wow fadeInUp" data-wow-delay=".5s">
                                <h4 class="fw-bold mb-1">4.9 out of 5</h4>
                                <div class="de-rating-ext fs-18">
                                    <span class="d-stars">
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                    </span>
                                </div>
                                <span class="d-block fs-14 mb-0">Based on 25000+ reviews</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 sm-hide">
                        <div class="relative wow fadeInUp" data-wow-delay=".3s">
                            <div class="abs top-0 w-100">
                                <div class="shape-mask-1 jarallax">

                                    <img src="{{ asset('website/assets/images/misc/Audi VIP - Copy (2).jpg') }}"
                                        class="jarallax-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spacer-double"></div>

                <div class="row g-4 relative z-2">
                    @foreach ($facilites as $facilite)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="relative p-4 bg-white border-grey mobile-height" style="height: 220px;">
                                <span class="abs top-= w-70px p-3 rounded-up-100  d-block">
                                    <img src="{{ asset('Facilitie_images/' . $facilite->image) }}" class="w-100"
                                        alt="" style="color: #ffff !important;">
                                </span>
                                <div class="pl-90">
                                    <h4>{{ $facilite->title }}</h4>
                                    <p class="mb-0">{{ $facilite->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <style>
                        @media (max-width: 768px) {

                            /* Targets mobile screens */
                            .mobile-height {
                                height: 270px !important;
                                /* Increase height in mobile view */
                            }
                        }
                    </style>

                    {{-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="relative p-4 bg-white border-grey">
                            <span class="abs top-= w-70px p-3 rounded-up-100  d-block">
                                <img src="{{ asset('website/assets/icon/tv.png') }}" class="w-100" alt="">
                            </span>
                            <div class="pl-90">
                                <h4>Audio-Visual Setup</h4>
                                <p class="mb-0">Equipped with projectors, microphones, and high-quality sound systems..
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="relative p-4 bg-white border-grey">
                            <span class="abs top-= w-70px p-3 rounded-up-100  d-block">
                                <img src="{{ asset('website/assets/icon/desk.png') }}" class="w-100" alt="">
                            </span>
                            <div class="pl-90">
                                <h4>Comfortable Seating Arrangements</h4>
                                <p class="mb-0">Flexible layouts for seminars, training sessions, and conferences..</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                        <div class="relative p-4 bg-white border-grey">
                            <span class="abs top-= w-70px p-3 rounded-up-100  d-block">
                                <img src="{{ asset('website/assets/icon/wifi.png') }}" class="w-100" alt="">
                            </span>
                            <div class="pl-90">
                                <h4>High-Speed WiFi & IT Support</h4>
                                <p class="mb-0">Ensuring seamless online connectivity for virtual and hybrid events.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="relative p-4 bg-white border-grey">
                            <span class="abs top-= w-70px p-3 rounded-up-100  d-block">
                                <img src="{{ asset('website/assets/icon/city.png') }}" class="w-100" alt="">
                            </span>
                            <div class="pl-90">
                                <h4>Refreshments & Catering</h4>
                                <p class="mb-0">Customizable options for coffee breaks and meals.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                        <div class="relative p-4 bg-white border-grey">
                            <span class="abs top-= w-70px p-3 rounded-up-100  d-block">
                                <img src="{{ asset('website/assets/icon/guests.png') }}" class="w-100" alt="">
                            </span>
                            <div class="pl-90">
                                <h4>Dedicated Event Support</h4>
                                <p class="mb-0">Professional assistance for smooth event execution..</p>
                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>

        </section>

        {{-- <section class="jarallax relative overflow-hidden text-light section-dark">
            <div class="abs abs-centered w-30">
                <div class="box-slider-decor"></div>
            </div>

            <img src="{{ asset('website/assets/images/background/Audi.jpeg') }}"
                            class="jarallax-img"
                            alt=""
                            style="filter: brightness(70%); width: 100%; height: auto;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="owl-single-dots owl-carousel owl-theme">
                            @foreach ($testss as $test)
                            <div class="item">
                                <i class="icofont-quote-left id-color fs-40 mb-4 wow fadeInUp"></i>
                                <h3 class="mb-4 wow fadeInUp fs-36">{{$test->description}}</h3>
                                <span class="wow fadeInUp">{{$test->title}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}



        <section class="jarallax relative overflow-hidden text-light section-dark">
            <div class="abs abs-centered w-30">
                <div class="box-slider-decor d-none d-lg-block"></div>
            </div>

            <img src="{{ asset('website/assets/images/background/Audi.jpeg') }}" class="jarallax-img" alt=""
                style="filter: brightness(70%); width: 100%; height: auto;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="owl-single-dots owl-carousel owl-theme">
                            @foreach ($testss as $test)
                                <div class="item">
                                    <i class="icofont-quote-left id-color fs-40 mb-4 wow fadeInUp"></i>
                                    <h3 class="mb-4 wow fadeInUp fs-36">{{ $test->description }}</h3>
                                    <span class="wow fadeInUp">{{ $test->title }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <script>
            $(document).ready(function() {
                $(".owl-single-dots").owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    items: 1
                });
            });
        </script>


        {{-- <section class="relative bg-light lines-deco">
            <div class="container-fluid relative z-2">
                <div class="row g-4">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="subtitle  wow fadeInUp mb-3">Elegant</div>
                        <h2 class="wow fadeInUp">Halls</h2>
                    </div>

                    <div class="col-lg-12">
                        <div class="owl-custom-nav menu-float px-5" data-target="#room-carousel">
                            <a class="btn-next"></a>
                            <a class="btn-prev"></a>
                            <div id="room-carousel" class="owl-3-cols owl-carousel owl-theme">
                                <!-- room begin -->
                                @foreach ($halls as $hall)
                                    <div class="item">
                                        <div class="hover relative text-light text-center wow fadeInUp"
                                            data-wow-delay=".3s">
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
                        <div class="subtitle wow fadeInUp mb-3">Elegant</div>
                        <h2 class="wow fadeInUp">Halls</h2>
                    </div>

                    <div class="col-lg-12">
                        <div class="owl-custom-nav menu-float px-5">
                            <a class="btn-prev"></a>
                            <a class="btn-next"></a>

                            <div id="room-carousel" class="owl-3-cols owl-carousel owl-theme">
                                @foreach ($halls as $hall)
                                    <div class="item">
                                        <div class="hover relative text-light text-center wow fadeInUp"
                                            data-wow-delay=".3s">
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
                                                    <span class="mx-2">{{ $hall->capacity }} capacity</span>
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
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
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





        <section class="relative lines-deco">
            <div class="container relative z-2">
                <div class="row g-4">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="subtitle wow fadeInUp mb-3">Halls &amp; Suites</div>
                        <h2 class="wow fadeInUp">Our Facilites</h2>
                    </div>
                    @foreach ($ourfacilities as $ourfacilitie)
                        <div class="col-md-6">
                            <div class="relative">
                                <img src="{{ asset('OurFacilite_images/' . $ourfacilitie->image) }}"
                                    class="img-fluid wow fadeInUp" style="height: 450px; border-radius: 3%;"
                                    alt="">
                                <div class="bg-color text-light p-4 start-10 mx-4  mt-70 wow fadeInDown"
                                    data-wow-delay="">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-lg-5 text-center">
                                            <div class="de_count fs-15 wow fadeInRight" data-wow-delay=".2s"
                                                style="font-size: 20px;">
                                                {{-- <h3 class="fs-60"><span class="timer fs-60" data-to="120" data-speed="3000">0</span>+</h3> --}}
                                                {{ $ourfacilitie->title }}
                                            </div>
                                        </div>

                                        <div class="col-lg-7" style="height:180px;">
                                            <p class="no-bottom">{{ $ourfacilitie->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-md-6">
                        <div class="relative">
                            <img src="{{ asset('website/assets/images/misc/Audi VIP.jpg') }}"
                                class="img-fluid wow fadeInUp" style="height: 450px;" alt="">
                            <div class="bg-color text-light p-4 start-10 mx-4  mt-70 wow fadeInDown" data-wow-delay="">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-5 text-center">
                                        <div class="de_count fs-15 wow fadeInRight" data-wow-delay=".2s"
                                            style="font-size: 20px;">
                                             <h3 class="fs-60"><span class="timer fs-60" data-to="105" data-speed="3000">0</span>+</h3>
                                            VIP Comfort & Modern Amenities
                                        </div>
                                    </div>

                                    <div class="col-lg-7" style="height: 180px;">
                                        <p class="no-bottom">Relax in fully air-conditioned and HVAC-equipped green rooms
                                            with modern facilities, ensuring a premium experience for speakers, performers,
                                            and dignitaries.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="spacer-single"></div>
        </section>

        {{-- <section class="no-top no-bottom section-dark" aria-label="section">
        <a class="d-block hover popup-youtube" href="https://youtu.be/tgXmmA3M8yY">
            <div class="relative overflow-hidden">
                <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                    <div class="player wow scaleIn"><span></span></div>
                </div>
                <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                <img src="{{asset('website/assets/images/background/9.webp')}}" class="img-fluid" alt="">
            </div>
        </a>
        </section> --}}

        <section class="bg-light relative pt50 no-bottom">
            <div class="container relative z-2">
                <div class="row g-4">
                    <div class="col-lg-8 offset-lg-2 mb-4 text-center">
                        <div class="subtitle wow fadeInUp mb-3">Our Youtube</div>
                        <h2 class="wow fadeInUp"></h2>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="row g-0">

                            <!-- Video 1 -->
                            <div class="col-3">
                                <a href="https://youtu.be/fFfS-5J3FKs"
                                    class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="fFfS-5J3FKs">
                                    <img src="{{ asset('website/assets/images/gallery-square/3.jpeg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>



                            {{-- <div class="col-3">
                                <a href="https://youtu.be/fFfS-5J3FKs"
                                    class="d-block hover relative overflow-hidden text-light">
                                    <img src="{{ asset('website/assets/images/gallery-square/3.jpeg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div> --}}


                            <div class="col-3">
                                <a href="https://youtu.be/Rsz7XpPZ1ck"
                                    class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="Rsz7XpPZ1ck">
                                    <img src="{{ asset('website/assets/images/gallery-square/2.jpeg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="https://youtu.be/tgXmmA3M8yY"
                                    class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="tgXmmA3M8yY">
                                    <img src="{{ asset('website/assets/images/gallery-square/Audi 2.jpg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="#" class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="">
                                    <img src="{{ asset('website/assets/images/gallery-square/Audi 1.png') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-0">
                            <div class="col-3">
                                <a href="#" class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="">
                                    <img src="{{ asset('website/assets/images/gallery-square/Audi 3.jpg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="#" class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="">
                                    <img src="{{ asset('website/assets/images/gallery-square/Audi gr.jpg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="#" class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="">
                                    <img src="{{ asset('website/assets/images/gallery-square/Audi VIP.jpg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="#" class="d-block hover relative overflow-hidden text-light video-link"
                                    data-video-id="">
                                    <img src="{{ asset('website/assets/images/gallery-square/6.jpeg') }}"
                                        class="w-100 hover-scale-1-1" alt="">
                                    <div class="abs abs-centered fs-24 text-white hover-op-0">
                                        <i class="fa-brands fa-youtube" style="color: red"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe id="videoIframe" src="" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var videoModal = new bootstrap.Modal(document.getElementById("videoModal"));
                var videoIframe = document.getElementById("videoIframe");

                document.querySelectorAll(".video-link").forEach(function(link) {
                    link.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent redirecting to YouTube

                        var videoId = link.getAttribute("data-video-id");
                        if (videoId) {
                            videoIframe.src = "https://www.youtube.com/embed/" + videoId +
                                "?autoplay=1&rel=0";
                            videoModal.show();
                        }
                    });
                });

                document.getElementById("videoModal").addEventListener("hidden.bs.modal", function() {
                    videoIframe.src = ""; // Stop video when modal is closed
                });
            });
        </script>
    @endsection
