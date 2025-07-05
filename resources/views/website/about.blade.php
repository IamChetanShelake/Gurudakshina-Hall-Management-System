@extends('website.layout.master')
@section('content')





        <!-- content begin -->
        <div class="no-bottom no-top" id="content">

            <div id="top"></div>

            <section id="subheader" class="relative jarallax text-light">
                <img src="{{asset('website/assets/images/background/Background.jpg')}}" class="jarallax-img" alt="">
                <div class="container relative z-index-1000">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <h1>About Us</h1>
                            <ul class="crumb">
                                <li><a href="{{route('Index.Page')}}">Home</a></li>
                                <li class="active">About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="de-overlay"></div>
            </section>

            <section class="relative lines-deco">
                <div class="container">

                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="subtitle wow fadeInUp mb-3">Welcome</div>
                            <h2 class="wow fadeInUp" data-wow-delay=".2s">{{$about->title}}</h2>
                            <p>{!! $about->description !!}</p>
                        </div>

                        <div class="col-lg-6">



                            <div class="row g-4">
                                @if($about && $about->image)
                                <img src="{{asset('About_images/'.$about->image)}}" class="img-fluid mb-4 wow zoomIn" alt="">
                                @else
                                <p>No Image Available</p>
                                @endif

                                {{-- <div class="col-6">
                                    <img src="{{asset('website/assets/images/misc/7.webp')}}" class="img-fluid mb-4 wow zoomIn" alt="">
                                    <div class="col-12 text-center">
                                        <div class="bg-color-2 text-light p-4">
                                            <div class="de_count wow fadeInUp">
                                                <h2 class="mb-0"><span class="timer" data-to="120" data-speed="3000"></span>+</h2>
                                                <span>Rooms Available</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="spacer-single sm-hide"></div>
                                    <div class="col-12 text-center">
                                        <div class="bg-color text-light p-4">
                                            <div class="de_count wow fadeInUp">
                                                <h2 class="mb-0"><span class="timer" data-to="105" data-speed="3000"></span>%</h2>
                                                <span>Menu Selection</span>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset('website/assets/images/misc/8.webp')}}" class="img-fluid mt-4 wow zoomIn" alt="">
                                </div> --}}
                            </div>

                        </div>

                    </div>

                </div>
            </section>

            <section class="bg-light lines-deco">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-12 text-center">
                            <div class="subtitle wow fadeInUp mb-3">Behind the Scene</div>
                            <h2 class="wow fadeInUp mb-0" data-wow-delay=".2s">Our Team</h2>
                        </div>
                        <div class=" row justify-content-center text-center">
                            @foreach ($teams as $team)
                                <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center"
                                    style="display: flex; flex-direction: column; align-items: center; text-align: center;">

                                    <div class="team-member" style="width: 100%;">
                                        <img src="{{ asset('Team_images/' . $team->image) }}" class="img-fluid" alt=""
                                            style="max-width: 100%; height: auto; display: block; margin: 0 auto;">

                                        <div class="p-3">
                                            <h4 class="mb-0">{{ $team->name }}</h4>
                                            <p class="mb-2">{{ $team->designation }} </p>

                                            <div class="social-icons" style="display: flex; justify-content: center; gap: 10px;">
                                                <a href="#"><i class="bg-white bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
                                                <a href="#"><i class="bg-white bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
                                                <a href="#"><i class="bg-white bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>



                        {{-- <div class="col-lg-3">
                            <img src="{{asset('website/assets/images/team/2.webp')}}" class="img-fluid" alt="">
                            <div class="p-3 text-center
                            ">
                                <h4 class="mb-0">Sophia Jenkins</h4>
                                <p class="mb-2">Founder &amp;  CEO</p>
                                <div class="social-icons">
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <img src="{{asset('website/assets/images/team/3.webp')}}" class="img-fluid" alt="">
                            <div class="p-3 text-center
                            ">
                                <h4 class="mb-0">Ethan Reynolds</h4>
                                <p class="mb-2">Founder &amp;  CEO</p>
                                <div class="social-icons">
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <img src="{{asset('website/assets/images/team/4.webp')}}" class="img-fluid" alt="">
                            <div class="p-3 text-center
                            ">
                                <h4 class="mb-0">Noah Anderson</h4>
                                <p class="mb-2">Founder &amp;  CEO</p>
                                <div class="social-icons">
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-x-twitter"></i></a>
                                    <a href="#"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section>

            <section class="relative lines-deco">
                <div class="container relative z-2">
                    <div class="row g-4">

                        <div class="col-lg-6">
                            <div class="ms-4">
                                <div class="subtitle wow fadeInUp mb-3">Halls &amp; Suites</div>
                                <h2 class="wow fadeInUp mb-5">Hall Facilities</h2>

                                <div class="row g-3">
                                    @foreach ($facilites as $facilite)


                                    <div class="col-lg-6">
                                        <div class="mb-4 relative wow fadeInRight" data-wow-delay=".3s">
                                            <img src="{{asset('Facilitie_images/'.$facilite->image)}}" class="w-50px absolute id-color icofont-thunder-light" alt="">
                                            <div class="pl-70">
                                                <h5>{{$facilite->title}}</h5>
                                                <p class="mb-0">{{$facilite->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{-- <div class="col-lg-6">
                                        <div class="mb-4 relative wow fadeInRight" data-wow-delay=".3s">
                                            <img src="{{asset('website/assets/images/icons/tv.png')}}" class="w-50px absolute id-color icofont-thunder-light" alt="">
                                            <div class="pl-70">
                                                <h5>Audio-Visual Setup</h5>
                                                <p class="mb-0">Equipped with projectors, microphones, and high-quality sound systems.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4 relative wow fadeInRight" data-wow-delay=".3s">
                                            <img src="{{asset('website/assets/images/icons/desk.png')}}" class="w-50px absolute id-color icofont-thunder-light" alt="">
                                            <div class="pl-70">
                                                <h5>Comfortable Seating Arrangements</h5>
                                                <p class="mb-0">Flexible layouts for seminars, training sessions, and conferences.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4 relative wow fadeInRight" data-wow-delay=".3s">
                                            <img src="{{asset('website/assets/images/icons/wifi.png')}}" class="w-50px absolute id-color icofont-thunder-light" alt="">
                                            <div class="pl-70">
                                                <h5>High-Speed WiFi & IT Support</h5>
                                                <p class="mb-0">Ensuring seamless online connectivity for virtual and hybrid events.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4 relative wow fadeInRight" data-wow-delay=".3s">
                                            <img src="{{asset('website/assets/images/icons/balcony.png')}}" class="w-50px absolute id-color icofont-thunder-light" alt="">
                                            <div class="pl-70">
                                                <h5>Refreshments & Catering</h5>
                                                <p class="mb-0">Customizable options for coffee breaks and meals.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-4 relative wow fadeInRight" data-wow-delay=".3s">
                                            <img src="{{asset('website/assets/images/icons/guests.png')}}" class="w-50px absolute id-color icofont-thunder-light" alt="">
                                            <div class="pl-70">
                                                <h5>Dedicated Event Support</h5>
                                                <p class="mb-0">Professional assistance for smooth event execution.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="relative">
                                        <img src="{{asset('website/assets/images/misc/2 - Copy (2).png')}}" class="img-fluid wow fadeInUp" alt="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="spacer-single sm-hide"></div>
                                    <div class="relative">
                                        <img src="{{asset('website/assets/images/misc/Audi 3.jpg')}}" class="img-fluid wow fadeInUp" alt="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="relative">
                                        <img src="{{asset('website/assets/images/misc/Audi gr - Copy (2).jpg')}}" class="img-fluid wow fadeInUp" alt="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="spacer-single sm-hide"></div>
                                    <div class="relative">
                                        <img src="{{asset('website/assets/images/misc/Audi VIP - Copy (2).jpg')}}" class="img-fluid wow fadeInUp" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </section>

            {{-- <section class="relative pt50 no-bottom" >


                <div class="container-fluid">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="row g-0">
                                <div class="col-3">
                                    <a href="https://youtu.be/Rsz7XpPZ1ck" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/3.jpeg')}}" class="w-100 hover-scale-1-1" alt="">
                                        <div class="abs abs-centered fs-24 text-white hover-op-0">
                                            <i class="fa-brands fa-youtube" style="color: red"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="https://youtu.be/fFfS-5J3FKs" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/2.jpeg')}}" class="w-100 hover-scale-1-1" alt="">
                                        <div class="abs abs-centered fs-24 text-white hover-op-0">
                                            <i class="fa-brands fa-youtube" style="color: red"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="https://youtu.be/tgXmmA3M8yY" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/Audi 2.jpg')}}" class="w-100 hover-scale-1-1" alt="">
                                        <div class="abs abs-centered fs-24 text-white hover-op-0">
                                            <i class="fa-brands fa-youtube" style="color: red"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/Audi 1.png')}}" class="w-100 hover-scale-1-1" alt="">
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
                                    <a href="#" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/Audi 3.jpg')}}" class="w-100 hover-scale-1-1" alt="">
                                        <div class="abs abs-centered fs-24 text-white hover-op-0">
                                            <i class="fa-brands fa-youtube" style="color: red"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/Audi gr.jpg')}}" class="w-100 hover-scale-1-1" alt="">
                                        <div class="abs abs-centered fs-24 text-white hover-op-0">
                                            <i class="fa-brands fa-youtube" style="color: red"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/Audi VIP.jpg')}}" class="w-100 hover-scale-1-1" alt="">
                                        <div class="abs abs-centered fs-24 text-white hover-op-0">
                                            <i class="fa-brands fa-youtube" style="color: red"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="d-block hover relative overflow-hidden text-light">
                                        <img src="{{asset('website/assets/images/gallery-square/6.jpeg')}}" class="w-100 hover-scale-1-1" alt="">
                                        <div class="abs abs-centered fs-24 text-white hover-op-0">
                                            <i class="fa-brands fa-youtube" style="color: red"></i>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
                document.addEventListener("DOMContentLoaded", function () {
                    var videoModal = new bootstrap.Modal(document.getElementById("videoModal"));
                    var videoIframe = document.getElementById("videoIframe");

                    document.querySelectorAll(".video-link").forEach(function (link) {
                        link.addEventListener("click", function (event) {
                            event.preventDefault(); // Prevent redirecting to YouTube

                            var videoId = link.getAttribute("data-video-id");
                            if (videoId) {
                                videoIframe.src = "https://www.youtube.com/embed/" + videoId + "?autoplay=1&rel=0";
                                videoModal.show();
                            }
                        });
                    });

                    document.getElementById("videoModal").addEventListener("hidden.bs.modal", function () {
                        videoIframe.src = ""; // Stop video when modal is closed
                    });
                });
            </script>
        </div>
        <!-- content close -->






@endsection
