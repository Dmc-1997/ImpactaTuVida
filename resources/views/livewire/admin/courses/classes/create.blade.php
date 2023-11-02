<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Crear Clase para {{ $chapter_name }}</h4>
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder=""
                        wire:model="title"
                    >
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" wire:click="storeClass">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>