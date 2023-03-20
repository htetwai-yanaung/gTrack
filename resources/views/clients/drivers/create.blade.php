@extends('clients.layouts.app')

@section('content')
<main class="content">
    <h1 class="h3 mb-3"><strong>Drivers</strong> Create</h1>

    <form class="container p-3" action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="role" value="driver">
        <input type="hidden" name="company_name" value="">
        <input type="hidden" name="company_id" value="{{ Auth::user()->id }}">
        <div class="row">
            <div class="col-6 py-3 bg-white shadow">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror form-control-lg" type="text" name="name" placeholder="Enter name" />
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input class="form-control @error('age') is-invalid @enderror form-control-lg" type="number" name="age" placeholder="Enter age" />
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror form-control-lg" type="email" name="email" placeholder="Enter email" />
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror form-control-lg" type="number" name="phone" placeholder="Enter phone" />
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input class="form-control @error('address') is-invalid @enderror form-control-lg" type="text" name="address" placeholder="Enter address" />
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">License</label>
                        <input class="form-control @error('license') is-invalid @enderror form-control-lg" type="text" name="license" placeholder="Enter license number" />
                    </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input class="form-control @error('photo') is-invalid @enderror form-control-lg" type="file" name="photo"/>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror form-control-lg" type="password" name="password" placeholder="Enter password" />
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror form-control-lg" type="password" name="password_confirmation" placeholder="Enter confirm password" />
                    </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <a href="index.html" class="btn btn-lg btn-primary">Sign up</a> --}}
                    <div class="col">
                        <button class="btn btn-lg btn-primary float-end">Create</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</main>
@endsection
