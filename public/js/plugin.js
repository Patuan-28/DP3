function loading(obj){
    // 
}
function loaded(obj){
    // 
}
function success_toastr(msg) {
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.success(msg);
}

function error_toastr(msg) {
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.warning(msg);
}
function info_toastr(msg) {
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.info(msg);
}
function obj_datepicker(obj) {
	$(obj).flatpickr();
}
function obj_mindatetimepicker(obj) {
	$(obj).flatpickr({
        minDate:new Date().fp_incr(1),
        enableTime: true,
        time_24hr: true
    });
}
function time_picker(obj,start){
	$(obj).flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        minTime: start,
        maxTime: "23:59",
    });
}
function date_end(obj){
	$(obj).flatpickr({
		maxDate: "today",
		dateFormat: "Y-m-d",
	});
}
function summernote(obj) {
	$('#' + obj).summernote();
}
function auto_size(obj) {
	var obj = $('#' + obj);
	autosize(obj);
	autosize.update(obj);
}
function select2(obj) {
	$('#' + obj).select2({
		width: '100%',
		// theme: "classic",
		placeholder: 'Choose ' + obj,
		language: {
			noResults: function () {
				return 'No Data';
			},
		}
	});
}
function thousand(nStr) {
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function ribuan(obj) {
	$('#' + obj).keyup(function (event) {
		if (event.which >= 37 && event.which <= 40) return;
		// format number
		$(this).val(function (index, value) {
			return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
		var id = $(this).data("id-selector");
		var classs = $(this).data("class-selector");
		var value = $(this).val();
		var noCommas = value.replace(/,/g, "");
		$('#' + id).val(noCommas);
		$('.' + classs).val(noCommas);
	});
}
function dots(obj) {
	$('#' + obj).keyup(function (event) {
		if (event.which >= 37 && event.which <= 40) return;
		// format number
		$(this).val(function (index, value) {
			return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		});
		var id = $(this).data("id-selector");
		var classs = $(this).data("class-selector");
		var value = $(this).val();
		var noCommas = value.replace(/,/g, "");
		$('#' + id).val(noCommas);
		$('.' + classs).val(noCommas);
	});
}
function image_uploader(obj) {
	let avatar = new KTImageInput(obj);
}
function print_div(div_name) {
	let print_content = document.getElementById(div_name).innerHTML;
	let original_content = document.body.innerHTML;

	document.body.innerHTML = print_content;

	window.print();

	document.body.innerHTML = original_content;
}
function text_only(obj) {
    $('#' + obj).bind('keypress', function (event) {
        var regex = new RegExp("^[A-Z a-z]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}

function username(obj) {
    $('#' + obj).bind('keypress', function (event) {
        var regex = new RegExp("^[A-Za-z0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}

function number_only(obj) {
    $('#' + obj).bind('keypress', function (event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}

function format_email(obj) {
    $('#' + obj).bind('keypress', function (event) {
        var regex = new RegExp("^[A-Za-z0-9@_.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}
