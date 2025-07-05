{{-- @extends('Catering.layout.masteradmin')

@section('content')


<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-5 w-75">
            <h2 class="text-center mb-4 text-primary">Add Catering Service</h2>
            <form action="{{ route('Add.CateringServices',$booked_hall_id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                        <label>Total Price</label>
                        <input type="number" name="total_price" required>

                        <h3>Select Catering Items</h3>
                        @foreach($cateringitems as $item)
                            <div>
                                <label>
                                    <input type="checkbox" name="Item_id[]" value="{{ $item->id }}">
                                    {{ $item->item_name }} (Qty: {{ $item->quantity }})
                                </label>
                            </div>
                        @endforeach


                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                    <a href="/catering-booked-halls" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

@endsection --}}

@extends('Catering.layout.masteradmin')

@section('content')

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4 w-50">
            <h2 class="text-center mb-4 text-primary">Add Catering Service</h2>
            <form action="{{ route('Add.CateringServices', $booked_hall_id) }}" method="POST" enctype="multipart/form-data">
                @csrf



                <!-- Catering Items Selection -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Select Catering Items</label>
                    <div class="border rounded p-3">
                        @foreach($cateringitems as $item)
                        <div class="form-check">
                            <input class="form-check-input item-checkbox"
                                type="checkbox"
                                name="Item_id[]"
                                value="{{ $item->id }}"
                                id="item{{ $item->id }}"
                                data-price="{{ $item->price ?? 0 }}">

                            <label class="form-check-label" for="item{{ $item->id }}">
                                {{ $item->item_name }}

                                @if (!empty($item->price))
                                    (Price: {{ $item->price }}
                                @endif

                                @if (!empty($item->quantity))
                                    {{ !empty($item->price) ? ',' : '(' }} Qty: {{ $item->quantity }})
                                @elseif(!empty($item->price))
                                    )
                                @endif
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="service_description" class="form-label fw-bold">Description</label>
                    <textarea type="text" class="form-control border rounded-3 shadow-sm ps-3"
                              name="service_description" id="service_description" placeholder="Write a description here..." rows="3" required></textarea>
                    @error('service_description')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <!-- Suggested Total Price -->
                <div class="mb-2">
                    <label class="form-label fw-bold text-success">Suggested Total Price:</label>
                    <div id="suggested_price_display" class="ps-2 text-success">₹0</div>
                </div>

                <div class="mb-3">
                    <label for="total_price" class="form-label fw-bold">Total Price</label>
                    <input type="text" class="form-control border rounded-3 shadow-sm ps-3 @error('total_price') is-invalid @enderror"
                              name="total_price" id="total_price" placeholder="Write total price..."  required>
                    @error('total_price')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                <!-- Form Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                    <a href="/catering-booked-halls" class="btn btn-outline-secondary px-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.item-checkbox');
        const suggestedPriceDiv = document.getElementById('suggested_price_display');
        const totalPriceInput = document.getElementById('total_price');

        function calculateTotal() {
            let total = 0;
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    total += parseFloat(checkbox.dataset.price || 0);
                }
            });
            suggestedPriceDiv.textContent = '₹' + total.toFixed(2);
        }

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', calculateTotal);
        });

        // Initial calculation if any item is pre-selected
        calculateTotal();
    });
</script>

@endsection

