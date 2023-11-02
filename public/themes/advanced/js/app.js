/**
 * Javascript functions for Gerenciando V2020
 */
let menu = 0;
let body = document.body;
let hamburger = document.getElementById("hamburger");

if (hamburger !== null ) {
    document.getElementById("hamburger").addEventListener("click", function() {
        if(!menu) {
            body.classList.add("sidebar-open");
            hamburger.classList.add("is_active");
        } else {
            body.classList.remove("sidebar-open");
            hamburger.classList.remove("is_active");
        }
        menu = !menu;
    });
}

$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

//funcion general que agrega comas a los numeros
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function isNull(x) {
    if (x === null) {
        return "";
    }
    return x;
}

function showMessage(msg) {
    $("#snackbar").html(msg);
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

  /*======== 11. TOASTER ========*/
  var toaster = $('#toaster')
  function callToaster(positionClass) {
    toastr.options = {
      closeButton: true,
      debug: false,
      newestOnTop: false,
      progressBar: true,
      positionClass: positionClass,
      preventDuplicates: false,
      onclick: null,
      showDuration: "300",
      hideDuration: "1000",
      timeOut: "5000",
      extendedTimeOut: "1000",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut"
    };
  }

  if (toaster.length != 0) {

    if (document.dir != "rtl") {
      callToaster("toast-top-right");
    } else {
      callToaster("toast-top-left");
    }

  }

  /*======== 12. INFO BAR ========*/
  var infoTeoaset = $('#toaster-info, #toaster-success, #toaster-warning, #toaster-danger');
  if (infoTeoaset !== null){
    infoTeoaset.on('click', function () {
      toastr.options = {
        closeButton: true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "3000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      var thisId = $(this).attr('id');
      if ( thisId === 'toaster-info') {
        toastr.info("Gerenciando", " Info message");

      } else if ( thisId === 'toaster-success') {
        toastr.success("Gerenciando", "Success message");

      } else if ( thisId === 'toaster-warning') {
        toastr.warning("Gerenciando", "Warning message");

      } else if ( thisId === 'toaster-danger') {
        toastr.error("Gerenciando", "Danger message");
      }

    });
  }
