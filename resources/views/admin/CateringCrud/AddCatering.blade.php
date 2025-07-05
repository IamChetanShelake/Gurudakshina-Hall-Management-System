@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75">
            <h2 class="text-center mb-4 text-primary">Register New Catering Vendor</h2>
            <form action="{{ route('Add.Catering') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('name') is-invalid @enderror"
                           id="name" name="name" placeholder="Enter name..." required>
                    @error('name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label fw-bold">Mobile Number</label>
                    <input type="tel" class="form-control border rounded-3 shadow-sm ps-3 @error('mobile') is-invalid @enderror"
                           id="mobile" name="mobile" placeholder="Enter mobile number..." required>
                    @error('mobile')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alternate_mobile" class="form-label fw-bold">Alternate Mobile Number (Optional)</label>
                    <input type="tel" class="form-control border rounded-3 shadow-sm ps-3 @error('alternate_mobile') is-invalid @enderror"
                           id="alternate_mobile" name="alternate_mobile" placeholder="Enter alternate mobile number...">
                    @error('alternate_mobile')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email ID</label>
                    <input type="email" class="form-control border rounded-3 shadow-sm ps-3 @error('email') is-invalid @enderror"
                           id="email" name="email" placeholder="Enter email..." required>
                    @error('email')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control border rounded-3 shadow-sm ps-3 @error('password') is-invalid @enderror"
                           id="password" name="password" placeholder="Enter password..." required>
                    @error('password')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="firm_name" class="form-label fw-bold">Firm Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('firm_name') is-invalid @enderror"
                           id="firm_name" name="firm_name" placeholder="Enter firm name..." required>
                    @error('firm_name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <textarea class="form-control border rounded-3 shadow-sm ps-3 @error('address') is-invalid @enderror"
                              id="address" name="address" placeholder="Enter address..." required></textarea>
                    @error('address')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label fw-bold">City</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('city') is-invalid @enderror"
                           id="city" name="city" placeholder="Enter city..." required>
                    @error('city')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="adhar_card" class="form-label fw-bold">Aadhar Card (Upload Image)</label>
                    <input type="file" class="form-control border rounded-3 shadow-sm ps-3 @error('adhar_card') is-invalid @enderror"
                           id="adhar_card" name="adhar_card" accept="image/*" required>
                    @error('adhar_card')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pan_card" class="form-label fw-bold">PAN Card (Upload Image)</label>
                    <input type="file" class="form-control border rounded-3 shadow-sm ps-3 @error('pan_card') is-invalid @enderror"
                           id="pan_card" name="pan_card" accept="image/*" required>
                    @error('pan_card')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="qr_code" class="form-label fw-bold">QR Code (Upload Image)</label>
                    <input type="file" class="form-control border rounded-3 shadow-sm ps-3 @error('qr_code') is-invalid @enderror"
                           id="qr_code" name="qr_code" accept="image/*" required>
                    @error('qr_code')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="upi_id" class="form-label fw-bold">UPI ID</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('upi_id') is-invalid @enderror"
                           id="upi_id" name="upi_id" placeholder="Enter UPI ID..." required>
                    @error('upi_id')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <!-- Bank Details Section -->
                <h4 class="text-center mb-3 text-success">Bank Details</h4>

                <div class="mb-3">
                    <label for="bank_name" class="form-label fw-bold">Bank Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('bank_name') is-invalid @enderror"
                           id="bank_name" name="bank_name" placeholder="Enter bank name..." required>
                    @error('bank_name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bank_holder_name" class="form-label fw-bold">Bank Holder Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('bank_holder_name') is-invalid @enderror"
                           id="bank_holder_name" name="bank_holder_name" placeholder="Enter bank holder name..." required>
                    @error('bank_holder_name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="account_number" class="form-label fw-bold">Account Number</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('account_number') is-invalid @enderror"
                           id="account_number" name="account_number" placeholder="Enter account number..." required>
                    @error('account_number')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ifsc" class="form-label fw-bold">IFSC Code</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('ifsc') is-invalid @enderror"
                           id="ifsc" name="ifsc" placeholder="Enter IFSC code..." required>
                    @error('ifsc')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                    <a href="/catering" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection