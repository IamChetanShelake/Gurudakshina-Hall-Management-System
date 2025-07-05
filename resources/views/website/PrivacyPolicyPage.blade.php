@extends('website.layout.master')

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="subheader" class="relative jarallax text-light">
            <img src="{{ asset('website/assets/images/background/Background.jpg') }}" class="jarallax-img" alt="">
            <div class="container relative z-index-1000">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>Terms & Conditions </h1>
                        {{-- <p class="lead mt-3">
                            We are committed to protecting your privacy. Any personal information collected through our website is securely stored and used solely for providing our services. We do not share your data with third parties without your consent.
                        </p> --}}
                        <ul class="crumb">
                            <li><a href="{{ route('Index.Page') }}">Home</a></li>
                            <li class="active">Terms & Conditions</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="de-overlay"></div>
        </section>
        {{-- <div class="container" >

            <p>{{ $hallpage->description }}</p>
        </div> --}}
        <section class="service-details">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 col-md-12 col-sm-12  content-side ">
                        <div class="service-details-content">
                            <div class="inner">
                                <h2>{{ $hall->name }}</h2>
                                {{-- <h3>{{ $hallpage->title }}</h3> --}}
                                <p style="">{!!$hallpage->description!!}</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>








    </div>
@endsection
