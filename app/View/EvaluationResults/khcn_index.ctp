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
            <h2>Khóa học E-Learning ĐẠT yêu cầu mức độ 1</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 


            <div class="row">

                <?php echo $this->Form->create('EvaluationResult', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('course_name', array('placeholder' => 'Tên giảng viên...', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('department_id', array('empty' => '-- Chọn Khoa -- ', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('pass', array('empty' => '-- Chọn kết quả -- ', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'), 'options' => array(-1 => 'Không đạt', 1 => 'Đạt'))); ?>


                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            
            </div>
            <br>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>

                            <th class="column-title"><?php echo $this->Paginator->sort('course_id', 'Khóa học'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('evaluation_round_id', 'Đợt đánh giá'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('pass', 'Kết quả'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('id', 'ID'); ?></th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['EvaluationResult']['page'] - 1) * $this->Paginator->params['paging']['EvaluationResult']['limit']) + 1; ?>
                        <?php foreach ($evaluationResults as $evaluationResult): ?>
                            <tr id="row-<?php echo $evaluationResult['EvaluationResult']['id'] ?>">
                                <td><?php echo $stt++; ?></td>
                                <td class="">
                                    <?php echo $evaluationResult['Course']['fullname']; ?>
                                </td>
                                <td class="">
                                    <?php echo $evaluationResult['EvaluationRound']['title']; ?>
                                </td>


                                <td class=""><?php echo h($evaluationResult['EvaluationResult']['pass']); ?>&nbsp;</td>
                                <td class=""><?php echo h($evaluationResult['EvaluationResult']['id']); ?>&nbsp;</td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
                <?php echo $this->Html->link('Xuất danh sách', '?export=1') ?>
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

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("<?php echo BASE_URL ?>khcn/evaluationResults/index", data, function (response) {
            $("#datarows").html(response);
        });

    });




</script>
<?php
echo $this->Js->writeBuffer();
