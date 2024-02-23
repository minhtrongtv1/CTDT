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
            <h2>KẾT QUẢ ĐÁNH GIÁ</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="pull-right">
                <?php echo $this->Html->link(__('Phân công đánh giá'), "/admin/evaluationResults/phan_cong", ['class' => 'btn btn-success btn-xs', 'escape' => false]); ?>
                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/evaluationResults/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        
                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    

            </div>
            <br>
            <div class="row">

                <?php echo $this->Form->create('EvaluationResult', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">
                    <?php echo $this->Form->input('semester', array('placeholder' => 'Học kỳ năm học', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('department_id', array('empty' => '-- Khoa --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <?php echo $this->Form->input('evaluation_round_id', array('empty' => '-- ĐỢT ĐÁNH GIÁ --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('course_name', array('placeholder' => 'Tên khóa học', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('teacher_id', array('empty' => '-- Chọn Giảng viên --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <?php echo $this->Form->input('supporter_id', array('empty' => '-- BÁN CHUYÊN TRÁCH --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('pass', array('empty' => '--KẾT QUẢ--', 'options' => array(0 => 'Không đạt', 1 => 'Đạt', -1 => 'Chưa chấm'), 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            </div>
            <br>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>


                            <th class="column-title"><?php echo $this->Paginator->sort('evaluation_round_id', 'Đợt đánh giá'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('course_id', 'Khóa học'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('start_date', 'Ngày BĐ dạy'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('supporter_id', 'BCT'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('pass', 'Kết quả'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('reason', 'Lý do không đạt'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id', 'ID'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['EvaluationResult']['page'] - 1) * $this->Paginator->params['paging']['EvaluationResult']['limit']) + 1; ?>
                        <?php foreach ($evaluationResults as $evaluationResult): ?>
                            <tr id="row-<?php echo $evaluationResult['EvaluationResult']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class="">
                                    <?php echo $this->Html->link($evaluationResult['EvaluationRound']['title'], array('controller' => 'evaluation_rounds', 'action' => 'view', $evaluationResult['EvaluationRound']['id'])); ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($evaluationResult['Course']['fullname'], array('controller' => 'courses', 'action' => 'view', $evaluationResult['Course']['id'])); ?>
                                </td>
                                <td class="">
                                    <?php echo $evaluationResult['Course']['startdate']; ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($evaluationResult['Supporter']['name'], array('controller' => 'users', 'action' => 'view', $evaluationResult['Supporter']['id'])); ?>
                                </td>
                                <td class=""><?php echo h($evaluationResult['EvaluationResult']['pass']); ?>&nbsp;</td>
                                <td class=""><?php echo h($evaluationResult['EvaluationResult']['reason']); ?>&nbsp;</td>
                                <td class=""><?php echo h($evaluationResult['EvaluationResult']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $evaluationResult['EvaluationResult']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                </td>
                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $evaluationResult['EvaluationResult']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
                <?php echo $this->element("pagination"); ?>  
            </div>
        </div>
    </div>
</div>


<script>


    $("#EvaluationResultTeacherId").select2();

    jQuery.fn.fadeOutAndRemove = function (speed) {
        $(this).fadeOut(speed, function () {
            $(this).remove();
        })
    };

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("<?php echo BASE_URL ?>admin/evaluationResults/index", data, function (response) {
            $("#datarows").html(response);
        });

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
            $.post('<?php echo BASE_URL ?>admin/evaluationResults/delete', {selectedRecord: selectedRecord}, function (response) {
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

</script>
<?php
echo $this->Js->writeBuffer();
