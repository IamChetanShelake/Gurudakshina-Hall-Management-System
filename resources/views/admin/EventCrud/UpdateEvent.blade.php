@extends('admin.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75">
            <h2 class="text-center mb-4 text-primary">Update Event Vendor</h2>

            <form action="{{ route('Update.Event', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name', $event->name) }}" required>
                    @error('name')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label fw-bold">Mobile Number</label>
                    <input type="tel" class="form-control border rounded-3 shadow-sm ps-3 @error('mobile') is-invalid @enderror"
                           id="mobile" name="mobile" value="{{ old('mobile', $event->mobile) }}" required>
                    @error('mobile')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alternate_mobile" class="form-label fw-bold">Alternate Mobile Number (Optional)</label>
                    <input type="tel" class="form-control border rounded-3 shadow-sm ps-3 @error('alternate_mobile') is-invalid @enderror"
                           id="alternate_mobile" name="alternate_mobile" value="{{ old('alternate_mobile', $event->alternate_mobile) }}" placeholder="Enter alternate mobile number...">
                    @error('alternate_mobile')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('address') is-invalid @enderror"
                           id="address" name="address" value="{{ old('address', $event->address) }}" required>
                    @error('address')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label fw-bold">City</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('city') is-invalid @enderror"
                           id="city" name="city" value="{{ old('city', $event->city) }}" required>
                    @error('city')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="firm_name" class="form-label fw-bold">Firm Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('firm_name') is-invalid @enderror"
                           id="firm_name" name="firm_name" value="{{ old('firm_name', $event->firm_name) }}" required>
                    @error('firm_name')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email ID</label>
                    <input type="email" class="form-control border rounded-3 shadow-sm ps-3 @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email', $event->email) }}" required>
                    @error('email')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="upi_id" class="form-label fw-bold">UPI ID</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('upi_id') is-invalid @enderror"
                           id="upi_id" name="upi_id" value="{{ old('upi_id', $event->upi_id) }}" required>
                    @error('upi_id')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- File Upload Fields -->
                <h4 class="text-primary mt-4">Upload Documents</h4>

                <div class="mb-3">
                    <label for="adhar_card" class="form-label fw-bold">Aadhar Card</label>
                    <input type="file" class="form-control border rounded-3 shadow-sm ps-3" id="adhar_card" name="adhar_card" accept="image/*">
                    @if($event->adhar_card)
                        <img src="{{ asset('EventVendor_images/' . $event->adhar_card) }}" class="mt-2 img-fluid" style="max-width: 200px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="pan_card" class="form-label fw-bold">PAN Card</label>
                    <input type="file" class="form-control border rounded-3 shadow-sm ps-3" id="pan_card" name="pan_card" accept="image/*">
                    @if($event->pan_card)
                        <img src="{{ asset('EventVendor_images/' . $event->pan_card) }}" class="mt-2 img-fluid" style="max-width: 200px;">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="qr_code" class="form-label fw-bold">QR Code</label>
                    <input type="file" class="form-control border rounded-3 shadow-sm ps-3" id="qr_code" name="qr_code" accept="image/*">
                    @if($event->qr_code)
                        <img src="{{ asset('EventVendor_images/' . $event->qr_code) }}" class="mt-2 img-fluid" style="max-width: 200px;">
                    @endif
                </div>

                <!-- Bank Details Section -->
                <h4 class="text-center mb-3 text-success">Bank Details</h4>

                <div class="mb-3">
                    <label for="bank_name" class="form-label fw-bold">Bank Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('bank_name') is-invalid @enderror"
                           id="bank_name" name="bank_name" value="{{ old('bank_name', $event->bank_name) }}" placeholder="Enter bank name..." required>
                    @error('bank_name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bank_holder_name" class="form-label fw-bold">Bank Holder Name</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('bank_holder_name') is-invalid @enderror"
                           id="bank_holder_name" name="bank_holder_name" value="{{ old('bank_holder_name', $event->bank_holder_name) }}" placeholder="Enter bank holder name..." required>
                    @error('bank_holder_name')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="account_number" class="form-label fw-bold">Account Number</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('account_number') is-invalid @enderror"
                           id="account_number" name="account_number" value="{{ old('account_number', $event->account_number) }}" placeholder="Enter account number..." required>
                    @error('account_number')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ifsc" class="form-label fw-bold">IFSC Code</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('ifsc') is-invalid @enderror"
                           id="ifsc" name="ifsc" value="{{ old('ifsc', $event->ifsc) }}" placeholder="Enter IFSC code..." required>
                    @error('ifsc')
                    <span class="invalid-feedback d-block">{{$message}}</span>
                    @enderror
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn btn-success px-4">Update</button>
                    <a href="/event" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection