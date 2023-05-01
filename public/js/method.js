$("body").on("contextmenu", "img", function(e) {
    return false;
});
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
        event.preventDefault();
        load_list(1);
        }
    });
});
let page;
function main_content(cont){
    $('#content_list').hide();
    $('#content_input').hide();
    $('#content_detail').hide();
    $('#' + cont).show();
}
$(window).on('hashchange', function(){
    if (window.location.hash) {
        page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            load_list(page);
        }
    }
});
$(document).ready(function(){
    $(document).on('click', '.paginasi',function(event){
        event.preventDefault();
        $('.paginasi').removeClass('active');
        $(this).parent('.paginasi').addClass('active');
        // var myurl = $(this).attr('href');
        page = $(this).attr('halaman').split('page=')[1];
        load_list(page);
    });
});
function load_list(page){
    // loading();
    $.get('?page=' + page, $('#content_filter').serialize(), function(result){
        $('#list_result').html(result);
        main_content('content_list');
        // loaded();
    }, "html");
}
function load_input(url){
    // loading();
    $.get(url, {}, function(result) {
        $('#content_input').html(result);
        main_content('content_input');
        // loaded();
    }, "html");
}
function load_detail(url){
    // loading();
    $.get(url, {}, function(result) {
        $('#content_detail').html(result);
        main_content('content_detail');
        // loaded();
    }, "html");
}
function handle_confirm(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Confirmation',
        content: 'Are you sure want to confirm this data ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'No|5000',
        buttons: {
            Yes: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"PATCH",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                load_list(1);
                            }else{
                                error_toastr(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            No: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}

function handle_check(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Konfirmasi',
        content: 'Apakah anda ingin assign user ini sebagai penilai ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'No|5000',
        buttons: {
            Ya: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"POST",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                load_list(1);
                            }else{
                                error_toastr(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            Tidak: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}

function handle_delete(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Delete Confirmation',
        content: 'Are you sure want to delete this data ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'No|5000',
        buttons: {
            Yes: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"DELETE",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_toastr(response.message);
                                load_list(1);
                                load_cart(localStorage.getItem("route_cart"));
                            }else{
                                error_toastr(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            No: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}
function handle_get(url){
    $.get(url, {}, function(response) {
        if(response.alert == "success"){
            success_toastr(response.message);
        }else{
            info_toastr(response.message);
        }
    }, "json");
}
function handle_save(tombol, form, url, method, title){
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Please wait");
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function() {
            
        },
        success: function (response) {
            if (response.alert=="success") {
                success_toastr(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                        main_content('content_list');
                        load_list(1);
                }, 2000);
            } else {
                error_toastr(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html(title);
                }, 2000);
            }
        },
    });
}
function handle_upload(tombol,form,url,method, title){
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).prop("disabled", true);
        $(tombol).html("Please Wait");
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
            
            },
            success: function (response) {
                if (response.alert=="success") {
                    success_toastr(response.message);
                    $(form)[0].reset();
                    setTimeout(function () {
                        if(response.redirect){
                            location.href = response.redirect;
                        }
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                        if(response.callback){
                            location.href = response.callback;
                        }
                        main_content('content_list');
                        load_list(1);
                    }, 2000);
                } else {
                    error_toastr(response.message);
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html(title);
                    }, 2000);
                }
            },
        });
        return false;
    });
}