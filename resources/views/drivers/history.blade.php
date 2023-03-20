@extends('drivers.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Workbook</strong> History</h1>

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
                                <th class="">No.</th>
                                <th>Destination</th>
                                <th colspan="2" class="text-center">Started</th>
                                <th class="">Distance</th>
                                <th class="">Fuel</th>
                                <th class="">Expenses</th>
                                <th colspan="2" class="text-center">Ended</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workbooks as $key => $workbook)
                            <tr>
                                <td class="">{{ $key+1 }}</td>
                                <td>{{ $workbook->destination }}</td>
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
