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
                            <h1>Gallery</h1>
                            <ul class="crumb">
                                <li><a href="{{route('Index.Page')}}">Home</a></li>
                                <li class="active">Gallery</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="de-overlay"></div>
            </section>

            <section class="relative lines-deco">
                <div class="container">
                    <div class="row g-4">
                        @foreach ($images as $image)


                        <div class="col-lg-4 text-center" >
                            <a href="{{asset('Gallery/'.$image->image)}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10" >
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('Gallery/'.$image->image)}}" class="img-fluid hover-scale-1-2" alt="" style="height: 280px;">
                                </div>
                            </a>
                        </div>
                        @endforeach

                        {{-- <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/2.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/2.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/3.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/3.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/4.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/4.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/5.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/5.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/6.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/6.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/7.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/7.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/8.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/8.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="{{asset('website/assets/images/gallery/9.webp')}}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{asset('website/assets/images/gallery/9.webp')}}" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div> --}}

                    </div>
                </div>
            </section>
        </div>
        <!-- content close -->
@endsection
