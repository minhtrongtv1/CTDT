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
            <h2>DANH SÁCH GIẢNG VIÊN ĐƯỢC CẤP CHỨNG NHẬN TẬP HUẤN</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Enrolment', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">
                    <?php echo $this->Form->input('teacher_id', array('empty' => '-- Giảng viên --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <?php echo $this->Form->input('workshop_id', array('empty' => '-- Tên khóa tập huấn --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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
                            <th class="column-title"><?php echo $this->Paginator->sort('teacher_id', 'Họ và tên GV'); ?></th>
                            <th class="column-title">Đơn vị</th>
                            <th class="column-title"><?php echo $this->Paginator->sort('workshop_id', 'Tên workshop'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('result', 'Kết quả'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('so_qd', 'Số QĐ'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('ngay_qd', 'Ngày ký'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

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
                                    <?php debug($enrolment);?>
                                    <?php echo $enrolment['Teacher']['Department']['title']; ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($enrolment['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $enrolment['Workshop']['id'])); ?>
                                </td>

                                <td class=""><?php echo $this->Common->showPass($enrolment['Enrolment']['result']); ?>&nbsp;</td>
                                <td class=""><?php echo h($enrolment['Enrolment']['so_qd']); ?>&nbsp;</td>
                                <td class=""><?php echo h($enrolment['Enrolment']['ngay_qd']); ?>&nbsp;</td>
                                <td class=""><?php echo h($enrolment['Enrolment']['id']); ?>&nbsp;</td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <?php echo $this->element("pagination"); ?>  
            </div>
        </div>
    </div>
</div>


<script>

    $("#EnrolmentTeacherId").select2();

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("<?php echo BASE_URL ?>khcn/enrolments/index", data, function (response) {
            $("#datarows").html(response);
        });

    });


</script>
<?php
echo $this->Js->writeBuffer();
