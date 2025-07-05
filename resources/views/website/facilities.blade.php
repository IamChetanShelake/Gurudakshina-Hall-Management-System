@extends('website.layout.master')

@section('content')



        <!-- content begin -->
        <div class="no-bottom no-top" id="content">

            <div id="top"></div>

            <section id="subheader" class="relative jarallax text-light">
                <img src="{{asset('website/assets/images/background/mixed-1.webp')}}" class="jarallax-img" alt="">
                <div class="container relative z-index-1000">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h1>Facilities</h1>
                            <p class="lead mt-3">Take advantage of our exceptional facilities. From relaxation to recreation, we have everything you need for an unforgettable stay.</p>
                            <ul class="crumb">
                                <li><a href="{{route('Index.Page')}}">Home</a></li>
                                <li class="active">Facilities</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="de-overlay"></div>
            </section>

            <section class="relative lines-deco">
                <div class="container">
                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <div class="relative wow fadeInUp" data-wow-delay=".3s">
                                <div class="shape-mask-1 jarallax">
                                    <img src="{{asset('website/assets/images/facilities/1.webp')}}" class="jarallax-img" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="ms-lg-5 wow scaleIn">
                                <h2 class="wow fadeInUp">Cafe and Restaurant</h2>
                                <p></p>Lorem ipsum dolore laboris voluptate sint aliquip ex consequat in nulla aute in magna elit incididunt pariatur mollit sint eu cillum sed adipisicing eu est commodo qui aliquip minim dolor est veniam do exercitation nostrud cupidatat id ea consequat dolore.
                            </div>
                        </div>
                    </div>

                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <div class="me-lg-5 wow scaleIn">
                                <h2 class="wow fadeInUp">Swimming Pool</h2>
                                <p></p>Lorem ipsum dolore laboris voluptate sint aliquip ex consequat in nulla aute in magna elit incididunt pariatur mollit sint eu cillum sed adipisicing eu est commodo qui aliquip minim dolor est veniam do exercitation nostrud cupidatat id ea consequat dolore.
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="relative wow fadeInUp" data-wow-delay=".3s">
                                <div class="shape-mask-2 jarallax">
                                    <img src="{{asset('website/assets/images/facilities/2.webp')}}" class="jarallax-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <div class="relative wow fadeInUp" data-wow-delay=".3s">
                                <div class="shape-mask-1 jarallax">
                                    <img src="{{asset('website/assets/images/facilities/3.webp')}}" class="jarallax-img" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="ms-lg-5 wow scaleIn">
                                <h2 class="wow fadeInUp">Fitness Center</h2>
                                <p></p>Lorem ipsum dolore laboris voluptate sint aliquip ex consequat in nulla aute in magna elit incididunt pariatur mollit sint eu cillum sed adipisicing eu est commodo qui aliquip minim dolor est veniam do exercitation nostrud cupidatat id ea consequat dolore.
                            </div>
                        </div>
                    </div>

                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <div class="me-lg-5 wow scaleIn">
                                <h2 class="wow fadeInUp">Meeting Room</h2>
                                <p></p>Lorem ipsum dolore laboris voluptate sint aliquip ex consequat in nulla aute in magna elit incididunt pariatur mollit sint eu cillum sed adipisicing eu est commodo qui aliquip minim dolor est veniam do exercitation nostrud cupidatat id ea consequat dolore.
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="relative wow fadeInUp" data-wow-delay=".3s">
                                <div class="shape-mask-2 jarallax">
                                    <img src="{{asset('website/assets/images/facilities/4.webp')}}" class="jarallax-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <div class="relative wow fadeInUp" data-wow-delay=".3s">
                                <div class="shape-mask-1 jarallax">
                                    <img src="{{asset('website/assets/images/facilities/5.webp')}}" class="jarallax-img" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="ms-lg-5 wow scaleIn">
                                <h2 class="wow fadeInUp">Spa &amp; Massage</h2>
                                <p></p>Lorem ipsum dolore laboris voluptate sint aliquip ex consequat in nulla aute in magna elit incididunt pariatur mollit sint eu cillum sed adipisicing eu est commodo qui aliquip minim dolor est veniam do exercitation nostrud cupidatat id ea consequat dolore.
                            </div>
                        </div>
                    </div>

                    <div class="row g-0 align-items-center justify-content-center">
                        <div class="col-lg-5">
                            <div class="me-lg-5 wow scaleIn">
                                <h2 class="wow fadeInUp">Laundry Service</h2>
                                <p></p>Lorem ipsum dolore laboris voluptate sint aliquip ex consequat in nulla aute in magna elit incididunt pariatur mollit sint eu cillum sed adipisicing eu est commodo qui aliquip minim dolor est veniam do exercitation nostrud cupidatat id ea consequat dolore.
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="relative wow fadeInUp" data-wow-delay=".3s">
                                <div class="shape-mask-2 jarallax">
                                    <img src="{{asset('website/assets/images/facilities/6.webp')}}" class="jarallax-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
        </div>
        <!-- content close -->






@endsection
