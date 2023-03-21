@extends('drivers.layouts.app')

@section('content')
<main class="content">
    <h1 class="h3 mb-3"><strong>Drivers</strong> Workbook</h1>


    <form action="{{ route('workbook.store') }}" method="POST" class="container-fluid p-4 bg-white">
        @csrf
        <input type="hidden" name="driver_id" value="{{ Auth::user()->id }}">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">Started Date</label>
                    <input type="date" name="started_date" id="" class="form-control @error('started_date') is-invalid @enderror" placeholder="started date">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">Starting Time</label>
                    <input type="time" name="started_time" id="" class="form-control @error('started_time') is-invalid @enderror" placeholder="started time">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">From</label>
                    <input type="text" name="from" id="" class="form-control @error('from') is-invalid @enderror" placeholder="start">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">To</label>
                    <input type="text" name="to" id="" class="form-control @error('distance') is-invalid @enderror" placeholder="destination">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">Distance</label>
                    <input type="number" name="distance" id="" class="form-control @error('distance') is-invalid @enderror" placeholder="kilometer">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">Fuel</label>
                    <input type="text" name="fuel" id="" class="form-control @error('fuel') is-invalid @enderror" placeholder="10L">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">Expenses</label>
                    <input type="number" name="expenses" id="" class="form-control @error('expenses') is-invalid @enderror" placeholder="fee">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">Ended Date</label>
                    <input type="date" name="ended_date" id="" class="form-control @error('ended_date') is-invalid @enderror" placeholder="ended date">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                <div class="">
                    <label for="">Ended Time</label>
                    <input type="time" name="ended_time" id="" class="form-control @error('ended_time') is-invalid @enderror" placeholder="ended time">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary float-end">Save</button>
            </div>
        </div>
    </form>

</main>
@endsection


