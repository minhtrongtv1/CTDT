<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php echo $this->Html->css('select2'); ?>
<?php echo $this->Html->css('select2-bootstrap'); ?>
<?php echo $this->Html->script('select2.min'); ?>
<?php echo $this->Html->css('bootstrap-editable'); ?>
<?php echo $this->Html->script('bootstrap-editable.min'); ?>
<?php echo $this->Html->script('JSON-to-Table.min.1.0.0'); ?>




<h2>Cập nhật kết quả chuyên đề <?php echo $course_name; ?></h2>

<div>Hướng dẫn cập nhật kết quả:

    <ul>
        <li>Bước 1. Check chọn học viên.</li>
        <li>Bước 2. Click vào Đánh dấu Đạt hoặc Đánh dấu không đạt để cập nhật kết quả</li>
        <li>Mẹo: Nút Đảo chọn dùng để bỏ chọn những dòng đang được chọn và chọn những dòng đang không được chọn</li>
    </ul>

    <!-- comment --></div>

<div>Hướng dẫn cập ghi vắng có phép

    <ul>
        <li>Bước 1. Click vào Đánh dấu vắng của dòng chứa học viên cần ghi vắng </li>
        <li>Bước 2. Nhập lý do vắng và chọn OK</li>
    </ul>

    <!-- comment --></div>
<div class="btn-group">
    <span class="text-danger">Với các dòng được chọn:</span>
    <span>
        <button class="btn btn-sm btn-success" id="danh_dau_dat_btn">
            <i class="ace-icon fa fa-check"></i>
            Đánh dấu ĐẠT
        </button>

        <button class="btn btn-sm btn-warning" id="danh_dau_khong_dat_btn">
            <i class="ace-icon fa fa-fire bigger-110"></i>
            <span class="bigger-110 no-text-shadow">Đánh dấu KHÔNG ĐẠT</span>
        </button><!-- comment -->

        <button class="btn btn-sm btn-info" id="khoi_phuc_ket_qua_btn">
            <i class="ace-icon fa fa-fire bigger-110"></i>
            <span class="bigger-110 no-text-shadow">Khôi phục kết quả mặc định</span>
        </button><!-- comment -->

        <button class="btn btn-sm btn-danger" id="vang_khong_phep">
            <i class="ace-icon fa fa-fire bigger-110"></i>
            <span class="bigger-110 no-text-shadow">Đánh dấu vắng không phép</span>
        </button><!-- comment -->





    </span>
</div>

<form action="/" id="result_form">
    <div id="datarows">
        <table id="grid-sinh-vien" class="table table-bordered table-hover">
            <thead>
            <th ><input type="checkbox" id="check-all"> Chọn tất cả | <span id="dao-chon" class="btn btn-xs">Đảo chọn</span></th>
            <th>TT</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Kết quả</th>
            <th>Số QĐ</th>
            <th>Ngày ký QĐ</th>
            <th >Vắng có phép</th>
            <th >Vắng không phép</th>            
            <th >Lý do vắng</th>
            <th></th>

            </thead>
            <tbody>
                <?php
                $stt = 1;
                foreach ($workshop['Enrolment'] as $student):
                    ?>
                    <tr>
                        <td><input type = "checkbox" class = "enrollment-checkbox" name = "selete-item" value="<?php echo $student['id'] ?>" id="checkbox_<?php echo $student['id'] ?>"></td>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $student['Teacher']['name']; ?></td>
                        <td><?php echo $student['Teacher']['email']; ?></td>
                        <td class="pass-value"><?php echo $this->Common->showTrueFalseAsCheckNotTitle($student['result']); ?></td>
                        <td><?php echo $student['so_qd']; ?></td>
                        <td><?php echo $student['ngay_qd']; ?></td>
                        <td class="vang_co_phep_td"><?php echo $this->Common->showTrueFalseAsCheckOrEmpty($student['vang_co_phep']); ?></td>
                        <td class="vang_khong_phep_td"><?php echo $this->Common->showTrueFalseAsCheckOrEmpty($student['vang_khong_phep']); ?></td>
                        <td><?php if ($student['Enrollment']['absence']) echo $this->Common->showTrueFalseAsCheckOrEmpty($student['Enrollment']['absence']); ?></td>
                        <td><?php echo $student['Enrollment']['absence_reason']; ?></td>
                        <td>
                            <?php if (!$student['Enrollment']['absence']): ?>
                                <button class="btn btn-xs btn-success danh-dau-vang-btn" value="<?php echo $student['Enrollment']['id'] ?>">
                                    <i class="ace-icon fa fa-check"></i>
                                    Đánh dấu VẮNG CÓ PHÉP
                                </button>
                            <?php endif; ?>

                            <?php if ($student['Enrollment']['absence']): ?>

                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr cols="2"><td>Số lượng SV: </td>
                    <td cols="6"><b><?php echo $stt - 1; ?></b>
                    </td></tr>
                <tr cols="2">
                    <td>Số lượng SV đạt: </td>
                    <td cols="6" id="so-sv-dat">
                        <b></b>

                    </td></tr>
                <tr cols="2">
                    <td>Số lượng SV không đạt: </td>
                    <td cols="6" id="so-sv-khong-dat">
                        <b></b>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</form>


<?php echo $this->Html->script('select2.min'); ?>
<?php echo $this->Html->css('bootstrap-editable'); ?>
<?php echo $this->Html->script('bootstrap-editable.min'); ?>




