<div class="row">
    <div class="col-md-12 pt-3">
        <div class="container-card">
            <div class="container-fluid p-4 mb-5 EditCategories_box-container__29mrQ" style="height: 100%;width:100%">
                <strong class="style-title-actualice">Crear Módulo</strong>
                <label>Título Módulo / Duración</label>
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control input-data-configuration @error('chapter_name') is-invalid @enderror"
                        placeholder="XXX módulo"
                        wire:model="chapter_name"
                    >
                    <input
                        type="text"
                        class="form-control input-data-configuration @error('chapter_duration') is-invalid @enderror"
                        placeholder="x hrs xx min"
                        wire:model="chapter_duration"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-style btn-outline-primary" style="width: 100%" type="button" wire:click="store">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
