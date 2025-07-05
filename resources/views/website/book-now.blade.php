{{-- @extends('website.layout.master')

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="subheader" class="relative jarallax text-light">
            <img src="{{ asset('website/assets/images/background/Background.jpg') }}" class="jarallax-img" alt="">
            <div class="container relative z-index-1000">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>Book Now</h1>

                        <ul class="crumb">
                            <li><a href="{{ route('Index.Page') }}">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="de-overlay"></div>
        </section>

        <section>
            <div class="container mt-4">
                <div class="row">
                    <!-- Left Side: Hall Image -->
                    <div class="col-md-5 hall-image-container">
                        @if ($booking->hall && $booking->halll->image)
                            <img src="{{ asset('Hall_images/'.$booking->halll->image) }}" alt="Hall Image" class="img-fluid rounded shadow">
                        @else
                            <p class="text-muted">No Image Available</p>
                        @endif
                    </div>

                    <!-- Right Side: Hall Details -->
                    <div class="col-md-7 hall-details-container">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h4 >Customer Name:- {{ $booking->name }}</h4>
                                <p class="text-muted">Organization:- {{ $booking->organization }}</p>
                                <h5>Hall Name:- {{ $booking->hall }}</h5>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Email:</strong> {{ $booking->email }}</li>
                                    <li class="list-group-item"><strong>Contact:</strong> {{ $booking->contact_no }}</li>
                                    <li class="list-group-item"><strong>Event Type:</strong> {{ $booking->event_type }}</li>
                                    <li class="list-group-item"><strong>Event Date:</strong> {{ $booking->event_date }}</li>
                                    <li class="list-group-item"><strong>Duration:</strong> {{ $booking->duration }}</li>
                                    <li class="list-group-item"><strong>Expected Audience:</strong> {{ $booking->expected_audience }}</li>
                                    <li class="list-group-item"><strong>Status:</strong> {{ $booking->status }}</li>
                                    <li class="list-group-item"><strong>Rent Amount:</strong> ₹{{ number_format($booking->rent_amount, 2) }}</li>
                                    <li class="list-group-item"><strong>GST No:</strong> {{ $booking->gst_no }}</li>
                                    <li class="list-group-item"><strong>Address:</strong> {{ $booking->address }}</li>
                                    <li class="list-group-item"><strong>Referred By:</strong> {{ $booking->referred_by }}</li>
                                    <li class="list-group-item"><strong>Special Note:</strong> {{ $booking->special_note }}</li>
                                    <li class="list-group-item"><strong>ID Proof:</strong> {{ $booking->id_proof }}</li>
                                    <li class="list-group-item"><strong>Event Setup:</strong> {{ $booking->event_setup }}</li>
                                    <li class="list-group-item"><strong>Catering:</strong>
                                        <br>
                                        @php
                                            $cateringOptions = json_decode($booking->catering, true) ?? [];
                                        @endphp

                                        @if (!empty($cateringOptions))
                                            @foreach ($cateringOptions as $option)
                                                {{ $option }}<br>
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    </li>


                                    <li class="list-group-item"><strong>Accessories:</strong>
                                        <br>
                                        @php
                                            $selected_accessories = json_decode($booking->accessorie, true) ?? [];
                                        @endphp
                                        @php
                                            $selected_accessories = json_decode($booking->accessorie, true) ?? [];
                                            $accessory_names = \App\Models\Accessorie::whereIn('id', $selected_accessories)
                                                ->pluck('name')
                                                ->toArray();
                                        @endphp

                                            @if (!empty($accessory_names))
                                                @foreach ($accessory_names as $accessory)

                                                    {{ $accessory }}<br>
                                                @endforeach
                                            @else
                                                N/A
                                            @endif
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
@endsection --}}

