<div>
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group mb-4"> 
                <li class="list-group-item @if($group == 1) active @endif" wire:click='selectGroup(1)'>General</li>
                <li class="list-group-item @if($group == 2) active @endif" wire:click='selectGroup(2)'>Eventos</li>
                <li class="list-group-item @if($group == 3) active @endif" wire:click='selectGroup(3)'>Stripe</li>
                <li class="list-group-item @if($group == 4) active @endif" wire:click='selectGroup(4)'>Paypal</li>
                <li class="list-group-item @if($group == 5) active @endif" wire:click='selectGroup(5)'>Epayco</li>
                <li class="list-group-item @if($group == 7) active @endif" wire:click='selectGroup(7)'>Certificaciones</li>


                <li class="list-group-item @if($group == 8) active @endif" wire:click='selectGroup(8)'>Estilos Home</li>
                <li class="list-group-item @if($group == 9) active @endif" wire:click='selectGroup(9)'>Estilos Login</li>
                <li class="list-group-item @if($group == 10) active @endif" wire:click='selectGroup(10)'>Estilos Academia</li>
                <li class="list-group-item @if($group == 11) active @endif" wire:click='selectGroup(11)'>Estilos Admin</li>

                <li class="list-group-item @if($group == 12) active @endif" wire:click='selectGroup(12)'>Head Home</li>
                <li class="list-group-item @if($group == 13) active @endif" wire:click='selectGroup(13)'>Head Login</li>
                <li class="list-group-item @if($group == 14) active @endif" wire:click='selectGroup(14)'>Head Academia</li>
                <li class="list-group-item @if($group == 15) active @endif" wire:click='selectGroup(15)'>Head Admin</li>

                {{-- <li class="list-group-item @if($group == 11) active @endif" wire:click='selectGroup(11)'>Barra Cuenta regresiva</li> --}}
                <li class="list-group-item @if($group == 16) active @endif" wire:click='selectGroup(16)'>Logos</li>
                <li class="list-group-item @if($group == 17) active @endif" wire:click='selectGroup(17)'>Inicio</li>
                <li class="list-group-item @if($group == 0) active @endif" wire:click='selectGroup(0)'>Otros</li>


            </ul>
            <button class="btn btn-style" wire:click="loadStarter()">Cargar</button>
            {{ $group }}
        </div>
        <div class="col-md-9">
            <div class="container-fluid p-4 mb-5 EditCategories_box-container__29mrQ">
                    <strong class="style-title-actualice">Configuraciones</strong>
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th scope="col" class="text-center">id</th>
                                <th scope="col" class="text-left">Opción</th>
                                <th scope="col" class="text-left">Variable</th>
                                <th scope="col" class="text-center">Valor</th>
                            </tr>
                            @foreach ($storeconfigs as $mysetting)
                                @if ($group == $mysetting->group)
                                <tr>
                                    <td>{{ $mysetting->id }}</td>
                                    <td>{{ $mysetting->label }}</td>
                                    <td>
                                        @if ($isEditing == $mysetting->id)


                                        @else
                                            <button class="form-control btn-style" wire:click="edit({{ $mysetting->id }})"> Editar </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($isEditing == $mysetting->id)
                                            @if ($mysetting->type == 'textarea')
                                                <textarea
                                                    class="form-control @error('value') is_invalid @enderror"
                                                    rows=20
                                                    type="text"
                                                    placeholder=""
                                                    wire:model="value"
                                                ></textarea>
                                            @elseif ($mysetting->type == 'datetime')
                                                <input
                                                    class="form-control @error('value') is_invalid @enderror"
                                                    type="dateTime-local"
                                                    placeholder=""
                                                    wire:model="value"
                                                >
                                            @else
                                                <input
                                                    class="form-control @error('value') is_invalid @enderror"
                                                    type="text"
                                                    placeholder=""
                                                    wire:model="value"
                                                >
                                            @endif
                                            @if ($isEditing == $mysetting->id)
                                                <div class="mt-3 personalization_container-bottom__TV6ha">
                                                    <div class="col-6 mt-3 text-center">
                                                        <button type="button" wire:click="update" class="btn-style" name="btnSaveImg">Guardar</button>
                                                    </div>
                                                    <div class="col-6 mt-3 text-center">
                                                        <button type="button" wire:click="default" class="btn-style" name="btnDeleteImg">Cancelar</button>
                                                    </div>
                                                </div>
                                            @else

                                            @endif
                                        @else
                                            {{$mysetting->value}}
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
