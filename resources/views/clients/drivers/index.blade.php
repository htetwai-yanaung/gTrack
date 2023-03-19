@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Drivers</strong> List</h1>

        <div class="row">
            <div class="col d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Latest Projects</h5>
                        {{-- <a href="{{ route('drivers.create') }}" class="btn btn-primary">&plus; Add Driver</a> --}}
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th class="">Age</th>
                                <th>License</th>
                                <th>Address</th>
                                <th class="">Photo</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drivers as $driver)
                            <tr>
                                <td>{{ $driver->id }}</td>
                                <td>{{ $driver->name }}</td>
                                <td>{{ $driver->age }}</td>
                                <td>{{ $driver->license }}</td>
                                <td>{{ $driver->address }}</td>
                                <td>
                                    <img src="
                                    @if ($driver->photo == null)
                                    {{ url('images/default-driver.png') }}
                                    @else
                                    {{ url('images/'.$driver->photo) }}
                                    @endif
                                    " class="avatar img-fluid rounded-circle" alt="William Harris">
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('drivers.profile', $driver->id) }}"><i class="text-success" data-feather="eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
