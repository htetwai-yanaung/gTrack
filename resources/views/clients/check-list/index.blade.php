@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Car</strong> Details</h1>

        <div class="row gap-2">
            <div class="col-5">
                <form id="form1" action="{{ route('checkList.store') }}" method="POST"  class="bg-white shadow position-relative">
                    @csrf
                    <div class="p-3">
                        <h3 class="card-title">Check list</h3>
                    </div>
                    <div class="p-3 border-top">
                        <select name="car_id" id="carList1" class="form-select @error('car_id') is-invalid @enderror">
                            <option value="" class="d-none">Choose a car</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-3 border-top">
                        <div class="d-flex">
                            <input type="text" form="form1" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title">
                            <button class="btn btn-primary ms-2">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="bg-white shadow">
                    <div class="px-3 py-2 d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Check list</h3>
                        <div>
                            <select name="car_id" id="carList" class="form-select">
                                <option value="" class="">Choose a car</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <ul class="list-group"  id="list">
                        <li class="list-group-item">
                            <label for="">title</label>
                            <a href="" class="float-end"><i data-feather="x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

@section('scriptSource')
<script>
    $(document).ready(function() {
        $selectedCarId = localStorage.getItem('carId');
        $('#carList').val($selectedCarId);
        $('#carList1').val($selectedCarId);
        $('#carList').change(function(e){
            $carId = e.target.value;
            localStorage.setItem('carId', e.target.value);
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/check-list/list',
                data: {
                    'carId' : $carId
                },
                dataType: 'json',
                success: function(res){
                    $list = '';
                    for($i=0;$i<res.length;$i++){
                        console.log(res[$i]);
                        $list += `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <label for="">${res[$i]['title']}</label>
                            <form action="{{ route('checkList.delete') }}" method="get">
                                @csrf
                                <input type="hidden" name="checkListId" value="${res[$i]['id']}">
                                <button class="btn btn-outline-danger btn-sm">&times;</button>
                            </form>
                        </li>
                        `;
                    }
                    $('#list').html($list);
                }
            });
        })

        $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/check-list/list',
                data: {
                    'carId' : $selectedCarId
                },
                dataType: 'json',
                success: function(res){
                    $list = '';
                    for($i=0;$i<res.length;$i++){
                        console.log(res[$i]['title']);
                        $checkListId = res[$i]['id'];
                        $list += `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <label for="">${res[$i]['title']}</label>
                            <form action="{{ route('checkList.delete') }}" method="get">
                                @csrf
                                <input type="hidden" name="checkListId" value="${res[$i]['id']}">
                                <button class="btn btn-outline-danger btn-sm">&times;</button>
                            </form>
                        </li>
                        `;
                    }
                    $('#list').html($list);
                }
        });
    })
</script>
@endsection
