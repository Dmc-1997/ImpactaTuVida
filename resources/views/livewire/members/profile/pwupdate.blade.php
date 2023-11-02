<div>
    <div class="container-fluid mb-4 configuration_container-actualice-contraseña__nhqII">
        <span class="mt-5 mb-3 configuration_style-title-actualice__T-Erv">Actualice su contraseña</span>
        <p class="configuration_style-title-pass__-FJRC">Asegure su cuenta con una contraseña fuerte</p>
    </div>

    <div class="row">
        <div class="container-fluid p-4 mb-5 mt-4 configuration_box-container__h+pQv">
          <input placeholder="Contraseña actual" class="form-control input-data-configuration mb-2 @error('current_password') is-invalid @enderror" type="password" wire:model="current_password"/>
          <input placeholder="Nueva contraseña" class="form-control input-data-configuration mb-2 @error('password') is-invalid @enderror"  type="password" wire:model="password"/>
          <input placeholder="Confirme contraseña" class="form-control input-data-configuration mb-2 @error('password_confirmation') is-invalid @enderror" type="password" wire:model="password_confirmation"/>
          <button wire:click="update" class="btn-style btn-block" style="width: 100%">Enviar</button>
        </div>
    </div>

</div>
