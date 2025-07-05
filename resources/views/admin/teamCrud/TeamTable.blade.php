@extends('admin.layout.masteradmin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        {{-- <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3"> --}}
                            <div class="shadow-dark border-radius-lg pt-4 pb-3"
                                style="background-color: #70533A;">
                                <h6 class="text-white text-capitalize ps-3">Team Details</h6>
                            </div>
                    </div>

                    {{-- <div class="p-3">
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
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            setTimeout(function() {
                                $("#successMessage, #failMessage").fadeOut('slow');
                            }, 3000);
                        });
                    </script> --}}

                    <div class="d-flex justify-content-end p-3">
                        <a class="btn btn-outline-primary btn-lg px-4 py-2" href="{{route('View.Add')}}">Add Team Members</a>
                    </div>

                    <div class="card-body px-3 pb-3">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Image</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">View</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teams as $team)
                                        <tr>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{$team->name}}</h6>
                                            </td>
                                            <td>
                                                @if(isset($team) && $team->image)
                                                    <img src="{{ asset('Team_images/' . $team->image) }}" class="img-fluid rounded" style="width: 50px; height: 50px;" alt="Teams Image">
                                                @else
                                                    <p>No Image Available</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{route('View.Team',$team->id)}}">View</a>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">

                                                <a href="{{route('Edit.Team',$team->id)}}" class="btn btn-success">Edit</a>
                                                <form action="{{route('Delete.Team',$team->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
