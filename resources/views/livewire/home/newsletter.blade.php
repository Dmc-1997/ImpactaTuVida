<div>
    <h6 class="text-white suscription-title">Suscribete para estar enterado</h6>
    @if(is_null($message) || $message == '')
        @if($allow)
            <input
                type="email"
                wire:model="email"
                class="form-control rounded-pill mb-2 @error('email') is-invalid @enderror"
                />
        @endif
    @else
        <span class="text-white">{{ $message }}</span>
    @endif
    <div class="row">
        <div class="col-8">
            <span class="text-white footer-terms">Acepto los términos y condiciones, el Aviso de pricacidad y la Politica de datos de navegación</span>
        </div>
        <div class="col-4">
            @if($allow)
                <button wire:click="save()" class="btn btn-suscription btn-block mt-2">
                    Enviar
                </button>
            @endif
        </div>
    </div>
</div>
