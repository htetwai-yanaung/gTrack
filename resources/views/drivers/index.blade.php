@extends('drivers.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Drivers</strong> Profile</h1>

        <div class="row">
            <div class="col-5">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ url('images/default-driver.png') }}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                        <h5 class="card-title mb-0">{{ $driver->name }}</h5>
                        <div class="text-muted mb-2">{{ $driver->license }}</div>

                        <div>
                            <a class="btn btn-outline-danger btn-sm" href="#">Delete</a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="user" class="feather-sm me-1"></span> Name <a href="">{{ $driver->name }}</a></li>
                            <li class="mb-1"><span data-feather="heart" class="feather-sm me-1"></span> Age <a href="">{{ $driver->age }}</a></li>
                            <li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> Phone <a href="">{{ $driver->phone }}</a></li>
                            <li class="mb-1"><span data-feather="tag" class="feather-sm me-1"></span> License <a href="">{{ $driver->license }}</a></li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> Address <a href="">{{ $driver->address }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
