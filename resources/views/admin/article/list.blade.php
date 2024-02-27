@extends('layouts.adminDashboard')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h2>List Article</h2>
        </div>
        <div class="col-lg-6">
            <a href="{{route('admin.dashboard.article.create')}}" class="btn btn-primary btn-sm"
                style="margin-left: 300px">Add Article</a>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        <strong>{{session('success')}}</strong>
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col" class="text-center">Photo</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @if ($articles)
            @foreach ($articles as $key => $article )
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->User->name}}</td>
                <td><img src="{{asset('storage/thumbnails/'.$article->photo)}}" class="rounded mx-auto d-block"
                        style="width: 18rem;"></td>
                <td><a href="#" class="btn btn-success">Edit</a></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">
                    <div class="text-center">
                        <h4>Tidak ada data</h4>
                    </div>
                </td>
            </tr>
            @endif
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

@endsection