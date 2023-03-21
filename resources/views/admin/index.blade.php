@extends('admin.layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Admin</strong> Dashboard</h1>

        <div class="row">
            <div class="col d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Company list</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th class="d-none d-md-table-cell">E-mail</th>
                                <th class="d-none d-sm-table-cell">Phone</th>
                                <th class="d-none d-xl-table-cell">Profile</th>
                                <th class="d-none d-lg-table-cell">Status</th>
                                <th class="d-sm-table-cell text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->company_name }}</td>
                                <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                                <td class="d-none d-sm-table-cell">{{ $user->phone }}</td>
                                <td class="d-none d-xl-table-cell">
                                    <img class="avatar img-fluid rounded" src="{{ url('images/default-driver.png') }}" alt="">
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    @if ($user->status == '0')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-warning">Active</span>
                                    @endif
                                </td>
                                <td class="d-sm-table-cell text-center">
                                    <a href=""><i class="text-success" data-feather="eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
