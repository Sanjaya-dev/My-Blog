<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">MY Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Article</a>
                </li>
            </ul>
            @auth
            <div class="navbar-nav ml-auto dropdown no-arrow">
                <a href="#" class="nav-link" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hello,{{Auth::user()->name}}
                    <img src="{{Auth::user()->avatar}}" class="rounded-circle user-photo">
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: auto;">
                        <li>
                            <a href="#" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                Out</a>
                            <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>
                        </li>
                    </ul>
                </a>
            </div>
            @else
            <div class="navbar-nav ml-auto">
                <a href="{{route('login')}}" class="btn btn-secondary btn-sm me-3">Register</a>
                <a href="{{route('login')}}" class="btn btn-primary btn-sm">Login</a>
            </div>
            @endauth

        </div>
    </div>
</nav>