$("body").on("contextmenu", "img", function(e) {
    return false;
});
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#form_login").on('keydown', 'input', function (event) {
    if (event.which == 13) {
        event.preventDefault();
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-login'));
        var val = $($this).val();
        if(val == 1){
            $('[data-login="' + (index + 1).toString() + '"]').focus();
        }else{
            $('#tombol_login').trigger("click");
        }
    }
});
$("#email").focus();
var KTSigninGeneral = (function () {
    var e, t, i;
    return {
        init: function () {
            (e = document.querySelector("#form_login")),
                (t = document.querySelector("#tombol_login")),
                (i = FormValidation.formValidation(e, {
                    fields: {
                        email: { validators: { notEmpty: { message: "Email address is required" }, emailAddress: { message: "The value is not a valid email address" } } },
                        password: {
                            validators: {
                                notEmpty: { message: "The password is required" },
                                callback: {
                                    message: "Please enter valid password",
                                    callback: function (e) {
                                        if (e.value.length > 8) return _validatePassword();
                                    },
                                },
                            },
                        },
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                })),
                t.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            login_data = {
                                email: $("#email").val(),
                                password: $("#password").val()
                            };
                            if(i == "Valid"){
                                t.setAttribute("data-kt-indicator", "on"),(t.disabled = !0);
                                $.ajax({
                                    type: "POST",
                                    url: "auth/login",
                                    data: login_data,
                                    dataType: 'json',
                                    success: function (response) {
                                        if (response.alert=="success") {
                                            setTimeout(function () {
                                                t.removeAttribute("data-kt-indicator"),
                                                    (t.disabled = !1),
                                                    Swal.fire({ text: response.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(function (t) {
                                                        t.isConfirmed && (e.reset());
                                                    }).then(function() {
                                                        location.reload();
                                                    });
                                            }, 2e3);
                                        } else {
                                            setTimeout(function () {
                                                t.removeAttribute("data-kt-indicator"),
                                                    (t.disabled = !1),
                                                    Swal.fire({ text: response.message, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(function (t) {
                                                        // t.isConfirmed && (e.reset());
                                                    });
                                            }, 2e3);
                                        }
                                    }
                                });
                            }else{
                                t.removeAttribute("data-kt-indicator"),(t.disabled = !1);
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" },
                                });
                            }
                        });
                });
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});