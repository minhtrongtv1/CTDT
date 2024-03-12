<?php
$this->Paginator->options(array(
    'url' => array('ptc' => true, 'action' => 'ptc_index'),
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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã mục tiêu đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên mục tiêu đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('content', 'Nội dung mục tiêu đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('typeoutcome_id', 'Loại mục tiêu'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('curriculumn_id', 'Chương trình đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['ProgramOutcome']['page'] - 1) * $this->Paginator->params['paging']['ProgramOutcome']['limit']) + 1; ?>
        <?php foreach ($programOutcomes as $programOutcome): ?>
            <tr id="row-<?php echo $programOutcome['ProgramOutcome']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($programOutcome['ProgramOutcome']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($programOutcome['ProgramOutcome']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($programOutcome['ProgramOutcome']['content']); ?>&nbsp;</td>
                <td class=""><?php echo h($programOutcome['ProgramOutcome']['typeoutcome_id']); ?>&nbsp;</td>
                <td class="">
                    <?php echo $this->Html->link($programOutcome['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $programOutcome['Curriculumn']['id'])); ?>
                </td>
                <td class=""><?php echo h($programOutcome['ProgramOutcome']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
