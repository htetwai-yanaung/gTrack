@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Cars</strong> Create</h1>

        <div class="row">
            <div class="col-5">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-center">Create a new car</h5>
                    </div>
                    <form action="{{ route('cars.update', $car->id) }}" method="POST" class="container px-3">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="" class="align-middle">Car Name :</label>
                            </div>
                            <div class="col">
                                <input type="text" value="{{ $car->name }}" name="name" class="form-control" placeholder="car name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="" class="align-middle">Model :</label>
                            </div>
                            <div class="col">
                                <input type="text" value="{{ $car->model }}" name="model" class="form-control" placeholder="car model">
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="" class="align-middle">Color :</label>
                            </div>
                            <div class="col">
                                <input type="text" value="{{ $car->color }}" name="color" class="form-control" placeholder="color">
                                @error('color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="" class="align-middle">Car Number :</label>
                            </div>
                            <div class="col">
                                <input type="text" value="{{ $car->number }}" name="number" class="form-control" placeholder="number">
                                @error('number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="" class="align-middle">License :</label>
                            </div>
                            <div class="col">
                                <input type="text" value="{{ $car->license }}" name="license" class="form-control" placeholder="license number">
                                @error('license')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="" class="align-middle">Year :</label>
                            </div>
                            <div class="col">
                                <input type="number" value="{{ $car->year }}" name="year" class="form-control" placeholder="year">
                                @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="" class="align-middle">Fuel :</label>
                            </div>
                            <div class="col">
                                <input type="text" value="{{ $car->fuel }}" name="fuel" class="form-control" placeholder="fuel">
                                @error('fuel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <a href="{{ route('cars.index') }}" class="btn btn-outline-primary">Cancel</a>
                                <button class="btn btn-primary float-end">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
