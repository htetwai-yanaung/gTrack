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
                                <th class="d-none d-sm-table-cell">No.</th>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Model</th>
                                <th class="d-none d-xl-table-cell">Color</th>
                                <th class="d-none d-sm-table-cell">License</th>
                                <th class="d-none d-xl-table-cell">Year</th>
                                <th class="d-none d-md-table-cell">Fuel</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                            <tr>
                                <td class="d-none d-sm-table-cell">{{ $car->id }}</td>
                                <td>{{ $car->name }}</td>
                                <td class="d-none d-sm-table-cell">{{ $car->model }}</td>
                                <td class="d-none d-xl-table-cell">{{ $car->color }}</td>
                                <td class="d-none d-sm-table-cell">{{ $car->license }}</td>
                                {{-- <td><span class="badge bg-success">{{ $car->name }}</span></td> --}}
                                <td class="d-none d-xl-table-cell">{{ $car->year }}</td>
                                <td class="d-none d-md-table-cell">{{ $car->fuel }}</td>
                                <td class="text-center">
                                    <a href="{{ route('cars.details',$car->id) }}"><i class="text-success" data-feather="eye"></i></a> |
                                    <a href="{{ route('cars.edit',$car->id) }}"><i class="text-success" data-feather="edit-2"></i></a>
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
