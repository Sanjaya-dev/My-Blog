@extends('layouts.adminDashboard')
@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <h2>List Article</h2>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
            <a href="{{route('admin.dashboard.article.create')}}" class="btn btn-primary btn-sm"
                style="margin-left: 200px"><i class="fa-solid fa-plus"></i>Add Article</a>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        <strong>{{session('success')}}</strong>
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @elseif(session()->has('update'))
    <div class="alert alert-success">
        <strong>{{session('update')}}</strong>
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @elseif(session()->has('delete'))
    <div class="alert alert-success">
        <strong>{{session('delete')}}</strong>
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.dashboard.article')}}" method="get" class="input-group" style="width:50%">
                <input type="text" placeholder="title article" class="form-control" name="q" value="{{$request['q'] ?? ''}}">
                <button type="submit" class="btn btn-info btn-sm">
                    search
                </button>
            </form>
            <table class="table table-hover table-bordered mt-3">
                <thead class="table-dark">
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
                                style="width: 10rem;"></td>
                        <td>
                            <a href="{{route('admin.dashboard.article.edit',$article->id)}}"
                                class="btn btn-success btn-sm" title="Edit"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#alertDelete{{$article->id}}" title="Delete"><i
                                    class="fa-solid fa-trash"></i></button>

                            {{-- modal alert-delete --}}
                            <div class="modal fade" id="alertDelete{{$article->id}}" tabindex="-1"
                                aria-labelledby="deleteModalLabe" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('admin.dashboard.article.destroy',$article->id)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabe">Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus article {{$article->title}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </td>
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
    </div>



</div>


<!-- /.container-fluid -->

@endsection