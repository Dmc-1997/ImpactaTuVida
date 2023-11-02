<div class="container-fluid p-4 dashboard_styles-background__VCk1G">
    <strong>Tus datos</strong>
    
    <div class="row"> 
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Nombres</label>
                <input type="text" class="form-control input-data-configuration @error('name') is-invalid @enderror" wire:model="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Apellidos</label>
                <input type="text" class="form-control input-data-configuration @error('surname') is-invalid @enderror" wire:model="surname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control input-data-configuration @error('email') is-invalid @enderror" wire:model="email"
                    readonly>
            </div>
        </div>
    </div>
    <p><span><strong>Teléfono Móvil</strong></span></p>
    <div class="row">
        {{-- <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Código del País</label>
                <input type="text" class="form-control input-data-configuration @error('name') is-invalid @enderror" wire:model="name">
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Número de teléfono</label>
                <input type="text" class="form-control input-data-configuration @error('mobile') is-invalid @enderror" wire:model="mobile">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Edad</label>
                <input type="text" class="form-control input-data-configuration @error('age') is-invalid @enderror" wire:model="age">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Cargo</label>
                <input type="text" class="form-control input-data-configuration @error('position') is-invalid @enderror"
                    wire:model="position">
            </div>
        </div>
    </div>

    <button wire:click="update" class="btn btn-style btn-block" style="width: 100%">Actualizar</button>

</div>
