<?php
$this->Paginator->options(array(
    'url' => array('pdt' => true, 'action' => 'pdt_index'),
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


            <th class="column-title"><?php echo $this->Paginator->sort('curriculumn_id', 'Chương trình đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('program_outcome_id', 'Mục tiêu đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã chuẩn đầu ra'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('describe', 'Miêu tả'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('level', 'Trình độ'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('group_type', 'Nhóm thể loại'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['ProgramObjective']['page'] - 1) * $this->Paginator->params['paging']['ProgramObjective']['limit']) + 1; ?>
        <?php foreach ($programObjectives as $programObjective): ?>
            <tr id="row-<?php echo $programObjective['ProgramObjective']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class="">
                    <?php echo $this->Html->link($programObjective['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $programObjective['Curriculumn']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($programObjective['ProgramOutcome']['name'], array('controller' => 'program_outcomes', 'action' => 'view', $programObjective['ProgramOutcome']['id'])); ?>
                </td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['describe']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['level']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['group_type']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
