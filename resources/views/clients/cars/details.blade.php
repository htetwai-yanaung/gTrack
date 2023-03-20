@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Car</strong> Details</h1>

        <div class="row gap-2 m-1">
            <div class="col-12 col-md bg-white shadow">
                <div class="container p-3">
                    <h5 class="card-title mb-3">Car Informatin</h5>
                    <div class="row mb-3">
                        <div class="col-3">
                            <span>Name</span>
                        </div>
                        <div class="col">
                            <span>: {{ $car->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <span>Model</span>
                        </div>
                        <div class="col">
                            <span>: {{ $car->model }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <span>License</span>
                        </div>
                        <div class="col">
                            <span>: {{ $car->license }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <span>Color</span>
                        </div>
                        <div class="col">
                            <span>: {{ $car->color }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <span>Year</span>
                        </div>
                        <div class="col">
                            <span>: {{ $car->year }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <span>Fuel</span>
                        </div>
                        <div class="col">
                            <span>: {{ $car->fuel }}</span>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    @if (count($car->drivers) > 0)
                        @foreach ($car->drivers as $driver)
                        <div class="card mb-0 shadow-none">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Driver Profile</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="
                                @if ($driver->photo == null)
                                    {{ url('images/default-driver.png') }}
                                @else
                                    {{ url('images/'.$driver->photo) }}
                                @endif
                                " alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                <h5 class="card-title mb-0">{{ $driver->name }}</h5>
                                <div class="text-muted mb-2">{{ $driver->license }}</div>

                                <div>
                                    <a class="btn btn-primary btn-sm" href="{{ route('drivers.profile',$driver->id) }}">
                                        <i data-feather="info"></i>
                                    </a>
                                    <a href="{{ route('remove.driver',[$car->id,$driver->id]) }}" class="btn btn-outline-danger btn-sm" href="#">Remove</a>
                                </div>
                            </div>
                            <hr class="my-0" />
                        </div>
                        @endforeach
                    @else
                    <div class="card mb-0 shadow-none">
                        <div class="card-header ">
                            <h5 class="card-title mb-0">Add Driver</h5>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-hover my-0">
                                <tbody>
                                    @foreach ($drivers as $driver)
                                        @if ($driver->status == '0')
                                        <tr>
                                            <td>
                                                <img src="
                                                @if ($driver->photo == null)
                                                {{ url('images/default-driver.png') }}
                                                @else
                                                {{ url('images/'.$driver->photo) }}
                                                @endif
                                                " class="avatar img-fluid rounded-circle" alt="William Harris">
                                            </td>
                                            <td>{{ $driver->name }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-success btn-sm" href="{{ route('add.driver',[$car->id,$driver->id]) }}">&plus;</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md bg-white shadow">
                <div class="p-3">
                    <h5 class="card-title mb-3">Car check list</h5>


                    {{-- <ul class="list-group"  id="list">
                        @foreach ($checkList as $cl)
                        <li class="list-group-item">
                            <label for="" class="@if ($cl->status == '1')
                                text-decoration-line-through
                            @endif">{{ $cl->title }}</label>
                            @if ($cl->status == '1')
                            <span class="float-end"><i class="text-success" data-feather="check-circle"></i></span>
                            @endif
                        </li>
                        @endforeach
                    </ul> --}}
                    @foreach ($checkList as $list)
                        <div class="py-1">
                            @if ($list->status == '0')
                            <i class="text-warning" data-feather="alert-circle"></i>
                            @else
                            <i class="text-success" data-feather="check-circle"></i>
                            @endif
                            <span class="lh-lg"> {{ $list->title }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
