{{-- @extends('admin.layout.masteradmin')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Event & Catering Services</h2>

    <!-- Event Services Section -->
    @if($eventServices->isNotEmpty())
    <h4 class="mb-3">Event Services</h4>
    <div class="row">
        @foreach($eventServices as $service)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">



                    @if(!empty($service->item_names))
                        <p><strong>Items:</strong> {{ implode(', ', $service->item_names) }}</p>
                    @endif

                    <p><strong>Description:</strong> {{ $service->service_description }}</p>


                    <p><strong>Total Price:</strong> ₹{{ number_format($service->total_price, 2) }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge
                            {{ $service->status == 'approved' ? 'bg-success' :
                               ($service->status == 'pending' ? 'bg-warning' : 'bg-info') }}">
                            {{ ucfirst($service->status) }}
                        </span>
                    </p>
                    <div class="d-flex">
                        @if($service->status == 'confirmed')
                            <form method="POST" action="{{ route('update.status') }}">
                                @csrf
                                <input type="hidden" name="service_type" value="event">
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-success me-2">Approve</button>
                            </form>

                            <form method="POST" action="{{ route('update.status') }}">
                                @csrf
                                <input type="hidden" name="service_type" value="event">
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Catering Services Section -->
    @if($cateringServices->isNotEmpty())
    <h4 class="mt-4 mb-3">Catering Services</h4>
    <div class="row">
        @foreach($cateringServices as $food)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $food->food_item }}</h5>

                    @if(!empty($food->item_names))
                        <p><strong>Items:</strong> {{ implode(', ', $food->item_names) }}</p>
                    @endif

                    <p><strong>Description:</strong> {{ $food->service_description ?? 'NA' }}</p>


                    <p><strong>Total Price:</strong> ₹{{ number_format($food->total_price, 2) }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge
                            {{ $food->status == 'approved' ? 'bg-success' :
                               ($food->status == 'pending' ? 'bg-warning' : 'bg-info') }}">
                            {{ ucfirst($food->status) }}
                        </span>
                    </p>
                    <div class="d-flex">
                        @if($food->status == 'confirmed')
                            <form method="POST" action="{{ route('update.status') }}">
                                @csrf
                                <input type="hidden" name="service_type" value="catering">
                                <input type="hidden" name="service_id" value="{{ $food->id }}">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-success me-2">Approve</button>
                            </form>

                            <form method="POST" action="{{ route('update.status') }}">
                                @csrf
                                <input type="hidden" name="service_type" value="catering">
                                <input type="hidden" name="service_id" value="{{ $food->id }}">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        @endif
                    </div>



                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    @if($eventServices->isEmpty() && $cateringServices->isEmpty())
        <div class="alert alert-info text-center mt-3">No Event or Catering Services Found.</div>
    @endif
    <div class="text-start mt-3" style="margin-left: 20px;">
        <a href="{{route('Booked.Halls')}}"> Back</a>
    </div>

</div>
@endsection --}}

@extends('admin.layout.masteradmin')

@section('content')

<div class="container">
    <h2 class="mb-4 text-center">Event & Catering Services</h2>

    <div class="row">
        @if($eventServices->isNotEmpty())
        <div class="col-md-6">
            <h4 class="mb-3">Event Services</h4>
            @foreach($eventServices as $service)
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    @if(!empty($service->item_names))
                        <p><strong>Items:</strong> {{ implode(', ', $service->item_names) }}</p>
                    @endif

                    <p><strong>Description:</strong> {{ $service->service_description ?? 'NA' }}</p>
                    <p><strong>Total Price:</strong> ₹{{ number_format($service->total_price, 2) }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge
                            {{ $service->status == 'approved' ? 'bg-success' :
                               ($service->status == 'pending' ? 'bg-warning' : 'bg-info') }}">
                            {{ ucfirst($service->status) }}
                        </span>
                    </p>

                    @if($service->status == 'confirmed')
                    <div class="d-flex">
                        <form method="POST" action="{{ route('update.status') }}">
                            @csrf
                            <input type="hidden" name="service_type" value="event">
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="btn btn-success me-2">Approve</button>
                        </form>

                        <form method="POST" action="{{ route('update.status') }}">
                            @csrf
                            <input type="hidden" name="service_type" value="event">
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if($cateringServices->isNotEmpty())
        <div class="col-md-6">
            <h4 class="mb-3">Catering Services</h4>
            @foreach($cateringServices as $food)
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $food->food_item }}</h5>

                    @if(!empty($food->item_names))
                        <p><strong>Items:</strong> {{ implode(', ', $food->item_names) }}</p>
                    @endif

                    <p><strong>Description:</strong> {{ $food->service_description ?? 'NA' }}</p>
                    <p><strong>Total Price:</strong> ₹{{ number_format($food->total_price, 2) }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge
                            {{ $food->status == 'approved' ? 'bg-success' :
                               ($food->status == 'pending' ? 'bg-warning' : 'bg-info') }}">
                            {{ ucfirst($food->status) }}
                        </span>
                    </p>

                    @if($food->status == 'confirmed')
                    <div class="d-flex">
                        <form method="POST" action="{{ route('update.status') }}">
                            @csrf
                            <input type="hidden" name="service_type" value="catering">
                            <input type="hidden" name="service_id" value="{{ $food->id }}">
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="btn btn-success me-2">Approve</button>
                        </form>

                        <form method="POST" action="{{ route('update.status') }}">
                            @csrf
                            <input type="hidden" name="service_type" value="catering">
                            <input type="hidden" name="service_id" value="{{ $food->id }}">
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    @if($eventServices->isEmpty() && $cateringServices->isEmpty())
        <div class="alert alert-info text-center mt-3">No Event or Catering Services Found.</div>
    @endif

    <div class="text-center mt-3" >
        <a class="btn btn-secondary" style="width: 100px" href="{{ route('Booked.Halls') }}">Back</a>
    </div>
</div>

@endsection
