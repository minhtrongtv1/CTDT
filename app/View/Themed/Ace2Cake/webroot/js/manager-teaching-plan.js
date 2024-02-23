var session = $("#TeachingPlanFilterSession").val();
var teacher_id = $("#TeachingPlanFilterTeacherId").val();
var department_id = $("#TeachingPlanFilterDepartmentId").val();
var teachingPlanSource = '/knm/teaching_plans/managerindex?session=' + session + '&teacher_id=' + teacher_id + '&department_id=' + department_id;
jQuery(function ($) {
    /*Hàm kiểm tra người dùng có thể cập nhật lịch dạy được không*/
    function checkPlanEditable(start) {
        var conditions = moment(start);
        conditions.date(15);
        conditions.add(-2, 'months');
        $now = moment();
        if (moment($now.format('YYYY-MM-DD')).isAfter(conditions.format('YYYY-MM-DD'))) {
            //bootbox.alert('Rất tiếc, đã hết hạn cập nhật đăng ký dạy kỹ năng mềm của tháng ' + start.format('MM/YYYY'));
            //return false;
        }
        var lastdateofweek = moment(start);
        lastdateofweek.date(7);
        /*Chỉ cần cập nhật tuần đầu tiên trong tháng
         if (moment(start.format('YYYY-MM-DD')).isAfter(lastdateofweek.format('YYYY-MM-DD'))) {
         bootbox.alert('Bạn chỉ cần cập nhật tuần đầu tiên của tháng.' + start.format('MM/YYYY'));
         return false;
         }
         */
        //Kiem tra co lot vao ngay le hay ko
        var NGAYLE = getNgayLe(start.year());
        for (i = 0; i < NGAYLE.length; i++) {
            //Buoi 1
            if (moment(NGAYLE[i].ngay.format('YYYY-MM-DD')).isSame(start.format('YYYY-MM-DD'))) {
                bootbox.alert('Ngày ' + start.format('DD/MM/YYYY') + ' là ngày ' + NGAYLE[i].ten);
                return false;
            }
            //Buoi 2
            var buoi2 = moment(start);
            buoi2.add(7, 'day');
            if (moment(NGAYLE[i].ngay.format('YYYY-MM-DD')).isSame(buoi2.format('YYYY-MM-DD'))) {
                bootbox.alert('Buổi 2, Ngày ' + buoi2.format('DD/MM/YYYY') + ' là ngày ' + NGAYLE[i].ten);
                return false;
            } else {

                if (!moment(start.format('YYYY-MM-DD')).isSame(buoi2.format('YYYY-MM-DD'), 'month')) {
                    //bootbox.alert('Buổi 2, Ngày ' + buoi2.format('DD/MM/YYYY') + ' không cùng tháng buổi 1 ngày ' + start.format('DD/MM/YYYY'));
                    //return false;
                }
            }

        }
        return true;
    }
    function checkDeleteAble(start) {
        var conditions = moment(start);
        conditions.date(15);
        conditions.add(-2, 'months');
        $now = moment();
        if (moment($now.format('YYYY-MM-DD')).isAfter(conditions.format('YYYY-MM-DD'))) {
            //bootbox.alert('Rất tiếc, đã hết hạn cập nhật đăng ký dạy kỹ năng mềm của tháng ' + start.format('MM/YYYY'));
            //return false;
        }
        return true;
    }

    /* initialize the calendar
     -----------------------------------------------------------------*/

    function GetCalendarDateRange() {
        var start = $('#calendar').fullCalendar('getView').start
        var end = $('#calendar').fullCalendar('getView').end
        var dates = {start: start, end: end};
        return dates;
    }
    var date = new Date();

    var calendar = $('#calendar').fullCalendar({//isRTL: true,
        events: {
            url: teachingPlanSource,
 
            cache: true
        },
        lazyFetching: true,
        eventRender: function (event, element) {
            $(element).find(".fc-time").remove();
        },
        dayRender: function (date, cell) {


        }
        ,
        buttonHtml: {
            prev: '<i class="ace-icon fa fa-chevron-left"></i>',
            next: '<i class="ace-icon fa fa-chevron-right"></i>'}
        ,
        header: {left: 'prev,next today',
            center: 'title',
            //right: 'month,agendaWeek,agendaDay'
        },
        //defaultView: 'basicWeek',
        editable: true,
        //droppable: true,
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var dateevent = $('#calendar').fullCalendar('clientEvents', function (event) {
                if (moment(event.start.format('YYYY-MM-DD')).isSame(start.format('YYYY-MM-DD')))
                    return true;
                else
                    return false;
            });
            /*
             if (dateevent.length > 1) {
             bootbox.alert("Đã đăng ký đủ 2 buổi cho ngày " + start.format('DD/MM/YYYY'));
             return false;
             }*/
            if (checkPlanEditable(start)) {
                var teacher_id = $("#TeachingPlanFilterTeacherId").val();
                if (teacher_id) {
                    console.log(teacher_id);
                    $("#TeachingPlanTeacherId").val(teacher_id);

                } else {
                    $("#TeachingPlanTeacherId").val("");
                }

                bootbox
                        .dialog({
                            title: 'Thêm giảng viên dạy ngày ' + start.format('DD/MM/YYYY') + ' và buổi ?',
                            message: $('#addplanform'),
                            show: false // We will show it manually later
                        })
                        .on('shown.bs.modal', function () {

                            $('#addplanform')
                                    .show()                                 // Show the login form
                                    .bootstrapValidator('resetForm', true); // Reset form
                        })
                        .on('hide.bs.modal', function (e) {                                 // Bootbox will remove the modal (including the body which contains the login form)
                            // after hiding the modal
                            // Therefor, we need to backup the form
                            $('#addplanform').hide().appendTo('body');
                        }).on('success.form.bv', function (e) {                         // Prevent form submission
                    e.preventDefault();
                    var $form = $(e.target), // The form instance
                            bv = $form.data('bootstrapValidator');   // BootstrapValidator instance

                    // Use Ajax to submit form data

                    var stDate = moment(start).format('YYYY-MM-DD');
                    $.post($form.attr('action'), $form.serialize() + '&start=' + stDate, function (result) {
                        if (!result.success) {
                            bootbox.alert(result.message);
                            return false;
                        } else {                                 // ... Process the result ...
                            $('#calendar').fullCalendar('refetchEvents');
                            // Hide the modal containing the form
                            $form.parents('.bootbox').modal('hide');
                        }

                    }, 'json');
                })
                        .modal('show');
                $('#calendar').fullCalendar('unselect');
            }
        }
        ,
        eventClick: function (calEvent, jsEvent, view) {
            if (calEvent.name == 2) {
                alert('Bạn vui lòng chọn buổi 01 để xóa nhé. Xin cảm ơn!');
                return;
            }
            if (checkDeleteAble(calEvent.start)) {
                bootbox.confirm("Bạn chắc xóa " + calEvent.title + ', ' + calEvent.start.format('dddd') + ' ngày ' + (calEvent.start.format('DD/MM/YYYY')) + ' không ?', function (result) {
                    if (result) {
                        $.post("/knm/manager/teaching_plans/delete/" + calEvent.id, function (result) {
                            if (!result.success) {
                                bootbox.alert(result.message);
                            } else {                                     // ... Process the result ...
                                //$('#calendar').fullCalendar('removeEvents', calEvent.id);
                                $('#calendar').fullCalendar('refetchEvents');
// Hide the modal containing the form
                            }

                        }, 'json');
                    } else {                             //alert('Thôi');
                    }
                });
            }

        }

    });
    /*Buổi*/
    $("#TeachingPlanFilterSession").on("change", function () {
        reloadTeachingPlan();
    });


    /*Giảng viên*/
    $("#TeachingPlanFilterTeacherId").on("change", function () {
        reloadTeachingPlan();
    });
    //$('#calendar').fullCalendar('next');
    //$('#calendar').fullCalendar('next');
});
function reloadTeachingPlan() {
    var newTeachingPlanSource = '/knm/teaching_plans/managerindex?session=' + $("#TeachingPlanFilterSession").val() + '&teacher_id=' + $("#TeachingPlanFilterTeacherId").val() + '&department_id=' + $("#TeachingPlanFilterDepartmentId").val();
    $('#calendar').fullCalendar('removeEventSource', teachingPlanSource);
    $('#calendar').fullCalendar('refetchEvents');
    $('#calendar').fullCalendar('addEventSource', newTeachingPlanSource);

    teachingPlanSource = newTeachingPlanSource;
}

/*Xu ly khi thay doi lua chon department box*/
$('#TeachingPlanFilterDepartmentId').change(function () {

    //reloadTeachingPlan();
    $.when(reloadTeachingPlan()).done(function () {
        var department_id = $('#TeachingPlanFilterDepartmentId option:selected').val();
        loadTeacher(department_id);
    });


});

function loadTeacher($department_id) {
    $("#TeachingPlanFilterTeacherId").empty();
    var url = "/knm/usermgmt/users/getTeachers/" + $department_id;
    $("#TeachingPlanFilterTeacherId").load(url, function () {
        //reloadTeachingPlan();
    });

}