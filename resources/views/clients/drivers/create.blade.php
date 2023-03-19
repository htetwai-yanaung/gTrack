@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Drivers</strong> Create</h1>

        <div class="row">
            <div class="col-5">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-center">Add new driver</h5>
                    </div>
                    <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data" class="container px-3">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-3">
                                <label for="" class="align-middle">Name :</label>
                            </div>
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="driver name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3">
                                <label for="" class="align-middle">Age :</label>
                            </div>
                            <div class="col">
                                <input type="number" name="age" class="form-control" placeholder="age">
                                @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3">
                                <label for="" class="align-middle">Phone :</label>
                            </div>
                            <div class="col">
                                <input type="text" name="phone" class="form-control" placeholder="phone">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3">
                                <label for="" class="align-middle">Address :</label>
                            </div>
                            <div class="col">
                                <input type="text" name="address" class="form-control" placeholder="address">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3">
                                <label for="" class="align-middle">License :</label>
                            </div>
                            <div class="col">
                                <input type="text" name="license" class="form-control" placeholder="license number">
                                @error('license')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3">
                                <label for="" class="align-middle">Photo :</label>
                            </div>
                            <div class="col">
                                <input type="file" name="photo" class="form-control" placeholder="photo">
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <a href="{{ route('drivers.index') }}" class="btn btn-outline-primary">Cancel</a>
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
