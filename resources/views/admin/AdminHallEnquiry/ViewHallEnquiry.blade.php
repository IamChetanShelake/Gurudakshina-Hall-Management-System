@extends('admin.layout.masteradmin')

@section('content')
    <div class="container-fluid py-4">
        <div class="col-lg-10 mx-auto">
            <div class="card shadow-lg border-0">
                <!-- Card Header -->
                <div class="card-header bg-gradient-dark text-white text-center py-3">
                    <h4 class="mb-0" style="color: #fff">Hall Enquiry Details</h4>
                </div>

                <!-- Card Body -->
                <div class="card-body px-5 py-4">
                    <div class="row g-4">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <p class="fw-bold mb-2 text-uppercase">Personal Details</p>
                            <div class="border rounded p-3">
                                <p><strong>Name:</strong> {{ $hallenquirie->name ?? 'Unknown' }}</p>
                                <p><strong>Organization:</strong> {{ $hallenquirie->organization ?? 'Not Provided' }}</p>
                                <p><strong>GST No:</strong> {{ $hallenquirie->gst_no ?? 'Not Provided' }}</p>
                                <p><strong>Email:</strong> <a
                                        href="mailto:{{ $hallenquirie->email }}">{{ $hallenquirie->email ?? 'Not Provided' }}</a></p>
                                <p><strong>Contact No:</strong> <a
                                        href="tel:{{ $hallenquirie->contact_no }}">{{ $hallenquirie->contact_no ?? 'Not Provided' }}</a></p>
                                <p><strong>Address:</strong> {{ $hallenquirie->address ?? 'Not Provided' }}</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <p class="fw-bold mb-2 text-uppercase">Event Details</p>
                            <div class="border rounded p-3">
                                <p><strong>Referred By:</strong> {{ $hallenquirie->referred_by ?? 'Not Provided' }}</p>
                                <p><strong>Event Type:</strong> {{ $hallenquirie->event_type ?? 'Not Provided' }}</p>
                                <p><strong>Event Date:</strong> {{ $hallenquirie->event_date ?? 'Not Provided' }}</p>
                                <p><strong>Hall:</strong> {{ $hallenquirie->hall ?? 'Unknown Hall' }}</p>
                                <p><strong>Duration:</strong> {{ $hallenquirie->duration ?? 'Not Provided' }}</p>
                                <p><strong>Expected Audience:</strong> {{ $hallenquirie->expected_audience ?? 'Not Provided' }}</p>
                                <p><strong>Status:</strong>
                                    @if ($hallenquirie->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($hallenquirie->status == 'Viewed')
                                        <span class="badge bg-success">Viewed</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    @if ($hallenquirie->status == 'pending')
                        <form action="{{ route('Admin.StoreOffice', $hallenquirie->id) }}" method="POST"
                            class="p-4 border rounded-3 shadow-sm bg-light">
                            @csrf

                            <h4 class="mb-3 text-primary"><strong>For Office Use Only</strong></h4>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded-3 shadow-sm bg-white">
                                        <label for="rent_amount" class="fw-bold text-dark mb-2">Rent Amount (Rs):</label>
                                        <input type="text" name="rent_amount" value="{{ old('rent_amount') }}"
                                            placeholder="Enter Amount"
                                            class="form-control border border-secondary rounded-2 shadow-sm ps-3 @error('rent_amount') is-invalid @enderror"
                                            required>
                                        @error('rent_amount')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded-3 shadow-sm bg-white">
                                        <label for="deposit" class="fw-bold text-dark mb-2">Deposit Amount (Rs):</label>
                                        <input type="text" name="deposit" value="{{ old('deposit') }}"
                                            placeholder="Enter Deposit Amount"
                                            class="form-control border border-secondary rounded-2 shadow-sm ps-3 @error('deposit') is-invalid @enderror"
                                            required>
                                        @error('deposit')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded-3 shadow-sm bg-white">
                                        <label for="special_note" class="fw-bold text-dark mb-2">Special Note:</label>
                                        <textarea name="special_note" placeholder="Enter Special Note"
                                            class="form-control border border-secondary rounded-2 shadow-sm ps-3 @error('special_note') is-invalid @enderror">{{ old('special_note') }}</textarea>
                                        @error('special_note')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded-3 shadow-sm bg-white">
                                        <label for="id_proof" class="fw-bold text-dark mb-2">ID Proof:</label>
                                        <select name="id_proof"
                                            class="form-control border border-secondary rounded-2 shadow-sm ps-3 @error('id_proof') is-invalid @enderror"
                                            required>
                                            <option value="" disabled {{ old('id_proof') == '' ? 'selected' : '' }}>
                                                -- Select ID Proof --</option>
                                            <option value="Aadhar Card"
                                                {{ old('id_proof') == 'Aadhar Card' ? 'selected' : '' }}>Aadhar Card
                                            </option>
                                            <option value="Driving Licence"
                                                {{ old('id_proof') == 'Driving Licence' ? 'selected' : '' }}>Driving
                                                License</option>
                                        </select>
                                        @error('id_proof')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3" style="text-align: center; margin-left: 235px;">
                                    <div class="p-3 border rounded-3 shadow-sm bg-white">
                                        <label for="event_setup" class="fw-bold text-dark mb-2">Event Setup:</label>
                                        <input type="text" placeholder="Enter Event Setup" name="event_setup"
                                            value="{{ old('event_setup') }}"
                                            class="form-control border border-secondary rounded-2 shadow-sm ps-3 @error('event_setup') is-invalid @enderror">
                                        @error('event_setup')
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Accessories Checkboxes -->
                            <div class="row">
                                <h4 class="mb-3 text-secondary"><strong>Accessories Details:</strong></h4>
                                <ul class="list-group w-100">
                                    @foreach ($accessories as $accessorie)
                                        @if (!empty($accessorie->name) || !empty($accessorie->quantity) || !empty($accessorie->price) || !empty($accessorie->hours))
                                            <li class="list-group-item d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-check-input custom-checkbox me-2" type="checkbox" name="accessorie[]"
                                                        value="{{ $accessorie->id }}"
                                                        {{ is_array(old('accessorie', json_decode($hallenquirie->accessorie ?? '[]', true))) && in_array($accessorie->id, old('accessorie', json_decode($hallenquirie->accessorie ?? '[]', true))) ? 'checked' : '' }}>

                                                    <label class="mb-0 fw-bold">{{ $accessorie->name ?? 'Unknown Accessory' }}</label>
                                                </div>

                                                <div style="margin-left: 20px;">
                                                    @if (!empty($accessorie->quantity))
                                                        <span class="badge bg-primary">Qty: {{ $accessorie->quantity }}</span>
                                                    @endif
                                                    @if (!empty($accessorie->price))
                                                        <span class="badge bg-success">Price: ₹{{ $accessorie->price }}</span>
                                                    @endif
                                                    @if (!empty($accessorie->hours))
                                                        <span class="badge bg-warning">Hours: {{ $accessorie->hours }}</span>
                                                    @endif
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Add this CSS for better checkbox visibility -->
                            <style>
                                .custom-checkbox {
                                    border: 2px solid #333;
                                }
                            </style>

                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">Save & Generate Quotation</button>
                            </div>
                        </form>

                    @else
                        <!-- Office Details -->
                        <div class="row">
                            <div class="col-md-6">
                                <p class="fw-bold mb-2 text-uppercase">Office Details</p>
                                <div class="border rounded p-3">
                                    <p><strong>Rent Amount:</strong> {{ $hallenquirie->rent_amount ?? 'Not Provided' }}</p>
                                    <p><strong>Total Deposit:</strong> {{ $hallenquirie->deposit ?? 'Not Provided' }}</p>
                                    <p><strong>Special Note:</strong> {{ $hallenquirie->special_note ?? 'Not Provided' }}</p>
                                    <p><strong>ID Proof:</strong> {{ $hallenquirie->id_proof ?? 'Not Provided' }}</p>
                                    <p><strong>Event Setup:</strong> {{ $hallenquirie->event_setup ?? 'Not Provided' }}</p>
                                    @php
                                        $vendor_services = json_decode($hallenquirie->vendor, true) ?? [];
                                    @endphp
                                    <p><strong>Vendor Services:</strong>
                                        {{ $hallenquirie->vendor ? implode(', ', $vendor_services) : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <p class="fw-bold mb-2 text-uppercase"><strong>Accessories:</strong></p>
                                <div class="card border rounded p-3">
                                    @php
                                        $selected_accessories = json_decode($hallenquirie->accessorie, true) ?? [];
                                        $accessory_names = \App\Models\Accessorie::whereIn('id', $selected_accessories)
                                            ->pluck('name')
                                            ->toArray();
                                    @endphp

                                    @if (!empty($accessory_names))
                                        @foreach ($accessory_names as $accessory)
                                            <strong>{{ $accessory }}</strong><br>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div style="text-align: center;">
                        <a href="{{ route('AdminHallEnquiry') }}" class="btn btn-secondary" style="width: 100px;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection