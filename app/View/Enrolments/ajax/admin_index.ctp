<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?>

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

<?php
echo $this->Js->writeBuffer();
