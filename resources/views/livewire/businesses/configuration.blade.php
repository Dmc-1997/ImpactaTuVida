<div class="container-fluid">
    <span class="configuration_style-title__4oIuj">Perfil de la empresa</span>
    <div class="Menu_container-submenu__8Bmns">
        <nav class="">
            <ul class="nav mb-3 mt-3">
                <li class="Menu_nav-item__1G1ac {{ $navsubmenu == 0 ? 'Menu_active__-0Z9R'  : '' }}">
                    <a href="javascript:;" class="Menu_style-nav__NbCaC" wire:click.debounce.500ms="setNav(0)">Perfil</a>
                </li>
                <li class="Menu_nav-item__1G1ac {{ $navsubmenu == 1 ? 'Menu_active__-0Z9R'  : '' }}">
                    <a href="javascript:;" class="Menu_style-nav__NbCaC" wire:click.debounce.500ms="setNav(1)">Personalización</a>
                </li>
                <li class="Menu_nav-item__1G1ac {{ $navsubmenu == 2 ? 'Menu_active__-0Z9R'  : '' }}">
                    <a href="javascript:;" class="Menu_style-nav__NbCaC" wire:click.debounce.500ms="setNav(2)">Estilos login</a>
                </li>
                <li class="Menu_nav-item__1G1ac {{ $navsubmenu == 3 ? 'Menu_active__-0Z9R'  : '' }}">
                    <a href="javascript:;" class="Menu_style-nav__NbCaC" wire:click.debounce.500ms="setNav(3)">Estilos Administracón</a>
                </li>
                <li class="Menu_nav-item__1G1ac {{ $navsubmenu == 4 ? 'Menu_active__-0Z9R'  : '' }}">
                    <a href="javascript:;" class="Menu_style-nav__NbCaC" wire:click.debounce.500ms="setNav(4)">Estilos Academia</a>
                </li>
            </ul>
        </nav>
    </div>
    
        @if ($navsubmenu == 0)
                            
            <div class="container-fluid p-4 mb-5 mt-4 configuration_box-container__h+pQv">
                <div class="row text-center">
                    <div class="col-5 configuration_grid-container__57BMU">
                        <label class="" for="nombre_empresa ">Nombre de la empresa <span class="configuration_style-asterik__vW+7W">*</span></label>
                        <label class="" for="nombre_encargadp">Nombre del encargado<span class="configuration_style-asterik__vW+7W">*</span></label>
                        <label class="" for="telefono_encargado">Cargo del encargado <span class="configuration_style-asterik__vW+7W">*</span></label>
                        <label class="" for="telefono_encargado">Email del encargado <span class="configuration_style-asterik__vW+7W">*</span></label>
                        <label class="" for="telefono_encargado">Telefono del encargado <span class="configuration_style-asterik__vW+7W">*</span></label>
                    </div>
                    <div class="col-7 grid-container">
                        <div><input wire:model="name" class="form-control mb-2 input-data-configuration @error('name') is-invalid @enderror" type="text" /></div>
                        <div><input wire:model="incharge_name" class="form-control mb-2 input-data-configuration @error('incharge_name') is-invalid @enderror" type="text" /></div>
                        <div><input wire:model="incharge_role" class="form-control mb-2 input-data-configuration @error('incharge_role') is-invalid @enderror" type="text" required /></div>
                        <div><input wire:model="incharge_email" class="form-control mb-2 input-data-configuration @error('incharge_email') is-invalid @enderror" type="text" /></div>
                        <div><input wire:model="incharge_phone" class="form-control mb-2 input-data-configuration @error('incharge_phone') is-invalid @enderror" type="text"/></div>
                    </div>
                    <div class="col-12 mt-3"><button type="submit" wire:click='saveInformation' style="width: 100%" class="btn-style btn-block">Actualizar</button></div>
                </div>
            </div>

            <livewire:members.profile.pwupdate></livewire:members.profile.pwupdate>
        @elseif ($navsubmenu == 1)
            <div class="container-fluid p-4 mb-5 text-center EditLogo_line-divider-boton__-tZco">
                <div class="row">
                    <div class="grid-containe"><span class="EditLogo_style-title-logos__WQ8vq">Logos e imágenes</span></div>
                </div>
                {!! Form::open([ 'route' => 'businesses.images', 'id' => 'form-personalization', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true, ]) !!}
                    <div class="row mt-3">
                        <div class="grid-containe">
                            <div><span>Editar logo</span></div>
                            <div class="mt-3">
                                @if (file_exists(public_path() . '/imagenes/logos/' . $logo) && $logo != '' && $logo != 'default.jpg')
                                    <img src="{{ asset('imagenes/logos/' . $logo) }}" id="img-perfil" class="EditLogo_style-img-perfil__gMJSB" />
                                @else
                                    <img
                                        class="EditLogo_style-img-perfil__gMJSB"
                                        src="data:image/png;base64,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"
                                        alt=""
                                        id="img-perfil"
                                    />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="grid-containe mt-3">
                            <div class="EditLogo_container-input__jjzaG">
                                <div>
                                    <input type="file" name="image" id="file" class="inputfile inputfile-4" data-multiple-caption="{count} archivos seleccionados" multiple="" />
                                    <label for="file-4"><span class="iborrainputfile iborrainputfile">Selecionar una imagen</span></label>
                                </div>
                            </div>
                            <span>Tamaño sugerido (1500px por 250px)</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            {!! Form::submit('Guardar', ['class' => 'btn-style']) !!}
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="0" name="id" />
                            <input type="hidden" value="{{ $team->id }}" name="team_id" />
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            
            <div class="p-4 mb-5 container-fluid personalization_box-container__Gpida">
                {!! Form::open([ 'route' => 'businesses.images', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true, ]) !!}
                    <div class="row">
                        <div class="mt-3 p-4 personalization_container-backgraund__08-h2">
                            <span class="mt-3">Editar imagen Background del login</span>
                            <div class="mt-4 d-flex personalization_image-upload-wrap__7Acpe">
                                @if (file_exists(public_path() . '/imagenes/bgs/' . $bg_image) && $bg_image != '' && $bg_image != 'default.jpg')
                                    <img src="{{ asset('imagenes/bgs/' . $bg_image) }}" class="" width="250px" />
                                @else
                                    <div><div class="container-DragAndDrop"></div></div>
                                @endif
                            </div>
                            <div></div>
                            <div class="d-flex col mt-3">
                                <img
                                    src="data:image/png;base64,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"
                                    alt="icon"
                                    class="personalization_icon-photo__W7T63"
                                />
                                <div class="d-flex">
                                    <div class="ms-3 personalization_container-upload-img__DNRdN">
                                        {{-- <span>Arrastra una imagen hasta aqui o</span> --}}
                                        <div>
                                            <input type="file" name="image" id="file" class="inputfile inputfile-4" />
                                            <label for="file-4"><span class="iborrainputfile ms-3">sube un archivo</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 personalization_container-bottom__TV6ha justify-contentcenter">
                            
                            <input type="hidden" value="1" name="id" />
                            <input type="hidden" value="{{ $team->id }}" name="team_id" />
                            <div class="col-6 mt-3 text-center">
                                {!! Form::submit('Guardar', ['class' => 'btn-style', "name" => 'btnSaveImg']) !!}
                            </div>
                            {{-- <div class="col-6 mt-3 text-center"><button type="button" class="btn-style" name="btnDeleteImg">Eliminar</button></div> --}}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            
            <div class="p-4 mb-5 container-fluid personalization_box-container__Gpida">
                <div class="row">
                    <div class="personalization_container-backgraund__08-h2">
                        <div class="row p-3"><label class="mb-2">Elige un color para el login</label>
                            <input type="color" id="favcolor" wire:model="bg_color" name="favcolor" class="personalization_input-select-color__EACCd @error('bg_color') is-invalid @enderror" value="#ffff" />
                        </div>
                        <div class="col-5 mt-3"></div>
                    </div>
                    <div class="mt-3 personalization_container-bottom__TV6ha justify-content-center">
                        <div class="col-6 mt-3 text-center"><button type="button" class="btn-style" wire:click="saveInformation">Guardar</button></div>
                        {{-- <div class="col-6 mt-3 text-center"><button type="button" class="btn-style" name="btnDeleteColor">Eliminar</button></div> --}}
                    </div>
                </div>
            </div>
        @elseif ($navsubmenu === 2)
            <div class="container-fluid p-2 mb-5 mt-4 styleLogin_box-container__fsKcn">
                <div class="row p-2">
                    <div class="styleLogin_container-textarea__b-c+U">
                        <textarea 
                            id="text-area"
                            class="form-control styleLogin_style-textarea__txi4W" 
                            aria-label="With textarea" 
                            placeholder="Crea tu codigo de estilos css"
                            disabled=""
                            wire:model="style_login"></textarea>
                        <button type="button" onclick="setDisableTexttarea()" id="btn-edit" class="btn-style styleLogin_editButton__GBNBs undefined btn-primary">Editar</button>
                    </div>
                    <div class="styleLogin_container-bottom__8SfbC">
                        <div class="col-5 mt-3 text-center"><button type="button" class="btn-style" wire:click='saveInformation' id="btn-save" disabled type="submit">Guardar</button></div>
                        <div class="col-5 mt-3 text-center"><button type="button" class="btn-style" name="btnDeleteColor" wire:click.debounce.500ms="setNav(2)">Cancelar</button></div>
                    </div>
                </div>
            </div>
        @elseif ($navsubmenu == 3)
            <div class="container-fluid p-2 mb-5 mt-4 styleLogin_box-container__fsKcn">
                <div class="row p-2">
                    <div class="styleLogin_container-textarea__b-c+U">
                        <textarea
                            id="text-area"
                            wire:model="style_admin" 
                            class="form-control styleLogin_style-textarea__txi4W @error('style_admin') is-invalid @enderror"
                            aria-label="With textarea" 
                            placeholder="Crea tu codigo de estilos css" disabled=""></textarea>
                        <button 
                            onclick="setDisableTexttarea()" 
                            id="btn-edit"
                            type="button" 
                            class="btn-style styleLogin_editButton__GBNBs btn-primary">Editar</button>
                    </div>
                    <div class="styleLogin_container-bottom__8SfbC">
                        <div class="col-5 mt-3 text-center"><button type="button" wire:click='saveInformation' id="btn-save" disabled class="btn-style">Guardar</button></div>
                        <div class="col-5 mt-3 text-center"><button type="button" class="btn-style" name="btnDeleteColor" wire:click.debounce.500ms="setNav(3)">Cancelar</button></div>
                    </div>
                </div>
            </div>
        @elseif ($navsubmenu == 4)
            <div class="container-fluid p-2 mb-5 mt-4 styleLogin_box-container__fsKcn">
                <div class="row p-2">
                    <div class="styleLogin_container-textarea__b-c+U">
                        <textarea 
                            id="text-area"
                            wire:model="style_academy"
                            class="form-control styleLogin_style-textarea__txi4W @error('style_academy') is-invalid @enderror" 
                            aria-label="With textarea" 
                            placeholder="Crea tu codigo de estilos css" 
                            disabled=""></textarea>
                        <button type="button" onclick="setDisableTexttarea()" id="btn-edit" class="btn-style styleLogin_editButton__GBNBs btn-primary">Editar</button>
                    </div>
                    <div class="styleLogin_container-bottom__8SfbC">
                        <div class="col-5 mt-3 text-center"><button type="button" class="btn-style" wire:click='saveInformation' id="btn-save">Guardar</button></div>
                        <div class="col-5 mt-3 text-center"><button type="button" class="btn-style" name="btnDeleteColor" wire:click.debounce.500ms="setNav(4)">Cancelar</button></div>
                    </div>
                </div>
            </div>
        @elseif ($navsubmenu == 5)
        @endif

        @if ($navsubmenu != 1)
            <script>
                $("#form-personalization").html("");
            </script>
        @endif
    {{-- </div> --}}
</div>
<script>
    function setDisableTexttarea(){
        $("#btn-edit").addClass("d-none");
        $("#btn-save").removeAttr("disabled");
        $("#text-area").removeAttr("disabled");
    }
</script>