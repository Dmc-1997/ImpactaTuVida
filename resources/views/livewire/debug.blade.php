<div>
    @if(auth()->user()->role == 'superadmin')
        @if($value)
            <a href="javascript:void(0);" class="menu-item bg-danger" wire:click="toggle">
                <i class="fa fa-fw fa-wrench ml-4 text-white"></i>
                <span class="ml-3 menu-text text-white">Debug Activado</span>
            </a>
        @else
            <a href="javascript:void(0);" class="menu-item bg-success" wire:click="toggle">
                <i class="fa fa-fw fa-wrench ml-4 text-white"></i>
                <span class="ml-3 menu-text text-white">Debug Desactivado</span>
            </a>
        @endif
    @endif
</div>
