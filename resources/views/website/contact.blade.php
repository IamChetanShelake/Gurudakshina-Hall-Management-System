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
                        <h1>Contact Us</h1>
                        <p class="lead mt-3">
                            Have a question or need assistance with your booking? Our dedicated team is available around the
                            clock to provide you with prompt and friendly service.
                        </p>
                        <ul class="crumb">
                            <li><a href="{{ route('Index.Page') }}">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="de-overlay"></div>
        </section>

        <section class="relative lines-deco">
            <div class="container">
                <div class="row g-4 justify-content-center">

                    <div class="col-lg-7">

                        <form name="contactForm" id="contact_form" class="position-relative z1000" method="post"
                            action="contact.php">
                            <div id="contact_form_wrap" class="row gx-4">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <h3 class="mb-4">Write a Message</h3>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb10">
                                    <div class="field-set">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Your Name" required>
                                    </div>

                                    <div class="field-set">
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Your Email" required>
                                    </div>

                                    <div class="field-set">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Your Phone" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="field-set mb20">
                                        <textarea name="message" id="message" class="form-control" placeholder="Your Message" required></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <input type='submit' id='send_message' value='Send Message' class="btn-main">
                                    </div>
                                </div>
                            </div>


                            <div id="success_message" class='success'>
                                Your message has been sent successfully. Refresh this page if you want to send more
                                messages.
                            </div>
                            <div id="error_message" class='error'>
                                Sorry there was an error sending your form.
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </section>
        <!-- google-map-section -->
        <section class="google-map-section">
            <div class="map-inner">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d468.63971764255695!2d73.76249827569983!3d20.003572508349674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddebb43ce16995%3A0xe04829f2ca0f9a62!2sGurudakshina%20Auditorium!5e0!3m2!1sen!2sin!4v1741686144198!5m2!1sen!2sin"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
        </section>






    </div>
    <!-- content close -->
@endsection
