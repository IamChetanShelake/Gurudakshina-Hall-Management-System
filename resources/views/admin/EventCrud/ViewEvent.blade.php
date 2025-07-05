@extends('admin.layout.masteradmin')
@section('content')

<body>
    <div class="container my-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Event Vendor Details</h2>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-secondary">Personal Details</h4>
                        <table class="table table-bordered">
                            <tr><th>Name</th><td>{{ $event->name }}</td></tr>
                            <tr><th>Mobile</th><td>{{ $event->mobile }}</td></tr>
                            <tr><th>Alternate Mobile</th><td>{{ $event->alternate_mobile ?? 'Not provided' }}</td></tr>
                            <tr><th>Address</th><td>{{ $event->address }}</td></tr>
                            <tr><th>City</th><td>{{ $event->city }}</td></tr>
                            <tr><th>Firm Name</th><td>{{ $event->firm_name }}</td></tr>
                            <tr><th>Email</th><td>{{ $event->email }}</td></tr>
                            <tr><th>UPI ID</th><td>{{ $event->upi_id }}</td></tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <h4 class="text-secondary">Bank Details</h4>
                        <table class="table table-bordered">
                            <tr><th>Bank Name</th><td>{{ $event->bank_name }}</td></tr>
                            <tr><th>Account Number</th><td>{{ $event->account_number }}</td></tr>
                            <tr><th>IFSC Code</th><td>{{ $event->ifsc }}</td></tr>
                        </table>
                    </div>
                </div>

                <h4 class="text-secondary mt-4">Documents</h4>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <p><strong>Aadhar Card</strong></p>
                        @if($event->adhar_card)
                            <img src="{{ asset('EventVendor_images/' . $event->adhar_card) }}" class="img-fluid border rounded" style="width: 300px; height: 300px;">
                        @else
                            <p class="text-muted">No Aadhar Card Available</p>
                        @endif
                    </div>
                    <div class="col-md-4 text-center">
                        <p><strong>PAN Card</strong></p>
                        @if($event->pan_card)
                            <img src="{{ asset('EventVendor_images/' . $event->pan_card) }}" class="img-fluid border rounded" style="width: 300px; height: 300px;">
                        @else
                            <p class="text-muted">No PAN Card Available</p>
                        @endif
                    </div>
                    <div class="col-md-4 text-center">
                        <p><strong>QR Code</strong></p>
                        @if($event->qr_code)
                            <img src="{{ asset('EventVendor_images/' . $event->qr_code) }}" class="img-fluid border rounded" style="width: 300px; height: 300px;">
                        @else
                            <p class="text-muted">No QR Code Available</p>
                        @endif
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="/event" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

@endsection