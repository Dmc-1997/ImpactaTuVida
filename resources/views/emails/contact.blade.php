@component('mail::message')
#
Nombre: {{$name}}<br />
Email: {{$email}}<br />
Teléfono: {{$phone}}<br />
Cargo: {{$position}}<br />
Compañia: {{$company}}<br />
País: {{$country}}<br />
Empleados: {{$employees}}<br />


Gracias,<br>
{{ config('app.name') }}
@endcomponent