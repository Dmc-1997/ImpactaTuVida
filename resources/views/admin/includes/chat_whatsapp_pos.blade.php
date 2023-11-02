<div class="form-row">
    <div class="form-group col-md-4 text-right">
        {{ $config->label }}
    </div>
    <div class="form-group col-md-4">
        {!! Form::select('config_'.$config->id, $whatsapp_pos, $config->id,['class' => 'form-control', 'id' => 'config_'.$config->id]) !!}


    </div>
    <div class="form-group col-md-2">
        <span id="img_{{$config->id}}"></span>
        <a href="javascript:void(0);" class="btn btn-primary mb-2" onclick="updateConfig({{$config->id}})" id="btn_{{$config->id}}">Actualizar</a>
    </div>
</div>