<div>
    <div class="row">
        <div class="col-md-4">
            <label for="country_id">País:</label>
            <select class="form-control @error('user_country_id') is-invalid @enderror" wire:model="user_country_id" wire:click="findStates">
                <option value="">Seleccione</option>
                @if (is_array($countries) || is_object($countries))
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country }}</option>
                    @endforeach
                @else
                @endif
            </select>
        </div>

        <div class="col-md-4">
            <label for="state_id">Estado / Departamento:</label>
            <select class="form-control @error('user_state_id') is-invalid @enderror" wire:model="user_state_id" wire:click="findCities">
                <option value="">Seleccione</option>
                @if (is_array($departments) || is_object($departments))
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department }}</option>
                    @endforeach
                @else
                @endif
            </select>
        </div>

        <div class="col-md-4">
            <label for="state_id">Ciudad:</label>
            <select class="form-control @error('user_city_id') is-invalid @enderror" wire:model="user_city_id">
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
    <br>

</div>