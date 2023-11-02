$(() => {

    $("#btn-hamburguer").on("click", function() {
        $menu = $("#container-menu-nav").hasClass("d-none");
        if($menu){
            $("#container-menu-nav").removeClass("d-none");
        }else{
            $("#container-menu-nav").addClass("d-none");
        }
    });
    
})