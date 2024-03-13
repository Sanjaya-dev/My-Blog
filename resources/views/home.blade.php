@extends('layouts.web')

@section('title')
article
@endsection

@section('bodyClass', 'bg-light')

@section('content')
<div id="article" class="bg-light">
    <div class="container">
        <div id="search-article" class="row">
            <div class="search-blog col-lg-4 text-center pt-3 m-auto">
                <h1>Article</h1>
                <form action="#" method="get">
                    <div class="input-group">
                        <input type="text" placeholder="search blog" class="form-control form-control-sm">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success btn-sm">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="article-content" class="row pt-5">
            @foreach ($articles as $article )
            <div class="col-lg-4 pb-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/thumbnails/'.$article->photo)}}" class="card-img-top img-thumbnail"
                        style="max-width: 290px;max-height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <a href="{{route('home.detailarticle',$article->id)}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection