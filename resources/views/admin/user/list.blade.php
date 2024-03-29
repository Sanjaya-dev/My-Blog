@extends('layouts.adminDashboard')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <h1>List User</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user )
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

@endsection