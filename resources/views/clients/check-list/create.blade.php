@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Car</strong> Details</h1>

        <div class="row gap-2">
            <div class="col-5">
                <form action="{{ route('checkList.store') }}" method="POST"  class="bg-white shadow position-relative">
                    @csrf
                    <div class="p-3 border-bottom">
                        <h3 class="card-title">Check list</h3>
                    </div>
                    <div class="row px-3 py-1">
                        <div class="col-4">
                            <label class="align-middle mt-1" for="">Select a car</label>
                        </div>
                        <div class="col">
                            <select name="car_id" id="carList1" class="form-select @error('car_id') is-invalid @enderror">
                                <option value="" class="d-none">Choose a car</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="d-flex my-1" id="clparent">
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="title">
                            <input type="hidden" name="cl_number" id="cl_number">
                            <button type="button" class="btn btn-primary ms-2" id="add-btn">&plus;</button>
                        </div>
                        <div id="cl-container">
                            <ul class="list-group my-3" id="list">
                            </ul>
                        </div>

                    </div>
                    <div class="p-3 border-top">
                        <div class="mb-3">
                            <label for="note">Note</label>
                            <input type="text" class="form-control" name="note" placeholder="note...">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary ms-2" id="save">Save</button>
                        </div>
                    </div>
                </form>
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
                    showList(res);
                }
            });
        })

        $('#carList1').change(function(e){
            $carId = e.target.value;
            localStorage.setItem('carId', e.target.value);
            $.ajax({
                type: 'get',
                url: 'http://139.180.190.148/gtruck/public/check-list/list',
                data: {
                    'carId' : $carId
                },
                dataType: 'json',
                success: function(res){
                    showList(res);
                }
            });
        })

        $.ajax({
            type: 'get',
            url: 'http://139.180.190.148/gtruck/public/check-list/list',
            data: {
                'carId' : $selectedCarId
            },
            dataType: 'json',
            success: function(res){
                showList(res);
            }
        });

        showList = (res) => {
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

        $('#add-btn').click(function() {
            $title = $('#title').val();
            if($title != ''){

                $list = `
                    <li class="list-group-item">
                        <label>${$title}</label>
                        <input type="hidden" name="title[]" value="${$title}">
                    </li>
                `;
                $('#list').append($list);
            }
            $('#title').val('');
        })

        $('#save').click(function() {
            $random = Math.floor(Math.random() * 100000001);
            $clCode = 'CL'+$random;
            $('#cl_number').val($clCode);
        })
    })
</script>
@endsection