<script>

    var checkedIndices = [];
    function SaveBoxes() {
        checkedIndices = [];
        var checkboxes = $("table#grid-sinh-vien td input.enrollment-checkbox");
        //var checkboxes = $("table#grid-sinh-vien td input.enrollment-checkbox");

        for (var index = 0; index < checkboxes.length; index++) {
            var checkbox = $(checkboxes[index]);
            //checkbox.prop('checked', !checkbox.is(':checked'));
            checkedIndices.push(checkbox.is(':checked'));
        }
        /*
         $("table#grid-sinh-vien td input.enrollment-checkbox").each(function (index, checkbox) {
         if ($(checkbox).is(":checked"))
         checkedIndices.push($(checkbox).index());
         });*/
        console.log(checkedIndices);
    }

    function CancelBoxes() {

        var checkboxes = $("table#grid-sinh-vien td input.enrollment-checkbox");
        console.log(checkedIndices);
        for (i = 0; i < checkedIndices.length; i++) {
            var checkbox = $(checkboxes[i]);
            checkbox.prop('checked', checkedIndices[i]);
        }
        //$("table#grid-sinh-vien td input.enrollment-checkbox:eq(" + checkedIndices[i] + ")").attr("checked", "checked");
    }


    //Dang dau vang click
    $(document).on("click", ".danh-dau-vang-btn", function (e) {
        e.preventDefault();
        var id = $(this).val();
        var ly_do_vang = prompt("Vui lòng nhập lý do vắng!", "Trùng lịch học");
        if (ly_do_vang != null) {
//Dùng ajax post du lieu len server xu ly
            $.post("/knm/teacher/enrollments/danh_dau_vang", {id: id, ly_do_vang: ly_do_vang}, function (response) {
                reloadGrid();
            });
        }

    });
    //Dang dau vang click
    $(document).on("click", ".danh-dau-khong-vang-btn", function (e) {
        e.preventDefault();
        var id = $(this).val();
        var ly_do_vang = prompt("Vui lòng nhập lý do vắng!", "Trùng lịch học");
        if (ly_do_vang != null) {
//Dùng ajax post du lieu len server xu ly
            $.post("/knm/teacher/enrollments/danh_dau_khong_vang", {id: id, ly_do_vang: ly_do_vang}, function (response) {
                reloadGrid();
            });
        }

    });
    //Dang dau vang click
    $(document).on("click", "#vang_buoi_1_btn", function (e) {
        e.preventDefault();
        var data = $("#result_form").serializeArray();
        if (!data.length) {
            alert('Vui lòng chọn sinh viên!');
        } else {
            //Dùng ajax post du lieu len server xu ly
            $.post("/knm/teacher/enrollments/vang_buoi_1", {id: data}, function (response) {
                reloadGrid();
            });
        }
    });
    //Dang dau vang click
    $(document).on("click", "#vang_buoi_2_btn", function (e) {
        e.preventDefault();
        var data = $("#result_form").serializeArray();
        if (!data.length) {
            alert('Vui lòng chọn sinh viên!');
        } else {
            //Dùng ajax post du lieu len server xu ly
            $.post("/knm/teacher/enrollments/vang_buoi_2", {id: data}, function (response) {
                reloadGrid();
            });
        }
    });
    function reloadGrid() {
        $.get('/knm/teacher/enrollments/ket_qua/<?php echo $course_id ?>', function (res) {
            $("#datarows").html(res);
            CancelBoxes();
            thong_ke_ket_qua();
        });
    }
    $(document).on("click", "#check-all", function () {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        SaveBoxes();
    });
    $(document).on("click", ".enrollment-checkbox", function () {
        SaveBoxes();
    });
    $(document).on("click", "#dao-chon", function () {

        var checkboxes = $("table#grid-sinh-vien td input.enrollment-checkbox");
        console.log(checkboxes);
        for (var index = 0; index < checkboxes.length; index++) {
            var checkbox = $(checkboxes[index]);
            checkbox.prop('checked', !checkbox.is(':checked'));
            //$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        }
        SaveBoxes();
    });
    $(document).on("click", "#danh_dau_dat_btn", function () {

        var data = $("#result_form").serializeArray();
        if (!data.length) {
            alert('Vui lòng chọn sinh viên!');
        } else {
            //Dùng ajax post du lieu len server xu ly
            $.post("/knm/teacher/enrollments/danh_dau_dat", {id: data, 'course_id':<?php echo $course_id ?>}, function (response) {
                reloadGrid();
            });
        }
    });
    $(document).on("click", "#danh_dau_khong_dat_btn", function () {

        var data = $("#result_form").serializeArray();
        if (!data.length) {
            alert('Vui lòng chọn sinh viên!');
        } else {
            //Dùng ajax post du lieu len server xu ly
            $.post("/knm/teacher/enrollments/danh_dau_khong_dat", {id: data, 'course_id':<?php echo $course_id ?>}, function (response) {
                reloadGrid();
            });
        }
    });
    $(document).on("click", "#khoi_phuc_ket_qua_btn", function () {

        var data = $("#result_form").serializeArray();
        if (!data.length) {
            alert('Vui lòng chọn sinh viên!');
        } else {
            //Dùng ajax post du lieu len server xu ly
            $.post("/knm/teacher/enrollments/khoi_phuc_ket_qua", {id: data}, function (response) {
                reloadGrid();
            });
        }
    });
    //lấy các dòng đã chọn


    function thong_ke_ket_qua() {
        var pass_values = $("table#grid-sinh-vien td.pass-value");
        //console.log(pass_values);return;
        var pass_counter = 0;
        var fail_counter = 0;
        for (var index = 0; index < pass_values.length; index++) {
            var checkbox = $(pass_values[index]);
            if (checkbox.children('span.text-danger').length == 1) {
                fail_counter++;
            }

            if (checkbox.children('span.text-success').length == 1) {
                pass_counter++;
            }




            //$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        }
        $("#so-sv-khong-dat").html(fail_counter);
        $("#so-sv-dat").html(pass_counter);
    }

    $(function () {
        thong_ke_ket_qua();
    }
    );


</script>