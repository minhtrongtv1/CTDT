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

<?php
echo $this->Js->writeBuffer();
