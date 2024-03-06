@component('mail::message')
# Welcome!

Hi {{$user->name}}
<br>
Welcome to Theblog, your account has been created successfully.
@component('mail::button', ['url' => route('home')])
Confirmation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent