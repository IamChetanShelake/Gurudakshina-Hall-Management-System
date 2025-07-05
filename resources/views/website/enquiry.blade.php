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
                        <h1>Enquiry Now</h1>
                        <p class="mt-3 lead">Ready to host an unforgettable event? Book your hall now and step into a world of elegance and sophistication. Your perfect venue is just a click away!</p>
                        <ul class="crumb">
                            <li><a href="{{ route('Index.Page') }}">Home</a></li>
                            <li class="active">Enquiry Now</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="de-overlay"></div>
        </section>
        <div class="p-3">
                    @if(session('success'))
                        <div class="alert alert-success" id="successMessage">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            $("#successMessage").fadeOut('slow');
                        }, 3000);
                    });
                </script>

        <section id="section_form" class="relative lines-deco">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div id="success_message" class="text-center">
                            <h2>Your reservation has been sent successfully.</h2>
                            <div class="col-lg-8 offset-lg-2">
                                <p>We will contact you shortly. Refresh this page if you want to make another reservation.
                                </p>

                                <img src="{{ asset('website/assets/images/misc/2.webp') }}" class="w-100 rounded-up-100"
                                    alt="">
                            </div>
                        </div>

                        {{-- <div id="booking_form_wrap">
                            <div class="container card" style="background-color: #fff5ed">
                            <form name="contactForm" id='booking_form' class="form-border" method="post"
                                action="booking.php">

                                    {{-- <div class="card mt-4" style="border: 2px solid #a88465;">
                                        <div style="padding: 50px;">
                                            <h2>Hall Enquiry Form</h2>

                                            <div id="step-2" class="row g-4">
                                                <h4>Enter your details</h4>
                                                <form method="POST" action="{{ url('/hall-enquiry') }}">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <div>
                                                            <input type='text' name='name' id='name'
                                                                class="form-control" placeholder="Name of Person" required>
                                                        </div>
                                                        <div>
                                                            <input type='text' name='organization' id='organization'
                                                                class="form-control" placeholder="Name of Organization">
                                                        </div>
                                                        <div>
                                                            <input type='text' name='gst_no' id='gst_no'
                                                                class="form-control" placeholder="GST No.">
                                                        </div>
                                                        <div>
                                                            <input type='email' name='email' id='email'
                                                                class="form-control" placeholder="Email Address" required>
                                                        </div>
                                                        <div>
                                                            <input type='text' name='contact_no' id='contact_no'
                                                                class="form-control" placeholder="Contact No." required>
                                                        </div>
                                                        <div>
                                                            <input type='text' name='address' id='address'
                                                                class="form-control" placeholder="Address" required>
                                                        </div>
                                                        <div>
                                                            <input type='text' name='referred_by' id='referred_by'
                                                                class="form-control" placeholder="Referred By">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4>Event Details</h4>
                                                        <div>
                                                            <input type='text' name='event_type' id='event_type'
                                                                class="form-control" placeholder="Type of Event" required>
                                                        </div>
                                                        <div>
                                                            <label>Select Type</label>
                                                            <select name='hall' id='hall' class="form-control" required>
                                                                <option value="">-- Select Type --</option>
                                                                @foreach ($halls as $hall)
                                                                <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <input type='date' name='event_date' id='event_date'
                                                                class="form-control" required>
                                                        </div>
                                                        <div>
                                                            <select name='duration' id='duration' class="form-control"
                                                                required>
                                                                <option value="full_day">Full Day</option>
                                                                <option value="half_day_morning">Half Day (Morning)</option>
                                                                <option value="half_day_evening">Half Day (Evening)</option>
                                                            </select>

                                                        </div>
                                                        <div>
                                                            <label for="start_time">Start Time</label>
                                                            <input type="time" name="start_time" id="start_time" class="form-control" required>
                                                        </div>
                                                        <div>
                                                            <label for="end_time">End Time</label>
                                                            <input type="time" name="end_time" id="end_time" class="form-control" required>
                                                        </div>
                                                        <div>
                                                            <input type='number' name='expected_audience'
                                                                id='expected_audience' class="form-control"
                                                                placeholder="Expected No. of Audience" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p id='submit'>
                                                            <input type='submit' id='send_message' value='Submit Form'
                                                                class="btn-main">
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                </form>
                            </div>
                            <div id='error_message' class='error'>Sorry, error occured this time sending your message.
                            </div>
                        </div> --}}




                        <div id="booking_form_wrap">
                            <div class="container card p-4 shadow-sm" style="background-color: #fff5ed; border-radius: 10px;">
                                <h2 class="text-center mb-4">Hall Enquiry Form</h2>

                                <form name="contactForm" class="form-border" method="POST" action="{{ route('enquiry.store') }}">
                                    @csrf

                                    <div class="row g-4">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <h4>Enter Your Details</h4>
                                            <div class="mb-3">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name of Person *" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" name="organization" id="organization" class="form-control" placeholder="Name of Organization *" value="{{ old('organization') }}">
                                                @error('organization')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" name="gst_no" id="gst_no" class="form-control" placeholder="GST No." value="{{ old('gst_no') }}">
                                            </div>

                                            <div class="mb-3">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address *" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Contact No. *" value="{{ old('contact_no') }}" required>
                                                @error('contact_no')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{ old('address') }}">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" name="referred_by" id="referred_by" class="form-control" placeholder="Referred By" value="{{ old('referred_by') }}">
                                            </div>

                                            <div class="p-2 border shadow-sm bg-white">
                                                <label class=" text-dark mb-2">Vendor Services:</label><br>

                                                <div class="form-check form-check-inline mt-2">
                                                    <input class="form-check-input" type="checkbox" name="vendor[]"
                                                        value="event"
                                                        {{ is_array(old('vendor', json_decode($hallEnquiry->vendor ?? '[]', true))) && in_array('event', old('vendor', json_decode($hallEnquiry->vendor ?? '[]', true))) ? 'checked' : '' }}>
                                                    <label class="form-check-label">Event</label>
                                                </div>

                                                <div class="form-check form-check-inline mt-2">
                                                    <input class="form-check-input" type="checkbox" name="vendor[]"
                                                        value="catering"
                                                        {{ is_array(old('vendor', json_decode($hallEnquiry->vendor ?? '[]', true))) && in_array('catering', old('vendor', json_decode($hallEnquiry->vendor ?? '[]', true))) ? 'checked' : '' }}>
                                                    <label class="form-check-label">Catering</label>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <h4>Event Details *</h4>
                                            <div class="mb-3">
                                                <input type="text" name="event_type" id="event_type" class="form-control" placeholder="Type of Event *" value="{{ old('event_type') }}" required>
                                                @error('event_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- <div class="mb-3" style="background-color: #fff !important;">
                                                <select name="hall" id="hall" class="form-control" required>
                                                    <option value="" selected disabled>-- Select Hall --</option>
                                                    @foreach ($halls as $hall)
                                                        <option value="{{ $hall->name }}" {{ old('hall') == $hall->id ? 'selected' : '' }}>{{ $hall->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('hall')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div> --}}

                                            <div class="mb-3" style="background-color: #fff !important;">
                                                <select name="hall" id="hall" class="form-control" required>
                                                    <option value="" selected disabled>-- Select Hall --</option>
                                                    @foreach ($halls as $hall)
                                                        <option value="{{ $hall->name }}" data-hall-id="{{ $hall->id }}"
                                                            {{ old('hall') == $hall->name ? 'selected' : '' }}>
                                                            {{ $hall->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('hall')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Hidden input field to store hall_id -->
                                            <input type="hidden" name="hall_id" id="hall_id">



                                                <script>
                                                document.getElementById("hall").addEventListener("change", function() {
                                                    var selectedOption = this.options[this.selectedIndex];
                                                    document.getElementById("hall_id").value = selectedOption.getAttribute("data-hall-id");
                                                });
                                                </script>


                                            <div class="mb-3">
                                                <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date') }}" required>
                                                @error('event_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3" style="background-color: #fff !important;">
                                                <select name="duration" id="duration" class="form-control" required>
                                                    <option value="full_day" {{ old('duration') == 'Full Day' ? 'selected' : '' }}>Full Day</option>
                                                    <option value="half_day_morning" {{ old('duration') == 'Half Day (Morning)' ? 'selected' : '' }}>Half Day (Morning)</option>
                                                    <option value="half_day_evening" {{ old('duration') == 'Half Day (Evening)' ? 'selected' : '' }}>Half Day (Evening)</option>
                                                </select>
                                                @error('duration')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="start_time" class="form-label">Start Time *</label>
                                                <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" required>
                                                @error('start_time')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="end_time" class="form-label">End Time *</label>
                                                <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" required>
                                                @error('end_time')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" name="expected_audience" id="expected_audience" class="form-control"
                                                    placeholder="Expected No. of Audience *" value="{{ old('expected_audience') }}" required>
                                                @error('expected_audience')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-md-12 text-center mt-3">
                                            <button type="submit" id="send_message" style="background-color: #AB8965; color: white; height: 40px; width: 100px;">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <!-- Error Message -->
                            <div id="error_message" class="text-danger text-center mt-3" style="display: none;">
                                Sorry, an error occurred while sending your message.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
@endsection
