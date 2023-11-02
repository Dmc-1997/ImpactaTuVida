$(() => {

    $("#btn-hamburguer").on("click", function() {
        $menu = $("#container-menu-nav").hasClass("d-none");
        if($menu){
            $("#container-menu-nav").removeClass("d-none");
        }else{
            $("#container-menu-nav").addClass("d-none");
        }
    });
    
    $("#btn-course-table").on("click", function(){
        disabledItem("table", "#course-table", "#course-card", "#btn-course-table", "#btn-course-card");
    });

    $("#btn-course-card").on("click", function(){
        disabledItem("card", "#course-card", "#course-table", "#btn-course-card", "#btn-course-table");
    });

    $("#btn-card-users").on("click", function(){
        disabledItemTbUsers("card", "#card-users", "#table-users", "#btn-card-users", "#btn-table-users");
    });

    $("#btn-table-users").on("click", function(){
        disabledItemTbUsers("table", "#table-users", "#card-users", "#btn-table-users", "#btn-card-users");
    });

    function disabledItem($type, $view, $viewRemove, $btnView, $btnRemove){
        localStorage.setItem("view-card", $type);
        $table = $($viewRemove).hasClass("d-none");
        $($btnRemove).removeAttr("style");

        $($view).removeClass("d-none");
        //$($btnView).attr("style", "color: var(--bs-indigo);");

        if(!$table){
            $($viewRemove).addClass("d-none");
        }
    }

    function disabledItemTbUsers($type, $view, $viewRemove, $btnView, $btnRemove){
        localStorage.setItem("view-card-users", $type);
        $table = $($viewRemove).hasClass("d-none");
        $($btnRemove).removeAttr("style");

        $($view).removeClass("d-none");
        //$($btnView).attr("style", "color: var(--bs-indigo);");

        if(!$table){
            $($viewRemove).addClass("d-none");
        }
    }
})