@extends('website.layout.master')

@section('content')
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section id="subheader" class="relative jarallax text-light">
                <img src="{{asset('website/assets/images/background/3.webp')}}" class="jarallax-img" alt="">
                <div class="container relative z-index-1000">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h1>
                                {{$page->title}}
                                {{-- jscgiuasgciug --}}
                            </h1>

                            <ul class="crumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">{{$page->title}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="de-overlay"></div>
            </section>


            <section class="service-details">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10 col-md-12 col-sm-12  content-side ">
                            <div class="service-details-content">
                                <div class="inner">

                                    <p style="">
                                        {!!$page->description!!}
                                        {{-- ojvdpjpvj
                                        sdvj
                                        [osdvj[ojdv]]
                                    </p> --}}

                                </div>
                                {{-- <div class="two-column">
                                    <div class="row clearfix align-items-center">
                                        <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                            <figure class="image-box"><img src="{{asset('website/assets/images/service/service-details-2.jpg')}}" alt=""></figure>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                            <div class="text">
                                                <h3>Take Easy Steps</h3>
                                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                                                <ul class="list-item clearfix">
                                                    <li>Business & Consulting Agency</li>
                                                    <li>Awards Winning Business Comapny</li>
                                                    <li>Complete Guide To Mechanical</li>
                                                    <li>Firebase Authentication & Database</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}



                                {{-- <div class="accordion-inner">
                                    <ul class="accordion-box">
                                        <li class="accordion block">
                                            <div class="acc-btn">
                                                <div class="icon-outer"><i class="far fa-plus"></i></div>
                                                <h6>How To Create A Mobile App In Expo And Firebase</h6>
                                            </div>
                                            <div class="acc-content">
                                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some</p>
                                            </div>
                                        </li>
                                        <li class="accordion block active-block">
                                            <div class="acc-btn active">
                                                <div class="icon-outer"><i class="far fa-plus"></i></div>
                                                <h6>Smashing Podcast Episode With Ben How Optimize ?</h6>
                                            </div>
                                            <div class="acc-content current">
                                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some</p>
                                            </div>
                                        </li>
                                        <li class="accordion block">
                                             <div class="acc-btn">
                                                <div class="icon-outer"><i class="far fa-plus"></i></div>
                                                <h6>Learning Resources Challenging Online Workshops ?</h6>
                                            </div>
                                            <div class="acc-content">
                                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some</p>
                                            </div>
                                        </li>
                                        <li class="accordion block">
                                             <div class="acc-btn">
                                                <div class="icon-outer"><i class="far fa-plus"></i></div>
                                                <h6>Micro-Typography: How To Space And Kern ?</h6>
                                            </div>
                                            <div class="acc-content">
                                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </section>







        </div>
        <!-- content close -->


@endsection
