@component('mail::message')
# Hola, <strong>{{ $team_name }}</strong>, te ha invitado a trabajar en tu bienestar.

Tu clave de acceso temporal es <br />

# {{ $password }}<br>

Da click en el siguiente enlace para ingresar al grupo<br>

@component('mail::button', ['url' => $emailConfirmationUrl])
    Aceptar invitación
@endcomponent

Recuerda que este enlace es válido por 7 días

Si tiene dudas contacte al administrador

<strong>{{ $incharge_name }}</strong><br />
{{ $incharge_role }}<br />
{{ $incharge_email }}<br />
{{ $incharge_phone }}<br />



Gracias,<br>
{{ config('app.name') }}
@endcomponent
