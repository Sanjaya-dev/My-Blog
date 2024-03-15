@extends('layouts.adminDashboard')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <h1>List User</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.dashboard.user')}}" method="get" class="input-group" style="width:50%">
                <input type="text" placeholder="user name" class="form-control" name="q"
                    value="{{$request['q'] ?? ''}}">
                <button type="submit" class="btn btn-info btn-sm">
                    search
                </button>
            </form>
            <table class="table table-hover table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user )
                    <tr>
                        <th scope="row">{{($users->currentPage() - 1) * $users->perPage() + $loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection