$(function () {


    $('#add-modal').on('hidden.bs.modal', function () {
        $(this).children('modal-body').html("");
    });


    $(document).on("click", "a.hide-modal", function (e) {

        e.preventDefault();
        //$('#add-modal').removeData('bs.modal');
        $("#add-modal").modal('hide');
    });

    $(document).on("click", "#add-nguoi-button", function (e) {
        e.preventDefault();
        var link = "/admin/staffs/add/DocumentVbDenNguoiNhan";
        $.get(link, function (rp) {
            var title = "Thêm người nhận văn bản";
            $.createModal({
                title: title,
                message: rp,
                closeButton: true,
                scrollable: false
            });
            return false;
        });

        /*
         var _this = $(this);
         $('#add-modal').removeData('bs.modal');
         $('#add-modal').modal({remote: "<?php echo BASE_URL ?>/admin/staffs/add/DocumentVbDenNguoiNhan"});
         $('#add-modal').modal('show');
         */
    });


    $(document).on("click", "#add-category-button", function (e) {
        e.preventDefault();
        var _this = $(this);
        $('#add-modal').removeData('bs.modal');
        $('#add-modal').modal({remote: "<?php echo BASE_URL ?>/admin/categories/add"});
        $('#add-modal').modal('show');
    });


    $(document).on("click", "#add-noi-gui-button", function (e) {
        e.preventDefault();
        var _this = $(this);
        $('#add-modal').removeData('bs.modal');
        $('#add-modal').modal({remote: "<?php echo BASE_URL ?>/admin/departments/add"});
        $('#add-modal').modal('show');
    });


    $(document).on("click", "a.hide-modal", function (e) {

        e.preventDefault();
        $("#add-modal").modal('hide').data('bs.modal', null);
        ;
    });
    //datepicker plugin
    //link
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    })
            //show datepicker when clicking on the icon
            .next().on(ace.click_event, function () {
        $(this).prev().focus();
    });

    $("#DocumentVbDenNoiGui").select2();
    $("#DocumentVbDenNguoiNhan").select2();






});

$(document).on("submit", "#StaffAdminAddForm", function (e) {
    e.preventDefault();
    var _this = $(this), data = _this.serialize();

    _loadingDiv.show();
    $.post(_this.attr('action'), data, function (rs) {

        if (rs.success) {

            $("#error-log").hide();
            //$('#add-modal').removeData('bs.modal');
            $('#myModal').modal('hide');

            $("#" + rs.update_field).prepend(new Option(rs.name, rs.id));
            $("#" + rs.update_field).val(rs.id).trigger("change");

        } else {
            onError(rs);
            _loadingDiv.hide();
        }
    }, 'json');
});

var _loadingDiv = $("#loadingDiv");



$(document).on("click", ".hide-modal", function (e) {
    e.preventDefault();
    $('#myModal').modal('hide');
});



function onError(data) {
    $("#error-log").show();
    $.each(data.msg, function (model, errors) {
        _loadingDiv.hide();
        $("#error-log").append(errors + "<br>");

    });

}