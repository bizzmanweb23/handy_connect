$(document).ready(function() {
    $( document ).ajaxComplete(function() {
        // Required for Bootstrap tooltips in DataTables
        $('[data-toggle="tooltip"]').tooltip({
            "html": true,
            "delay": {"show": 0, "hide": 0},
        });
    });

    $('.image_dropify').dropify();

    // $('.example').DataTable({
    //     "aaSorting": [],

    //     rowReorder: {
    //         selector: 'td:nth-child(2)'
    //     },
    //     //responsive: 'false',
    //     dom: "Bfrtip",
    //     buttons: [

    //         {
    //             extend: 'copyHtml5',
    //             text: '<i class="fas fa-file"></i>',
    //             titleAttr: 'Copy',
    //             title: $('.download_label').html(),
    //             exportOptions: {
    //                 columns: ':visible'
    //             }
    //         },

    //         {
    //             extend: 'excelHtml5',
    //             text: '<i class="fa fa-file-excel"></i>',
    //             titleAttr: 'Excel',

    //             title: $('.download_label').html(),
    //             exportOptions: {
    //                 columns: ':visible'
    //             }
    //         },

    //         {
    //             extend: 'csvHtml5',
    //             text: '<i class="fa fa-file-text"></i>',
    //             titleAttr: 'CSV',
    //             title: $('.download_label').html(),
    //             exportOptions: {
    //                 columns: ':visible'
    //             }
    //         },

    //         {
    //             extend: 'pdfHtml5',
    //             text: '<i class="fa fa-file-pdf"></i>',
    //             titleAttr: 'PDF',
    //             title: $('.download_label').html(),
    //             exportOptions: {
    //                 columns: ':visible'

    //             }
    //         },

    //         {
    //             extend: 'print',
    //             text: '<i class="fa fa-print"></i>',
    //             titleAttr: 'Print',
    //             title: $('.download_label').html(),
    //             customize: function(win) {
    //                 $(win.document.body)
    //                     .css('font-size', '10pt');

    //                 $(win.document.body).find('table')
    //                     .addClass('compact')
    //                     .css('font-size', 'inherit');
    //             },
    //             exportOptions: {
    //                 columns: ':visible'
    //             }
    //         },

    //         {
    //             extend: 'colvis',
    //             text: '<i class="fa fa-columns"></i>',
    //             titleAttr: 'Columns',
    //             title: $('.download_label').html(),
    //             postfixButtons: ['colvisRestore']
    //         },
    //     ],

    // });


    
});

toastr.options = {
    "closeButton": true, // true/false
    "debug": false, // true/false
    "newestOnTop": false, // true/false
    "progressBar": false, // true/false
    "positionClass": "toast-top-right", // toast-top-right / toast-top-left / 
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "5000", // in milliseconds
    "hideDuration": "5000", // in milliseconds
    "timeOut": "5000", // in milliseconds
    "extendedTimeOut": "10000", // in milliseconds
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

function errorMsg(msg) {
    // toastr.remove();
    toastr.error(msg);
}

function successMsg(msg) {
    // toastr.remove();
    toastr.success(msg);
}


function show_when_ajax_call(btn, form_id) {
    $(btn).text("Processing...");
    $(btn).prop("disabled", true);
    $(`#${form_id} :input`).prop('disabled', true);
}

function remove_after_ajax_call(btn, form_id, btn_name = 'Save') {
    $(btn).text(btn_name);
    $(btn).prop("disabled", false);
    $(`#${form_id} :input`).prop('disabled', false);
    if(form_id!=null){
        $('#' + form_id)[0].reset();
    }
}

function show_errors_when_ajax_call(btn, form_id, error, btn_name = 'Save') {
    $(btn).text(btn_name);
    $(btn).prop("disabled", false);
    $(`#${form_id} :input`).prop('disabled', false);
    if (error.status == 422) {
        var err = error.responseJSON.errors;
        var message = "";
        $.each(err, function(index, value) {
            message += value + '<br>';
        });
        errorMsg(message)
    }
    if (error.status == 401) {
        errorMsg('Please Login ');
    }
}

function open_modal(modal_id, form_name = null) {
    $('#' + modal_id).modal('show');
    if (form_name != null)
        $('#'+form_name)[0].reset();
}

function close_modal(modal_id){
    $('#' + modal_id).modal('hide');
}


function open_delete_modal(id) {
    $('#main_delete_modal').modal('show');
    $("#main_delete_link").attr("href", id);
}

function delete_modal_selected_data(url,id,token) {
    $.ajax({
        url: url,
        type: "post",
        dataType: 'json',
        data: {
            "_token": token,
            id: id
        },
        beforeSend:function(){
            $('#main_loader').show();
        },
        success: function(data) {
            close_modal("main_delete_modal");
            if (data.status) {
                successMsg(data.message)
            }
            $('#main_loader').hide();
        },
        error: function(error) {
            console.log(error)
            $('#main_loader').hide();
            if (error.status == 403) {
                var err = error.responseJSON.message;
                errorMsg(err);
            }
        }
    })
}