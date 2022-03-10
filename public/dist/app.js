toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

const Toastr = {
    success: function (msg) {
        toastr["success"](msg, "Başarılı!")
    }, error: function (msg) {
        toastr["error"](msg, "Başarısız!")
    }, info: function (msg) {
        toastr["info"](msg, "Bilgi!")
    }, warning: function (msg) {
        toastr["warning"](msg, "Uyarı!")
    }
}

jQuery(document).ready(function () {
    jQuery("body").tooltip({selector: '[data-toggle=tooltip]'});
})
