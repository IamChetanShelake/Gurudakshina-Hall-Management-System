{{-- @extends('Catering.layout.masteradmin')

@section('content')
<div class="col-12">
    <div class="card my-4">
        <!-- Card Header -->
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="shadow-dark border-radius-lg pt-4 pb-3" style="background-color: #70533A;">
                <h6 class="text-white text-capitalize ps-3">Booked Hall Details</h6>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Customer Name</th>
                        <td>{{ $cateringBooking->customer_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Customer Phone</th>
                        <td>{{ $cateringBooking->customer_phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Customer Email</th>
                        <td>{{ $cateringBooking->customer_email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Event Date</th>
                        <td>{{ $cateringBooking->event_date ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Event Time</th>
                        <td>{{ $cateringBooking->event_time ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Event Type</th>
                        <td>{{ $cateringBooking->event_type ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Hall Name</th>
                        <td>{{ $cateringBooking->hall_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td>{{ $cateringBooking->duration ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <td>{{ $cateringBooking->start_time ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>End Time</th>
                        <td>{{ $cateringBooking->end_time ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('Catering.BookedHalls') }}" class="btn btn-secondary">Back to Booked Halls</a>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('Catering.layout.masteradmin')

@section('content')
    <div class="col-12">
        <div class="card my-4">
            <!-- Card Header -->
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-dark border-radius-lg pt-4 pb-3" style="background-color: #70533A;">
                    <h6 class="text-white text-capitalize ps-3">Booked Hall Details</h6>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <!-- Customer Details (Left Side) -->
                    <div class="col-md-6">
                        <h5 class="text-center">Customer Details</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{ $cateringBooking->customer_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Phone</th>
                                    <td>{{ $cateringBooking->customer_phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{ $cateringBooking->customer_email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Event Date</th>
                                    <td>{{ $cateringBooking->event_date ?? 'N/A' }}</td>
                                </tr>
                                {{-- <tr> <th>Event Time</th> <td>{{ $cateringBooking->event_time ?? 'N/A' }}</td> </tr> --}}
                                <tr>
                                    <th>Event Type</th>
                                    <td>{{ $cateringBooking->event_type ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Hall Name</th>
                                    <td>{{ $cateringBooking->hall_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $cateringBooking->duration ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Start Time</th>
                                    <td>{{ $cateringBooking->start_time ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>End Time</th>
                                    <td>{{ $cateringBooking->end_time ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Event Service Details (Right Side) -->
                    <div class="col-md-6">
                        <h5 class="text-center">Catering Service Details</h5>
                        <table class="table table-bordered">
                            <tbody>
                                @if ($cateringBooking->cateringServices->whereNotNull('status')->count() > 0)
                                    @foreach ($cateringBooking->cateringServices as $service)
                                        @if (!is_null($service->status))
                                            {{-- <tr> <th>Food Item</th> <td>{{ $service->food_item }}</td> </tr>
                                        <tr> <th>Price Per Plate/Person</th> <td>{{ $service->price_per_plate }}</td> </tr>

                                        <tr> <th>Total Plates</th> <td>{{ $service->total_plates }}</td> </tr>
                                        <tr> <th>Total Price</th> <td>{{ $service->total_price }}</td> </tr>
                                        <tr> <th>Status</th> <td><span class="badge bg-success">Confirmed</span></td> </tr>
                                        <tr> <td colspan="2"><hr></td> </tr>  --}}
                                            <tr>
                                                <th>Items Name</th>
                                                <td>
                                                    @if (!empty($service->item_names))
                                                        {{ implode(', ', $service->item_names) }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{ $service->service_description ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Price</th>
                                                <td>₹{{ number_format($service->total_price, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                {{-- <th>Status</th> <td><span class="badge bg-success">Confirmed</span></td>  --}}
                                                <td>

                                                    @if (!empty($service->status))
                                                        <span
                                                            class="badge bg-success">{{ ucfirst($service->status) }}</span>
                                                    @else
                                                        <span class="badge bg-secondary">Pending</span>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="text-center text-danger">No confirmed event services
                                            available.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('Catering.BookedHalls') }}" class="btn btn-secondary">Back to Booked Halls</a>
                </div>
            </div>
        </div>
    </div>
@endsection
