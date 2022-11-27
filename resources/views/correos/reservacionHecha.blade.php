{{-- <x-mail::message>
# Reservación

Se hizo una reservación a nombre de {{ $user->name }}.

<x-mail::button :url="">
Visitar sitio
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message> --}}
@component('mail::message')
# Reservación

Se hizo una reservación a nombre de {{ $user->name }}.

@component('mail::button', ['url' => route('dashboard')])
Visitar sitio
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent