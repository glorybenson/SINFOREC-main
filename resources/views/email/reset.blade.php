@component('mail::message')


Bonjour <b>{{$first_name}}  {{$last_name}}</b>,<br>
Nous avons reçu une demande de définition d'un nouveau mot de passe
pour ce compte: <b>{{$email}}</b>.

@component('mail::button', ['url' => $url, ])
Reset Password
@endcomponent

Merci,<br>
<!-- {{ config('app.name') }} -->
@endcomponent