<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>



<?php //debug($workshop);die;?>

<h2>Cập nhật kết quả chuyên đề</h2>
<h4><strong><?php echo $workshop_name; ?></strong></h4>



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
            <th>Link file QĐ</th>
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

                        <td><?php echo $student['ly_do_vang']; ?></td>
                        <td><?php if (!empty($student['link_file_qd'])) echo $this->Html->link('Xem QĐ', $student['link_file_qd']); ?></td>
                        <td>
                            <?php if (!$student['vang_co_phep']): ?>
                                <button class="btn btn-xs btn-success danh-dau-vang-btn" value="<?php echo $student['id'] ?>">
                                    <i class="ace-icon fa fa-check"></i>
                                    Đánh dấu VẮNG CÓ PHÉP
                                </button>
                            <?php endif; ?>


                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr cols="2"><td>Số lượng HV: </td>
                    <td cols="6"><b><?php echo $stt - 1; ?></b>
                    </td>
                </tr>
                <tr cols="2">
                    <td>Số lượng HV đạt: </td>
                    <td cols="6" id="so-sv-dat">
                        <b></b>

                    </td></tr>
                <tr cols="2">
                    <td>Số lượng HV không đạt: </td>
                    <td cols="6" id="so-sv-khong-dat">
                        <b></b>
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>

</form>


<div class="btn-group">
    <h5>Với các dòng được chọn:</h5>
    <div class="col-md-6">
        <div class="well">
            <button class="btn btn-sm btn-success" id="danh_dau_dat_btn">

                ĐẠT
            </button>

            <button class="btn btn-sm btn-warning" id="danh_dau_khong_dat_btn">

                <span class="bigger-110 no-text-shadow">KHÔNG ĐẠT</span>
            </button><!-- comment -->

            <button class="btn btn-sm btn-info" id="khoi_phuc_ket_qua_btn">

                <span class="bigger-110 no-text-shadow">Khôi phục kết quả</span>
            </button><!-- comment -->

            <button class="btn btn-sm btn-danger" id="danh_dau_vang_khong_phep">

                <span class="bigger-110 no-text-shadow">Vắng không phép</span>
            </button><!-- comment -->
            <a href="<?php echo BASE_URL ?>teacher/enrolments/add/<?php echo $workshop_id ?>">
                <button class="btn btn-sm btn-info"><span class="bigger-110 no-text-shadow">Thêm học viên</span></button><!-- comment -->
            </a>
        </div>


    </div>
    <div class="col-md-6">
        <div class="well">
            <?php echo $this->Form->create('Enrolment', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>


            <?php echo $this->Form->input('so_qd', array('placeholder' => 'Số QĐ', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

            <?php echo $this->Form->input('ngay_qd', array('type' => 'text', 'placeholder' => 'Ngày QĐ (dd/mm/yyyy)', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

            <?php echo $this->Form->input('link_file_qd', array('type' => 'text', 'placeholder' => 'Link file QĐ', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

            <div class="form-group">
                <?php echo $this->Form->button('Cập nhật số và ngày QĐ', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>

            </div>

            <?php echo $this->Form->end(); ?>            
        </div>
    </div>
</div>








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
        var ly_do_vang = prompt("Vui lòng nhập lý do vắng!", "Công tác đột xuất");
        if (ly_do_vang != null) {
//Dùng ajax post du lieu len server xu ly
            $.post("<?php echo BASE_URL ?>/teacher/enrolments/danh_dau_vang_co_phep", {id: id, ly_do_vang: ly_do_vang}, function (response) {
                reloadGrid();
            });
        }

    });
    //Dang dau vang click
    $(document).on("click", ".danh-dau-khong-vang-btn", function (e) {
        e.preventDefault();
        var id = $(this).val();
        var ly_do_vang = prompt("Vui lòng nhập lý do vắng!", "Công tác đột xuất");
        if (ly_do_vang != null) {
//Dùng ajax post du lieu len server xu ly
            $.post("<?php echo BASE_URL ?>/teacher/enrolments/danh_dau_khong_vang", {id: id, ly_do_vang: ly_do_vang}, function (response) {
                reloadGrid();
            });
        }

    });


    function reloadGrid() {
        $.get('<?php echo BASE_URL ?>/teacher/enrolments/ket_qua/<?php echo $workshop_id ?>', function (res) {
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
                    $.post("<?php echo BASE_URL ?>/teacher/enrolments/danh_dau_dat", {id: data, 'course_id':<?php echo $workshop_id ?>}, function (response) {
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
                    $.post("<?php echo BASE_URL ?>/teacher/enrolments/danh_dau_khong_dat", {id: data, 'course_id':<?php echo $workshop_id ?>}, function (response) {
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
                    $.post("<?php echo BASE_URL ?>/teacher/enrolments/khoi_phuc_ket_qua", {id: data}, function (response) {
                        reloadGrid();
                    });
                }
            });


            $(document).on("click", "#danh_dau_vang_khong_phep", function () {

                var data = $("#result_form").serializeArray();
                if (!data.length) {
                    alert('Vui lòng chọn học viên!');
                } else {
                    //Dùng ajax post du lieu len server xu ly
                    $.post("<?php echo BASE_URL ?>/teacher/enrolments/danh_dau_vang_khong_phep", {id: data}, function (response) {
                        reloadGrid();
                    });
                }
            });


            $(document).on("submit", "#filter-form", function (e) {
                e.preventDefault();


                var data = $("#result_form").serializeArray();
                if (!data.length) {
                    alert('Vui lòng chọn học viên!');
                } else {

                    var so_qd = $("#EnrolmentSoQd").val();
                    var ngay_qd = $("#EnrolmentNgayQd").val();
                    var link_file_qd = $("#EnrolmentLinkFileQd").val();






                    var qd_data = $("#filter-form").serializeArray();
                    //Dùng ajax post du lieu len server xu ly
                    $.post("<?php echo BASE_URL ?>/teacher/enrolments/cap_nhat_qd", {id: data, so_qd: so_qd, ngay_qd: ngay_qd, link_file_qd}, function (response) {
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