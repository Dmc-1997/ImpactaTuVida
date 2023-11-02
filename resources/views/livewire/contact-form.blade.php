<div>
    @if($message)
    <div class="alert alert-success" role="alert">
        Mensaje enviado
    </div>
    @endif

    <div>
        <input  
            name="name"
            wire:model='name'
            id="name"
            type="text"
            required
            class="class-basic mb-2 input-data-configuration @error('name') is-invalid @enderror"
            placeholder="Nombre Completo *"
        />
    </div>
    <div>
        <input 
            id="phone"
            name="phone"
            wire:model='phone'
            type="tel"
            required
            class="class-basic mb-2 input-data-configuration  @error('phone') is-invalid @enderror"
            placeholder="Número Teléfonico"
        />
    </div>
    <div>
        <input 
            name="email"
            id="email"
            wire:model='email'
            type="email"
            required
            class="class-basic mb-2 input-data-configuration @error('email') is-invalid @enderror"
            placeholder="Correo electrónico"
        />
    </div>
    <div class="row mb-4 mt-2 form-group">
        <div class="col justify-content-center">
            <div class="form-check">
                <input class="form-check-input Contactanos_check-color__gCMUH" type="checkbox" checked id="form2Example31" value="" />
                <label class="form-check-label Contactanos_color-text-check__0poqS" for="form2Example31"> Acepto los términos y condiciones, el Aviso de privacidad y la Política de datos de navegación</label>
            </div>
        </div>
    </div>
    <button type="button" class="btn-style mt-1" wire:click='submit'>Enviar</button>
</div>
