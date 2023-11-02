@extends('themes.advanced.admin', ['nav_active' => -1,
                           'title' =>  'Administración | Gerenciando'
                           ])

@section('content')
<style>
	 .map{height:300px;}
</style>

<div class="row mb-8">
    <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12 mb-4">
        <h1 class="h3 mb-2 text-gray-800">Información de mi negocio</h1>
        <p class="mb-0"></p>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12 mb-4">
        <a href="{{ route('mysettings') }}" title="Nuevo" class="btn btn-primary btn-block"> Configuración</a>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card shadow">
            <div class="card-header">
                <h3>Datos generales</h3>
			</div>
			<div class="card-body">
				{!! Form::open(['route' => ['mysettings.update', $mysettings->id], 'method' => 'PUT','class'=>'form-horizontal']) !!}
					<div class="form-group row">
						{!! Form::label('name','Nombe o razón social',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
							{!! Form::text('name', $mysettings->name, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre', 'required']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('phone','Teléfono',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
							{!! Form::text('phone', $mysettings->phone, ['class' => 'form-control', 'placeholder' => 'Escriba el telefono', 'required']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('email','Email',['class' => 'col-sm-3 col-form-label']) !!}
					    <div class="col-sm-9">
						    {!! Form::email('email', $mysettings->email, ['class' => 'form-control', 'placeholder' => 'Escriba el correo electronica', 'required']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('nit','NIT o CC',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('nit', $mysettings->nit, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('whatsapp_number','Número de whatsapp',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('whatsapp_number', $mysettings->whatsapp_number, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('country','País',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('country', $mysettings->country, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('department','Departemento / Estado',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('department', $mysettings->department, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('city','Ciudad',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('city', $mysettings->city, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('neighborhood','Barrio',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('neighborhood', $mysettings->neighborhood, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('address','Dirección',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('address', $mysettings->address, ['class' => 'form-control', 'placeholder' => 'Escriba la Dirección']) !!}
						</div>
					</div>


					<div class="form-group row">
						{!! Form::label('zipcode','Código Postal',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('zipcode', $mysettings->zipcode, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('business_code','Código',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('business_code', $mysettings->business_code, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('decimals','Decimales',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('decimals', $mysettings->decimals, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('quantity_decimals','Decimales de productos',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('quantity_decimals', $mysettings->quantity_decimals, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('currency','Moneda',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::select('currency_id', $currencies, $mysettings->currency_id, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('api_key','Api Key',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
							{!! Form::text('api_key', $mysettings->api_key, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>

					<div class="form-group row">
						{!! Form::label('next_bill_number','Próxima factura',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
							{!! Form::text('next_bill_number', $mysettings->next_bill_number, ['class' => 'form-control', 'placeholder' => '']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('tax_by_default','Iva por defecto',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
							{!! Form::select('tax_id', $taxes, $mysettings->tax_id, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						@if(file_exists( public_path().'/imagenes/logos/'.$mysettings->logo ) && ($mysettings->logo != '') && ($mysettings->logo != 'default.jpg'))
							<img src="{{ asset('imagenes/logos/'.$mysettings->logo) }}" width="150px" />
							<a href="{{ route('mysettings.destroy.logo') }}" class="btn btn-theme-dark mb-1 float-right"><i class="fa fa-trash"></i></a>
						@endif
					</div>


					<div class="form-group row">
						{!! Form::label('schedule','Horario',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('schedule', $mysettings->schedule, ['class' => 'form-control', 'placeholder' => 'Escriba el horario']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('apigooglemaps','Api Google Maps',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
							{!! Form::text('apigooglemaps', $mysettings->apigooglemaps, ['class' => 'form-control', 'placeholder' => 'Escriba la llave de google maps', 'required']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('facebook','facebook',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('facebook', $mysettings->facebook, ['class' => 'form-control', 'placeholder' => 'Escriba el fanpage de facebook']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('gplus','g+',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('gplus', $mysettings->gplus, ['class' => 'form-control', 'placeholder' => 'Página de g+']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('twitter','twitter',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('twitter', $mysettings->twitter, ['class' => 'form-control', 'placeholder' => 'Escriba la página de twitter']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('instagram','instagram',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('instagram', $mysettings->instagram, ['class' => 'form-control', 'placeholder' => 'Escriba la página de instagram']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('linkedin','linkedin',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('linkedin', $mysettings->linkedin, ['class' => 'form-control', 'placeholder' => 'Escriba la página de linkedin']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('youtube','Youtube',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('youtube', $mysettings->youtube, ['class' => 'form-control', 'placeholder' => 'Escriba el canal de youtube']) !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('website','website',['class' => 'col-sm-3 col-form-label']) !!}
						<div class="col-sm-9">
						  	{!! Form::text('website', $mysettings->website, ['class' => 'form-control', 'placeholder' => 'Escriba la dirección de la página web']) !!}
						</div>
					</div>

					<!--div class="form-group">
						{!! Form::label('logo','Imagen') !!}
						{!! Form::file('logo') !!}
						<div>
							<small class="text-danger">
								tamaño sugerido (48px por 48px) <br />
							</small>
						</div>
					</div-->

					<div class="form-group float-right">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
					{{ Form::hidden('lat', $mysettings->lat, array('id' => 'lat')) }}
					{{ Form::hidden('lon', $mysettings->lon, array('id' => 'lon')) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card shadow">
            <div class="card-header">
                <h3>Mapa</h3>
			</div>
			<div class="card-body">
				<div id="map" class="map"></div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('js')
<script>

var lat = {{$mysettings->lat}};
var lon = {{$mysettings->lon}};


if (lat == null || lat == 0 ){
  lat = 7.1007833;
}
if (lon == null || lon== 0 ){
  lon =  -73.0568307;
}
var posicioninicial = {lat: lat, lng: lon};

var markers = [];
var marcador = 0;
var icono = "";
var marker="";


function initMap() {
var myLatLng = {lat: lat, lng: lon};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 14,
  center: myLatLng
});

SelIcono();
  addMarker(myLatLng, map);

google.maps.event.addListener(map, 'click', function(event) {
      SelIcono();
      deleteMarkers();
      addMarker(event.latLng, map);
      document.getElementById("lat").value = marker.position.lat();
      document.getElementById("lon").value = marker.position.lng();
      });

}

function SelIcono(){
        icono = "{{ asset('images/markers/'.$mysettings->marker) }}";
      console.log(icono);
  }

  function addMarker(location, map) {
  var image = icono;
   marker = new google.maps.Marker({
     position: location,
            map: map,
      icon: image
    });
  }



function deleteMarkers() {
    marker.setMap(null);
    marker = "";
  }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{$mysettings->apigooglemaps}}&signed_in=true&callback=initMap"></script>
@endsection