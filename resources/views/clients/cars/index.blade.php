@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Cars</strong> List</h1>

        <div class="row">
            <div class="col d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Latest Projects</h5>
                        <a href="{{ route('cars.create') }}" class="btn btn-primary">&plus; Add Car</a>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Model</th>
                                <th>Color</th>
                                <th>License</th>
                                <th>Year</th>
                                <th>Fuel</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->color }}</td>
                                <td>{{ $car->license }}</td>
                                {{-- <td><span class="badge bg-success">{{ $car->name }}</span></td> --}}
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->fuel }}</td>
                                <td class="text-center">
                                    <a href="{{ route('cars.details',$car->id) }}"><i class="text-success" data-feather="eye"></i></a>
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
