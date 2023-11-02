@extends('themes.advanced.admin', ['nav_active' => 1,
                            'title' =>  'Administración '
                        ])
@section('content')

<div class="mb-8 row">
    <div class="mb-4 col-lg-10 col-md-8 col-sm-8 col-xs-12">
        <strong class="style-title-actualice">Usuarios</strong>
        <p class="mb-0"></p>
    </div>
</div>


{{-- <div class="row">
    <div class="col-6">
        <a href="{{ route('businesses.users.import') }}" class="btn btn-theme">Importar</a>
    </div>
    <div class="col-6">

        <livewire:businesses.users.invite></livewire:businesses.users.invite>

    </div>
</div>  --}}


<livewire:businesses.users.table></livewire:businesses.users.table>
{{-- <livewire:admin.users.table></livewire:admin.users.table> --}}

@endsection
@section('js')
<script>
    $(document).ready(() => {
        var $viewCourses = localStorage.getItem("view-card-users") ?? 'table';
        if($viewCourses){
            if($viewCourses == 'card'){
                disabled("#card-users", "#table-users", "#btn-card-users", "#btn-table-users");
            }else{
                disabled("#table-users", "#card-users", "#btn-table-users", "#btn-card-users");
            }
        }else{
            disabled("#table-users", "#card-users", "#btn-table-users", "#btn-card-users");
        }

        function disabled($view, $removeView, $btnView, $btnRemove){
            // $type = $($removeView).hasClass("d-none");
            // $($removeView).removeAttr("style");
            // $($view).removeClass("d-none");
            // //$($btnView).attr("style", "color: var(--bs-indigo);");

            // if(!$type){
            //     $($removeView).addClass("d-none");
            // }
        }
    });
</script>
@endsection
