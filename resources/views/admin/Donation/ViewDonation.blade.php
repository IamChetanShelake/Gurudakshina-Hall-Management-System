@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75">
            <h2 class="text-center mb-4 text-primary">Donation Details</h2>

            <div class="card p-4 shadow-sm border rounded-3 bg-light">
                <h5 class="fw-bold text-center text-success">Donor Information</h5>
                <p><strong>Donor Name:</strong> {{ $donation->donar_name }}</p>
                <p><strong>Amount:</strong> ₹{{ number_format($donation->amount, 2) }}</p>
                <p><strong>Payment Method:</strong> {{ ucfirst($donation->payment_method) }}</p>

                @if($donation->payment_method == 'check')
                    <p><strong>Check Number:</strong> {{ $donation->check_number }}</p>
                    <p><strong>Bank Name:</strong> {{ $donation->bank_name }}</p>
                @elseif($donation->payment_method == 'upi')
                    <p><strong>UPI ID:</strong> {{ $donation->upi_id }}</p>
                @elseif($donation->payment_method == 'bank_transfer')
                    <p><strong>Bank Name:</strong> {{ $donation->bank_name }}</p>
                    <p><strong>Transaction ID:</strong> {{ $donation->transaction_id }}</p>
                @endif

                <p><strong>Message:</strong> {{ $donation->message ?? 'No message provided' }}</p>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('Donation.Table') }}" class="btn btn-outline-secondary px-4">Back</a>
            </div>
        </div>
    </div>
</body>

@endsection
