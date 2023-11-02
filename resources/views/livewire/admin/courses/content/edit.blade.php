<div class="row">
    <div class="col-md-12 pt-3">
        <div class="container-card">
            <div class="card box-container p-3" style="height: 100%;width:100%">
                <h4 class="style-title-actualice">Editar Módulo</h4>
                <label>Título Módulo / Duración</label>
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control color-input-form @error('chapter_name') is-invalid @enderror"
                        placeholder=""
                        wire:model="chapter_name"
                    >
                    <input
                        type="text"
                        class="form-control color-input-form @error('chapter_duration') is-invalid @enderror"
                        placeholder=""
                        wire:model="chapter_duration"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-style btn-outline-primary" type="button" wire:click="update">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
