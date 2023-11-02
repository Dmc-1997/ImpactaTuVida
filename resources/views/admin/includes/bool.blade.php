<tr class="">
    <td class="">
        @if(isset($config->option))
            {{ $config->label }}
        @elseif(isset($config->variable))
            {{ $config->variable }}
        @endif
    </td>
    <td class="">
        {!! Form::select('config_'.$config->id, $setbool, $config->value,['class' => 'form-control', 'id' => 'config_'.$config->id]) !!}
    </td>
    <td class="">
        <span id="img_{{$config->id}}"></span>
        <a href="javascript:void(0);" class="btn btn-outline-primary mb-2" onclick="updateConfig({{$config->id}})" id="btn_{{$config->id}}">Actualizar</a>
    </td>
</tr>
