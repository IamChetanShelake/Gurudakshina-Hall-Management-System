@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75">
            <h2 class="text-center mb-4 text-primary">Add Donation</h2>
            <form action="{{ route('Add.Donation') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="donar_name" class="form-label fw-bold">Donor Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('donar_name') is-invalid @enderror"
                           id="donar_name" name="donar_name" placeholder="Enter donor name..." required>
                    @error('donar_name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label fw-bold">Amount</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('amount') is-invalid @enderror"
                           id="amount" name="amount" placeholder="Enter amount..." required>
                    @error('amount')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label fw-bold">Payment Method</label>
                    <select class="form-control border rounded-3 shadow-sm ps-3" name="payment_method" id="payment_method" required>
                         <option disabled selected value="" >-- Select option -- </option>
                        <option value="cash">Cash</option>
                        <option value="check">Check</option>
                        <option value="upi">UPI</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>

                <div id="payment_details" class="mb-3"></div>

                <div class="mb-3">
                    <label for="message" class="form-label fw-bold">Message</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="message" id="message" placeholder="Write a message here..." rows="6"></textarea>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                    <a href="/donation" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            let method = this.value;
            let detailsDiv = document.getElementById('payment_details');
            detailsDiv.innerHTML = '';

            if (method === 'check') {
                detailsDiv.innerHTML = `
                    <label>Check Number:</label>
                    <input type="text" name="check_number" class="form-control border rounded-3 shadow-sm ps-3" placeholder="Enter check number..." required>
                    <label>Bank Name:</label>
                    <input type="text" name="bank_name" class="form-control border rounded-3 shadow-sm ps-3" placeholder="Enter bank name..." required>
                `;
            } else if (method === 'upi') {
                detailsDiv.innerHTML = `
                    <label>UPI ID:</label>
                    <input type="text" name="upi_id" class="form-control border rounded-3 shadow-sm ps-3" placeholder="Enter UPI ID..." required>
                `;
            } else if (method === 'bank_transfer') {
                detailsDiv.innerHTML = `
                    <label>Bank Name:</label>
                    <input type="text" name="bank_name" class="form-control border rounded-3 shadow-sm ps-3" placeholder="Enter bank name..." required>
                    <label>Transaction ID:</label>
                    <input type="text" name="transaction_id" class="form-control border rounded-3 shadow-sm ps-3" placeholder="Enter Transaction ID..." required>
                `;
            }
        });
    </script>
</body>

@endsection
