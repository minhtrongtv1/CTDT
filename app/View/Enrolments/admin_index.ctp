<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php echo $this->Html->css('/select2-4.0.3/css/select2.min'); ?>
<?php echo $this->Html->script('/select2-4.0.3/js/select2.min'); ?>

<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>DANH SÁCH GIẢNG VIÊN TẬP HUẤN</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Enrolment', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('teacher_id', array('empty' => '-- Giảng viên --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <?php echo $this->Form->input('workshop_id', array('type' => 'text', 'placeholder' => 'Workshop ID', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            </div>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>
                            <th class="column-title"><?php echo $this->Paginator->sort('teacher_id'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('workshop_id'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('result'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><input type="checkbox" id="check-all"> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Enrolment']['page'] - 1) * $this->Paginator->params['paging']['Enrolment']['limit']) + 1; ?>
                        <?php foreach ($enrolments as $enrolment): ?>
                            <tr id="row-<?php echo $enrolment['Enrolment']['id'] ?>">
                                <td><?php echo $stt++; ?></td>
                                <td class="">
                                    <?php echo $this->Html->link($enrolment['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $enrolment['Teacher']['id'])); ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($enrolment['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $enrolment['Workshop']['id'])); ?>
                                </td>

                                <td class=""><?php echo $this->Common->showPass($enrolment['Enrolment']['result']); ?>&nbsp;</td>
                                <td class=""><?php echo h($enrolment['Enrolment']['id']); ?>&nbsp;</td>

                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $enrolment['Enrolment']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/enrolments/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        

                        <?php echo $this->Html->link(__('ĐẠT'), "#", ['id' => 'result_pass', 'class' => 'result btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Đánh giá đạt các dòng chọn']); ?>                        
                        <?php echo $this->Html->link(__('KHÔNG ĐẠT'), "#", ['id'=>'result_fail', 'class' => 'result btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Đánh giá không đạt các dòng chọn']); ?>                        

                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
                    </tfoot>

                </table>
                <?php echo $this->element("pagination"); ?>  
            </div>
        </div>
    </div>
</div>


<script>
    jQuery.fn.fadeOutAndRemove = function (speed) {
        $(this).fadeOut(speed, function () {
            $(this).remove();
        })
    };

    function loadData() {
        var data = $('#filter-form').serialize();
        $.post("<?php echo BASE_URL ?>/admin/enrolments/index", data, function (response) {
            $("#datarows").html(response);
        });
    }

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        loadData();

    });

    $(document).on("click", "#check-all", function () {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });


    $(document).on("click", "#delete-seleted", function () {
        var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
        //console.log(selectedRecord.length);return false;
        if (selectedRecord.length < 1) {
            alert("Vui lòng chọn dòng muốn xóa !");
            return false;
        }
        if (confirm("Thao tác này không thể phục hồi, bạn chắc chắn muốn thực hiện ?")) {
            var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
            $.post('<?php echo BASE_URL ?>/enrolments/delete', {selectedRecord: selectedRecord}, function (response) {
                if (response) {
                    $.each(response, function (arrayID, rowId) {
                        $("#row-" + rowId).fadeOutAndRemove('fast');
                    });
                    return true;

                } else {
                    alert('Có lỗi trong quá trình thực hiện thao tác!!!');
                    return false;
                }
            }, 'json').fail(function (response) {
                alert('Error: ' + response.responseText);
            });
            return true;
        } else {
            return false;
        }
    });

    $(document).on("click", "#result_pass", function () {
        var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
        //console.log(selectedRecord.length);return false;
        if (selectedRecord.length < 1) {
            alert("Vui lòng chọn dòng muốn đánh giá ĐẠT !");
            return false;
        }
        if (confirm("Bạn chắc chắn?")) {
            var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
            $.post('<?php echo BASE_URL ?>/enrolments/cap_nhat_ket_qua/1', {selectedRecord: selectedRecord}, function (response) {
                if (response) {
                    $.each(response, function (arrayID, rowId) {
                        loadData();
                    });
                    return true;

                } else {
                    alert('Có lỗi trong quá trình thực hiện thao tác!!!');
                    return false;
                }
            }, 'json').fail(function (response) {
                alert('Error: ' + response.responseText);
            });
            return true;
        } else {
            return false;
        }
    });

    $(document).on("click", "#result_fail", function () {
        var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
        //console.log(selectedRecord.length);return false;
        if (selectedRecord.length < 1) {
            alert("Vui lòng chọn dòng muốn đánh giá KHÔNG ĐẠT !");
            return false;
        }
        if (confirm("Bạn chắc chắn?")) {
            var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
            $.post('<?php echo BASE_URL ?>/enrolments/cap_nhat_ket_qua/0', {selectedRecord: selectedRecord}, function (response) {
                if (response) {
                    $.each(response, function (arrayID, rowId) {
                        loadData();
                    });
                    return true;

                } else {
                    alert('Có lỗi trong quá trình thực hiện thao tác!!!');
                    return false;
                }
            }, 'json').fail(function (response) {
                alert('Error: ' + response.responseText);
            });
            return true;
        } else {
            return false;
        }
    });


</script>
<?php
echo $this->Js->writeBuffer();
