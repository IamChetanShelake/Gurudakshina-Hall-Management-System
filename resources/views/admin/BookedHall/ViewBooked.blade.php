@extends('admin.layout.masteradmin')

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
                        <td>{{ $bookedHall->customer_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Customer Phone</th>
                        <td>{{ $bookedHall->customer_phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Customer Email</th>
                        <td>{{ $bookedHall->customer_email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Event Date</th>
                        <td>{{ $bookedHall->event_date ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Event Time</th>
                        <td>{{ $bookedHall->event_time ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Event Type</th>
                        <td>{{ $bookedHall->event_type ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Hall Name</th>
                        <td>{{ $bookedHall->hall_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td>{{ $bookedHall->duration ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <td>{{ $bookedHall->start_time ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>End Time</th>
                        <td>{{ $bookedHall->end_time ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th> Booking Code</th>
                        <td>{{ $bookedHall->booking_code ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('Booked.Halls') }}" class="btn btn-secondary">Back to Booked Halls</a>
            </div>
        </div>
    </div>
</div>
@endsection
