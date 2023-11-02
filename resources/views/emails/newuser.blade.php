@component('mail::message')
Bienvenido a Impacta tu vida. Gracias por confiar en nosotros, esperamos juntos poder Impactar positivamente la vida de
tus colaboradores

Te invitamos a ver este corto TUTORIAL para que aprendas a usar nuestra plataforma, VER VIDEO TUTORIAL<br />


@component('mail::button', ['url' => "https://youtu.be/rJEcUJO6B8g"])
    Tutorial
@endcomponent


Estos son los datos para ingresar, al panel de administración de tu EMPRESA dentro de IMPACTA TU VIDA. <br />

Url de tu empresa dentro de IMPACTA<br />
{{ $loginUrl }}

Correo / Usuario:<br />
# {{ $user->email }} <br />

Tu clave de acceso temporal es <br />
# {{ $password }}<br>

@component('mail::button', ['url' => $loginUrl])
    Iniciar Sessión
@endcomponent

Mira como activiar tu cuenta en este video

@component('mail::button', ['url' => "https://youtu.be/EbBQczu9V9g"])
    Video
@endcomponent

Recuerda que si tiene dudas puede contactarnos al correo contacto@impactatuvida.co<br />

Gracias,<br>
{{ config('app.name') }}
@endcomponent