{{-- @extends('website.layout.master')

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="subheader" class="relative jarallax text-light">
            <img src="{{ asset('website/assets/images/background/Background.jpg') }}" class="jarallax-img" alt="">
            <div class="container relative z-index-1000">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h1>Book Now</h1>

                        <ul class="crumb">
                            <li><a href="{{ route('Index.Page') }}">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="de-overlay"></div>
        </section>

        <div class="container mt-4">
            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4">{{ $booking->hall }}</h2>

                <!-- Hall Image -->
                @if ($booking->halll && $booking->halll->image)
                    <div class="text-center my-3">
                        <img src="{{ asset('Hall_images/'.$booking->halll->image) }}" alt="Hall Image" class="img-fluid rounded shadow" style="max-width: 500px;">
                    </div>
                @else
                    <p class="text-muted text-center">No Image Available</p>
                @endif

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Customer Name:</strong> {{ $booking->name }}</p>
                        <p><strong>Organization:</strong> {{ $booking->organization }}</p>
                        <p><strong>Email:</strong> {{ $booking->email }}</p>
                        <p><strong>Contact No:</strong> {{ $booking->contact_no }}</p>
                        <p><strong>Event Type:</strong> {{ $booking->event_type }}</p>
                        <p><strong>Event Date:</strong> {{ $booking->event_date }}</p>
                        <p><strong>Duration:</strong> {{ $booking->duration }}</p>
                        <p><strong>Expected Audience:</strong> {{ $booking->expected_audience }}</p>
                        <p><strong>Status:</strong> {{ $booking->status }}</p>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Rent Amount:</strong> ₹{{ number_format($booking->rent_amount, 2) }}</p>
                        <p><strong>GST No:</strong> {{ $booking->gst_no }}</p>
                        <p><strong>Address:</strong> {{ $booking->address }}</p>
                        <p><strong>Referred By:</strong> {{ $booking->referred_by }}</p>
                        <p><strong>Special Note:</strong> {{ $booking->special_note }}</p>
                        <p><strong>ID Proof:</strong> {{ $booking->id_proof }}</p>
                        <p><strong>Event Setup:</strong> {{ $booking->event_setup }}</p>

                        <p><strong>Accessories:</strong></p>
                        @php
                            $selected_accessories = json_decode($booking->accessorie, true) ?? [];
                            $accessory_names = \App\Models\Accessorie::whereIn('id', $selected_accessories)->pluck('name')->toArray();
                        @endphp
                        <ul>
                            @if (!empty($accessory_names))
                                @foreach ($accessory_names as $accessory)
                                    <li>{{ $accessory }}</li>
                                @endforeach
                            @else
                                <li>N/A</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="" class="btn btn-primary btn-lg">Pay Here</a>
                </div>
            </div>
        </div>

    </div>

@endsection --}}
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
                        <h1>Book Now</h1>

                        <ul class="crumb">
                            <li><a href="{{ route('Index.Page') }}">Home</a></li>
                            <li class="active">Book Now</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="de-overlay"></div>
        </section>

        <div class="container mt-4">
            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4">{{ $booking->enquiry->hall ?? 'No Hall Assigned' }}</h2>

                <!-- Hall Image -->
                {{-- @if ($hall && $hall->image)
                    <div class="text-center my-3">
                        <img src="{{ asset('Hall_images/'.$hall->image) }}" alt="Hall Image" class="img-fluid rounded shadow" style="max-width: 500px;">
                    </div>
                @else
                    <p class="text-muted text-center">No Image Available</p>
                @endif --}}
                @if ($hall && $hall->image)
                    <div class="text-center my-3">
                        <img src="{{ asset('Hall_images/'.$hall->image) }}"
                            alt="Hall Image"
                            class="img-fluid rounded shadow w-100"
                            style="max-width: 500px; height: auto; object-fit: cover;">
                    </div>
                @else
                    <p class="text-muted text-center">No Image Available</p>
                @endif


                <hr>

                <div class="row" style="padding: 60px;">
                    <div class="col-md-6">
                        <p><strong>Customer Name:</strong> {{ $booking->enquiry->name ?? 'N/A' }}</p>
                        <p><strong>Organization:</strong> {{  $booking->enquiry->organization ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{  $booking->enquiry->email ?? 'N/A' }}</p>
                        <p><strong>Contact No:</strong> {{  $booking->enquiry->contact_no ?? 'N/A' }}</p>
                        <p><strong>Event Type:</strong> {{  $booking->enquiry->event_type ?? 'N/A' }}</p>
                        <p><strong>Event Date:</strong> {{  $booking->enquiry->event_date ?? 'N/A' }}</p>
                        <p><strong>Duration:</strong> {{  $booking->enquiry->duration ?? 'N/A' }}</p>
                        <p><strong>Expected Audience:</strong> {{  $booking->enquiry->expected_audience ?? 'N/A' }}</p>
                        {{-- <p><strong>Status:</strong> {{ $booking->status ?? 'Pending' }}</p> --}}
                    </div>

                    <div class="col-md-6">
                        <p><strong>Rent Amount:</strong> ₹{{ number_format($booking->enquiry->rent_amount, 2) }}</p>
                        <p><strong>GST No:</strong> {{  $booking->enquiry->gst_no ?? 'N/A' }}</p>
                        <p><strong>Address:</strong> {{  $booking->enquiry->address ?? 'N/A' }}</p>
                        <p><strong>Referred By:</strong> {{  $booking->enquiry->referred_by ?? 'N/A' }}</p>
                        <p><strong>Special Note:</strong> {{  $booking->enquiry->special_note ?? 'N/A' }}</p>
                        <p><strong>ID Proof:</strong> {{  $booking->enquiry->Id_proof ?? 'N/A' }}</p>
                        <p><strong>Event Setup:</strong> {{  $booking->enquiry->event_setup ?? 'N/A' }}</p>

                        {{-- <p><strong>Accessories:</strong></p>
                        @php
                            $selected_accessories = json_decode( $booking->enquiry->accessorie ?? '[]', true);
                            $accessory_names = \App\Models\Accessorie::whereIn('id', $selected_accessories)->pluck('name')->toArray();
                        @endphp
                        <ul>
                            @if (!empty($accessory_names))
                                @foreach ($accessory_names as $accessory)
                                    <li>{{ $accessory }}</li>
                                @endforeach
                            @else
                                <li>N/A</li>
                            @endif
                        </ul> --}}
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a type="button" class="text-white px-5 py-2" style="background-color: #AB8965; border-radius: 8px; transition: 0.3s;" href="#" >
                        Pay Here
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
