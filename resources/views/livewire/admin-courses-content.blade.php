<div>
    @include("livewire.$view")

    @foreach ($chapters as $chapter)

    <div class="row mt-4">
        <div class="col-12">
            <div class="container-fluid p-4 mb-5 EditCategories_box-container__29mrQ" style="height: 100%;width:100%">
                <div class=" d-flex justify-content-between">
                    <h3 class="col courses_title-style-curses-web__-RV8j">{{  $chapter->chapter_name }} -  {{  $chapter->duration }}</h3>
                    <div class="col" align="right">
                        <div class="btn-group" role="group" aria-label="">
                            <button class="btn btn-outline-success btn-sm" wire:click="decPosition({{ $chapter->id }})"> - </button>
                            <button class="btn btn-outline-success btn-sm" > Pos:{{  $chapter->position }} </button>
                            <button class="btn btn-outline-success btn-sm" wire:click="incPosition({{ $chapter->id }})"> + </button>
                        </div>
                        <div class="btn-group" role="group" aria-label="">
                            <button type="button" class="btn  btn-success btn-sm waves-effect waves-light" data-toggle="modal" data-target="#chapterClassModal" wire:click="createClass({{ $chapter->id }})">Clase</button>
                            @if($chapter->status)
                                <button class="btn-success btn-sm" wire:click="changeStatus({{ $chapter->id }})" > Activar </button>
                            @else
                                <button class="btn-danger btn-sm" wire:click="changeStatus({{ $chapter->id }})"> Inactivar </button>
                            @endif
                            <button class="btn btn-outline-success btn-sm" wire:click="edit({{ $chapter->id }})" title="Editar"> <i class="fa fa-edit"></i> </button>
                            <button class="btn-outline-danger  btn-sm" wire:click="delete({{ $chapter->id }})" title="Eliminar"> <i class="fa fa-trash"></i> </button>
                        </div>
                    </div>
                </div>
                <h4 class="courses_title-style-curses-web__-RV8j">Clases</h4>
                <div class="table-responsive-sm">
                    <table class="table">
                            <tr>
                                <td>#</td>
                                <td width="50%">Clase</td>
                                <td>Duración</td>
                                <td class="text-center">Destacado</td>
                                <td class="text-center">Posición</td>
                                <td class="text-center">Estado</td>
                                <td class="text-right">Acción</td>
                            </tr>
                            @foreach ($course_classes as $class)
                                @if ($chapter->id == $class->coursechapter_id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $class->title }}</td>
                                        <td>{{ $class->duration }}</td>
                                        <td class="text-center">
                                            @if($class->featured)
                                                <button class="btn btn-success btn-sm" wire:click="changeClassFeatured({{ $class->id }})"> Si </button>
                                            @else
                                                <button class="btn btn-danger btn-sm" wire:click="changeClassFeatured({{ $class->id }})"> No </button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($editPosition == $class->id)
                                                <div class="input-group mb-3">
                                                    <input type="number"
                                                        class="form-control color-input-form"
                                                        wire:model="position"
                                                        >
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="button" wire:click="updatePosition({{ $class->id}})">Guardar</button>
                                                    </div>
                                                </div>
                                            @else
                                                {{ $class->position }}
                                                <i class="fa fa-edit text-success" wire:click="editPosition({{ $class->id}})"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($class->status)
                                                <button class="btn btn-success btn-sm" wire:click="changeClassStatus({{ $class->id }})"> Activo </button>
                                            @else
                                                <button class="btn btn-danger btn-sm" wire:click="changeClassStatus({{ $class->id }})"> Desactivado </button>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group" role="group" aria-label="">
                                                <button type="button" class="btn  btn-outline-success btn-sm waves-effect waves-light" data-toggle="modal" data-target="#chapterClassModal" wire:click="editClass({{ $class->id }})" title="Editar"><i class="fa fa-edit"></i></button>
                                                <a href="javascript:void(0);" type="button" onclick="return confirmDestroyRow('adminClassDelete', {{ $class->id }})" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div wire:ignore.self id="chapterClassModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">{{ $item_id }} - {{ $coursechapter_name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Título de la clase:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('title') is-invalid @enderror"
                            placeholder=""
                            wire:model="title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Duración:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('duration') is-invalid @enderror"
                            placeholder=""
                            wire:model="duration">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tipo:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('type') is-invalid @enderror"
                            placeholder=""
                            wire:model="type">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">url:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('url') is-invalid @enderror"
                            placeholder=""
                            wire:model="url">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tamaño:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('size') is-invalid @enderror"
                            placeholder=""
                            wire:model="size">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Imagen:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('image') is-invalid @enderror"
                            placeholder=""
                            wire:model="image">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">video:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('video') is-invalid @enderror"
                            placeholder=""
                            wire:model="video">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">pdf:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('pdf') is-invalid @enderror"
                            placeholder=""
                            wire:model="pdf">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">zip:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('zip') is-invalid @enderror"
                            placeholder=""
                            wire:model="zip">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Video de presentación:</label>
                        <input
                            type="text"
                            class="form-control color-input-form @error('preview_video') is-invalid @enderror"
                            placeholder=""
                            wire:model="preview_video">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Fecha de presentación:</label>
                        <input
                            type="date"
                            class="form-control color-input-form @error('date_time') is-invalid @enderror"
                            placeholder=""
                            wire:model="date_time">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                    @if($isEditingClass)
                        <button type="button" class="btn btn-success waves-effect waves-light" wire:click="chapterClassUpdate">Guardar</button>
                    @else
                        <button type="button" class="btn btn-success waves-effect waves-light" wire:click="chapterClassStore">Guardar</button>
                    @endif


                </div>
            </div>

        </div>

    </div>

</div>
