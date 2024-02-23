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

<?php
echo $this->Js->writeBuffer();
