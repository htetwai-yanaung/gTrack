@extends('drivers.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Drivers</strong> Check list</h1>

        <div class="row">
            <div class="col col-md-5">
                <div class="">
                    {{-- <ul class="list-group"  id="list">
                        @foreach ($checkList as $cl)
                        <li class="list-group-item">
                            <label for="1" id="lb-{{ $cl->id }}" class="@if ($cl->status == '1')
                                text-decoration-line-through
                            @endif">{{ $cl->title }}</label>
                            <input name="checkList[]" @checked($cl->status == '1') class="form-check-input float-end" id="{{ $cl->id }}" type="checkbox" value="{{ $cl->id }}">
                        </li>
                        @endforeach
                    </ul> --}}
                    @foreach ($checkList as $key=>$cl)
                    <ul class="list-group mb-3"  id="list">
                        <li class="list-group-item">
                            <span class="card-title text-primary">{{ $key }}</span>
                        </li>
                            @foreach ($cl as $c)
                            <li class="list-group-item">
                                <div class="py-1 d-flex">
                                    <div class="">
                                        @if ($c->status == '0')
                                        <i class="text-warning" data-feather="alert-circle"></i>
                                        @else
                                        <i class="text-success" data-feather="check-circle"></i>
                                        @endif
                                    </div>
                                    <div class="px-2">
                                        <span class="lh-lg text-wrap"> {{ $c->title }}</span>
                                    </div>
                                    <div class="ms-auto @if($c->status == '1') d-none @endif">
                                        <input class="form-check-input me-1" name="checkList[]" type="checkbox" value="{{ $c->id }}">
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @endforeach
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
            // if($(this).is(':checked')){            }
            console.log('checked', e.target.value);
            $clId = e.target.value;
            $.ajax({
                type: 'get',
                url: 'http://139.180.190.148/gtruck/public/check-list/change-status',
                data: {
                    'checkListId' : $clId,
                    'status' : '1'
                },
                dataType: 'json',
                success: function(res){
                    location.reload();
                }
            });
        })
    });


</script>
@endsection
