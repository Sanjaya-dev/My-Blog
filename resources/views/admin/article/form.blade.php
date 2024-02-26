@extends('layouts.adminDashboard')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Add Article
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{route('admin.dashboard.article.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" class="form-control">{{old('content')}}</textarea>
                            @error('content')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection