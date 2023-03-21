@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Drvier</strong> Workbook</h1>

        <div class="row">
            <div class="col">
                <div class="card flex-fill" style="overflow-x: scroll;">
                    {{-- <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Latest Projects</h5>
                        <a href="{{ route('cars.create') }}" class="btn btn-primary">&plus; Add Car</a>
                    </div> --}}
                    <table class="table table-hover table-bordered my-0" style="min-width: 800px;">
                        <thead>
                            <tr>
                                <th class="p-1 align-middle text-center" rowspan="2">No.</th>
                                <th colspan="2" class="p-1 text-center">Destination</th>
                                <th colspan="2" class="p-1 text-center">Started</th>
                                <th rowspan="2" class="p-1 align-middle text-center">Distance</th>
                                <th rowspan="2" class="p-1 align-middle text-center">Fuel</th>
                                <th rowspan="2" class="p-1 align-middle text-center">Expenses</th>
                                <th colspan="2" class="p-1 text-center">Ended</th>
                            </tr>
                            <tr>
                                <th class="p-1 text-center">From</th>
                                <th class="p-1 text-center">To</th>
                                <th class="p-1 text-center">Date</th>
                                <th class="p-1 text-center">Time</th>
                                <th class="p-1 text-center">Date</th>
                                <th class="p-1 text-center">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workbooks as $workbook)
                            <tr>
                                <td class="">{{ $workbook->id }}</td>
                                <td>{{ $workbook->from }}</td>
                                <td>{{ $workbook->to }}</td>
                                <td class="">{{ $workbook->started_date }}</td>
                                <td class="">{{ $workbook->started_time }}</td>
                                <td class="">{{ $workbook->distance }}</td>
                                <td class="">{{ $workbook->fuel }}</td>
                                <td class="">{{ $workbook->expenses }}</td>
                                <td class="">{{ $workbook->started_date }}</td>
                                <td class="">{{ $workbook->started_time }}</td>
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
