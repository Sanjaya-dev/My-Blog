@extends('layouts.web')

@section('title')
Detail article
@endsection

@section('bodyClass', 'bg-light')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center bg-success">
            <h5 class="card-title">{{$article->title}}</h5>
            <p>Author : {{$article->User->name}} &#8739; Upload : {{date_format($article->created_at,"d/m/Y H:i:s")}}
            </p>
        </div>
        <div class="card-body">
            <p class="card-text">{!! nl2br($article->content)!!}</p>
            <p class="card-text"><small class="text-body-secondary">Last updated
                    {{date_format($article->updated_at,"d/m/Y H:i:s")}}</small></p>
        </div>
    </div>
</div>
@endsection