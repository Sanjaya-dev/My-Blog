@extends('layouts.adminDashboard')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            @if($button == 'Submit')
            Add Article
            @elseif ($button == 'Update')

            Edit Article {{$article->title}}
            @endif
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{route($url,$article->id ?? '')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{old('title') ?? $article->title ?? ''}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control">
                            <img src="{{old('photo') ?? $button == 'Update' ? asset('storage/thumbnails/'.$article->photo) : ''}}"
                                class="rounded" style="width: 10rem">
                            @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content"
                                class="form-control">{{old('content') ?? $article->content ?? ''}}</textarea>
                            @error('content')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="button" class="btn btn-danger btn-sm"
                            onclick="window.history.back()">Cancle</button>
                        <button type="submit" class="btn btn-primary btn-sm ml-3">{{$button == 'Submit' ? 'Submit' :
                            'Update' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection