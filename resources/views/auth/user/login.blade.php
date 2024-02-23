<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h1 class="header-third">
                Start Today
            </h1>
            <p class="subheader">
                Because tomorrow become never
            </p>
        </x-slot>

        <p>
            <a class="btn btn-border btn-google-login" href="{{route('user.login.google')}}">
                <img src="{{asset('images/ic_google.svg')}}" class="icon" alt=""> Sign In with Google
            </a>
        </p>
    </x-auth-card>
</x-guest-layout>