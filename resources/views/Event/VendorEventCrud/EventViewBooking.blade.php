@extends('Event.layout.masterevent')

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
                                    <td>{{ $eventBooking->customer_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Phone</th>
                                    <td>{{ $eventBooking->customer_phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{ $eventBooking->customer_email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Event Date</th>
                                    <td>{{ $eventBooking->event_date ?? 'N/A' }}</td>
                                </tr>
                                {{-- <tr> <th>Event Time</th> <td>{{ $eventBooking->event_time ?? 'N/A' }}</td> </tr> --}}
                                <tr>
                                    <th>Event Type</th>
                                    <td>{{ $eventBooking->event_type ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Hall Name</th>
                                    <td>{{ $eventBooking->hall_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $eventBooking->duration ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Start Time</th>
                                    <td>{{ $eventBooking->start_time ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>End Time</th>
                                    <td>{{ $eventBooking->end_time ?? 'N/A' }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- Event Service Details (Right Side) -->
                    <div class="col-md-6">
                        <h5 class="text-center">Event Service Details</h5>
                        <table class="table table-bordered">
                            <tbody>
                                @if ($eventBooking->eventServices->whereNotNull('status')->count() > 0)
                                    @foreach ($eventBooking->eventServices as $service)
                                    @if (!is_null($service->status))
                                            {{-- <tr>
                                                <th>Items Name</th>
                                                <td>{{ $service->service_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td>{{ $service->service_price }}</td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{ $service->service_description ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Quantity</th>
                                                <td>{{ $service->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Price</th>
                                                <td>{{ $service->total_price }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><span class="badge bg-success">Confirmed</span></td>
                                            </tr> --}}
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
                    <a href="{{ route('Event.BookedHalls') }}" class="btn btn-secondary">Back to Booked Halls</a>
                </div>
            </div>
        </div>
    </div>
@endsection
