@section('head')
    <link rel="stylesheet" href="{{ asset('vendor/croppie/croppie.css') }}">
@endsection
<x-jet-form-section submit="updateProfileInformation"  style="margin-top: -3rem;margin-bottom: 3rem;">
    <x-slot name="title">

    </x-slot>

    <x-slot name="description">

    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="text-center col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                {{-- <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " /> --}}

                {{-- <x-jet-label for="photo" value="{{ __('Photo') }}" /> --}}

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover img-fluid">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                {{-- <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    Seleccionar una nueva foto
                </x-jet-secondary-button> --}}

                {{-- @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        Eliminar foto
                    </x-jet-secondary-button>
                @endif --}}

                Actualice su foto <br>
                <a href="javascript:void(0);" class="btn btn-style" title="editar avatar" data-toggle="modal" data-target="#userAvatarModal"><i class="fa fa-camera"></i> Editar</a>

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!--div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div-->
    </x-slot>

    {{-- <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            Guardado
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" class="btn btn-primary" wire:target="photo">
            Guardar
        </x-jet-button>
    </x-slot> --}}
</x-jet-form-section>

<div class="modal fade show" id="userAvatarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Editar foto de perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">

                @if (file_exists( public_path().'/imagenes/usuarios/'.Auth::user()->avatar ) && (Auth::user()->avatar != '') && (Auth::user()->avatar != 'default.jpg') && (Auth::user()->avatar != 'default.png'))
                    <img src="{{ asset('imagenes/usuarios/'.Auth::user()->avatar) }}" alt=""  class="profile-user-img img-responsive img-circle" id="avatar"><br />
                @else
                    <img src="{{ asset('images/users/default.png') }}" alt=""  class="profile-user-img img-responsive img-circle" id="avatar"><br />
                @endif

                {!! Form::open(['route' => 'members.update.my.avatar', 'method' => 'POST', 'class' => '', 'files' => 'true', 'id' => 'form']) !!}
					<div id="upload-demo"></div>
					<input type="hidden" id="imagebase64" name="imagebase64">
                    <input name="varimg" id="varimg" value="0" type="hidden">
                    <input type="file" id="upload" value="seleccionar una imagen" style="color: transparent">
                    <br>
                    <br>
					<button type="button" class="form_submit btn btn-style">Guardar</button>
				{!! Form::close() !!}



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="{{ asset('vendor/croppie/croppie.min.js') }}"></script>
    <script type="text/javascript">

        $('#userAvatarModal').on('shown.bs.modal', function () {
            changeAvatar();
        })

	$( document ).ready(function() {
        var $uploadCrop;
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    });
                    $('.upload-demo').addClass('ready');
                    $( "#varimg" ).val( "1" );
                }
                reader.readAsDataURL(input.files[0]);
            }
		}

		$uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 128,
                height: 128,
                type: 'round'
            },
            boundary: {
                width: 250,
                height: 250
            }
		});

        $('#upload').on('change', function () {
            readFile(this);
        });

        $('.form_submit').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: { width: 500, height: 500 }
            }).then(function (resp) {
                $('#imagebase64').val(resp);
                $('#form').submit();
            });
            return false;
        });
	});

	$( '#form' ).hide();

	function changeAvatar() {
		$('#form').show();
		$('#avatar').hide();
		$('#btnchangeAvatar').hide();
	}


</script>
@endsection
