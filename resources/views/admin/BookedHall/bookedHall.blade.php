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

        <!-- Success / Error Messages -->
        @if(session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif

        @if(session('fail'))
            <div class="alert alert-danger" id="failMessage">
                {{ session('fail') }}
            </div>
        @endif

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $("#successMessage, #failMessage").fadeOut('slow');
                }, 3000); // Hide messages after 3 seconds
            });
        </script>

        <!-- Add Button -->
        <div class="d-flex justify-content-end p-3">
            {{-- <a class="btn btn-outline-primary btn-lg px-4 py-2" href="{{ route('admin.hall-enquiry.create') }}">Add</a> --}}
        </div>

        <!-- Table Section -->
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sr No.</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hall Name</th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View All Details</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vendors</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remaining Amount</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Amount</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>

                            {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Confirm Bokking</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookedHalls as $index => $bookedHall)
                            <tr>
                                <!-- Sr No. -->
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $index + 1 }}</h6>
                                    </div>
                                </td>

                                <!-- Customer Name -->
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $bookedHall->customer_name }}</h6>
                                    </div>
                                </td>

                                <!-- Hall Name -->
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $bookedHall->hall_name }}</h6>
                                    </div>
                                </td>

                                <!-- View Details -->
                                <td class="align-middle text-center">
                                    <a href="{{ route('View.Booking', $bookedHall->id) }}" class="btn btn-secondary">
                                        View
                                    </a>
                                </td>


                                <td class="align-middle text-center">
                                    @php
                                        $hasConfirmedService = $eventServices->where('booked_hall_id', $bookedHall->id)->where('status', 'confirmed')->isNotEmpty() ||
                                                               $cateringServices->where('booked_hall_id', $bookedHall->id)->where('status', 'confirmed')->isNotEmpty();

                                        $hasApprovedService = $eventServices->where('booked_hall_id', $bookedHall->id)->where('status', 'approved')->isNotEmpty() ||
                                                               $cateringServices->where('booked_hall_id', $bookedHall->id)->where('status', 'approved')->isNotEmpty();
                                    @endphp

                                    @if($hasConfirmedService)
                                        <a href="{{ route('View.EventCatering', $bookedHall->id) }}" class="btn btn-info">
                                            View Event / Catering
                                        </a>

                                    @elseif ($hasApprovedService)
                                    <p>
                                       <span class="badge bg-success"> Approved by </br> admin</span>
                                    </p>
                                    @else
                                    <p>
                                        <span class="badge bg-secondary">Not Confirm </br> yet</span>
                                     </p>
                                    @endif
                                </td>

                                {{-- <td class="align-middle text-center">
                                    <a href="{{route('Generate.Bill',$hallenquirie->id)}}">
                                        Generate Bill
                                    </a>
                                </td> --}}
                                {{-- <td class="align-middle text-center">
                                    <a href="{{ route('Generate.Bill', $hallenquirie->id) }}"
                                       class="btn btn-sm shadow-sm text-white d-flex align-items-center justify-content-center gap-2"
                                       style="background-color: #007bff; border-color: #007bff;">
                                        <span class="material-symbols-outlined" style="font-size: 18px;">request_quote</span>
                                        <span>Generate Bill</span>
                                    </a>
                                </td> --}}

                                {{-- <td class="align-middle text-center">
                                    @if($hallenquirie->status == 'Viewed')
                                        <a href="{{ route('Generate.Bill', $bookedHall->id) }}"
                                           class="btn btn-sm shadow-sm text-white d-flex align-items-center justify-content-center gap-2"
                                           style="background-color: #007bff; border-color: #007bff;">
                                            <span class="material-symbols-outlined" style="font-size: 18px;">request_quote</span>
                                            <span>Quotation</span>
                                        </a>
                                    @endif
                                </td> --}}







                                <!-- Action (Edit/Delete) -->
                                {{-- <td class="align-middle text-center">
                                    <a href="{{ route('admin.hall-enquiry.edit', $hallenquirie->id) }}" class="btn btn-success">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.hall-enquiry.destroy', $hallenquirie->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td> --}}

                                <!-- Status (You can add dynamic status if required) -->
                                {{-- <td class="align-middle text-center">
                                    @if($hallenquirie->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($hallenquirie->status == 'Viewed')
                                        <span class="badge bg-success">Viewed</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>

                                <td class="align-middle text-center">
                                    @if($hallenquirie->status == 'Viewed')
                                        <form action="{{ route('Confirm.Booking', $hallenquirie->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">Confirm Booking</button>
                                        </form>
                                    @endif
                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
