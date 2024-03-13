@extends('layouts.web')

@section('title')
Detail article
@endsection

@section('bodyClass', 'bg-light')

@section('content')
<div class="container">
    <div class="card">
        <img src="{{asset('storage/thumbnails/'.$article->photo)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">{{$article->content}}</p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
    </div>
</div>
@endsection