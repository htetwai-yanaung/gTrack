@extends('drivers.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Drivers</strong> Check list</h1>

        <div class="row">
            {{-- <div class="col-5">
                <ul class="list-group"  id="list">
                    <li class="list-group-item">
                        <label for="1">title</label>
                        <input class="form-check-input float-end" id="1" type="checkbox" value="option1">
                    </li>
                    <li class="list-group-item">
                        <label for="1">title</label>
                        <input class="form-check-input float-end" id="1" type="checkbox" value="option1">
                    </li>
                    <li class="list-group-item">
                        <label for="1">title</label>
                        <input class="form-check-input float-end" id="1" type="checkbox" value="option1">
                    </li>
                    <li class="list-group-item">
                        <label for="1">title</label>
                        <input class="form-check-input float-end" id="1" type="checkbox" value="option1">
                    </li>
                    <li class="list-group-item">
                        <label for="1">title</label>
                        <input class="form-check-input float-end" id="1" type="checkbox" value="option1">
                    </li>
                </ul>
            </div> --}}
            <div class="col-5 bg-white shadow">
                <div class="p-3">
                    <h5 class="card-title mb-3">Your Car check list</h5>
                    <ul class="list-group"  id="list">
                        @foreach ($checkList as $cl)
                        <li class="list-group-item">
                            <label for="1" id="lb-{{ $cl->id }}" class="@if ($cl->status == '1')
                                text-decoration-line-through
                            @endif">{{ $cl->title }}</label>
                            <input name="checkList[]" @checked($cl->status == '1') class="form-check-input float-end" id="{{ $cl->id }}" type="checkbox" value="{{ $cl->id }}">
                        </li>
                        @endforeach
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
        $("input[name='checkList[]']").change(function(e){
        if($(this).is(':checked')){
            console.log('checked', e.target.value);
            $clId = e.target.value;
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/driver/check-list/check',
                data: {
                    'checkListId' : $clId,
                    'status' : '1'
                },
                dataType: 'json',
            });
        }else{
            console.log('unchecked');
            $clId = e.target.value;
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/driver/check-list/check',
                data: {
                    'checkListId' : $clId,
                    'status' : '0'
                },
                dataType: 'json',
            });
        }
        })
    });


</script>
@endsection
