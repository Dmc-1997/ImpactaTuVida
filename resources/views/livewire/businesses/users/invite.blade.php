<div>
    <div class="mb-4 d-flex">
        <input 
            class="form-control color-input-form" 
            type="text" 
            placeholder="Email a invitar separados por comas"
            wire:model="emails"
        >
        <button wire:click="invite" class="btn btn-theme">Invitar</button>
    </div>
</div>
