<div>
    <div class="d-flex justify-content-between">
        <input
            type="text"
            class="form-control @error('chapter_name') is-invalid @enderror"
            placeholder=""
            wire:model="chapter_name"
        >
        <button class="btn-outline-primary btn-sm" wire:click="update"> Guardar </button>
    </div>
</div>