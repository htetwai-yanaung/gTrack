@extends('clients.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Check</strong> List</h1>

        <div class="row">
            <div class="col d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Latest Projects</h5>
                        <a href="{{ route('checkList.create') }}" class="btn btn-primary">&plus; Create Check List</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
            @foreach ($cl_list as $cl)
            <div class="col mb-3">
                <div class="bg-white rounded shadow p-3 h-100">
                    <h5 class="card-title text-primary">{{ $cl[0]->cl_number }} (<small>{{ $cl[0]->created_at->format('d-m-Y') }}</small>)</h5>

                    @foreach ($cl as $list)
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
            @endforeach

        </div>

    </div>
</main>
@endsection

