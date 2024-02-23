@extends('layouts.web')

@section('title')
article
@endsection

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
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection