<div>
    <div class="form-group">
        <label for="country_id">País:<span class="text-danger">*</span></label>
        <select class="form-control" wire:model="country_id" wire:click="findStates" name="country_id" >
            <option value="">Seleccione</option>
            @if (is_array($countries) || is_object($countries))
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                @endforeach
            @else
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="state_id">Estado / Departamento:<span class="text-danger">*</span></label>
        <select class="form-control" wire:model="state_id" wire:click="findCities" name="state_id">
            <option value="">Seleccione</option>
            @if (is_array($departments) || is_object($departments))
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                @endforeach
            @else
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="state_id">Ciudad:<span class="text-danger">*</span></label>
        <select class="form-control" wire:model="city_id" name="city_id">
            <option value="">Seleccione</option>
            @if (is_array($cities) || is_object($cities))
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                @endforeach
            @else
            @endif
        </select>
    </div>
</div>
