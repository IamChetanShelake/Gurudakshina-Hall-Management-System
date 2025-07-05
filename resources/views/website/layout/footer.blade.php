 <!-- footer begin -->
 <footer class="text-light section-dark">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-12">
                <div class="d-lg-flex align-items-center justify-content-between text-center">
                    <div>
                        <img src="{{asset('website/assets/Gokhale-logo.png')}}" style="height: 100px; width: 100px;" alt=""><br>
                        <div class="social-icons mb-sm-30 mt-4">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>

                    @foreach ($contacts as $contact)

                        <div style="text-align: left; margin-bottom: 30px;">
                            <h3 class="fs-20 mt-4">{{$contact->title}}</h3>
                            {!!$contact->description!!}
                        </div>

                    @endforeach

                    {{-- <div style="text-align: left;">
                        <h3 class="fs-20">Address</h3>
                        Prin. T. A. Kulkarni Vidyanagar,<br>
                        College Road, Nashik,<br>
                        422 005
                    </div> --}}
                    <div style="text-align: left;">
                        <h3 class="fs-20 mt-4">PAGES</h3>
                        <ul class="links-list clearfix" style="list-style: none; padding-left: 0; margin: 0;">
                            @foreach ($pages as $page)
                                    <li><a href="{{ route('legal.pages', $page->id) }}">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-12 col-md-6 mb-2 mb-md-0">
                    Copyright 2025 - All Rights Reserved by Gurudakshina
                </div>
                <div class="col-12 col-md-6 text-md-end">
                    Design and Developed By
                    <a href="http://techmetsolutions.com/#/">TechMet Solutions</a>
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- footer close -->
</div>



<!-- Javascript Files
================================================== -->
<script src="{{asset('website/assets/js/plugins.js')}}"></script>
<script src="{{asset('website/assets/js/designesia.js')}}"></script>
<script src="{{asset('website/assets/js/swiper.js')}}"></script>
<script src="{{asset('website/assets/js/custom-marquee.js')}}"></script>
<script src="{{asset('website/assets/js/custom-swiper-2.js')}}"></script>


</body>

</html>
