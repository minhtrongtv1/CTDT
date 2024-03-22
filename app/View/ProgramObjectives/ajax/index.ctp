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


            <th class="column-title"><?php echo $this->Paginator->sort('curriculumn_id', 'Chương trình đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('programoutcome_id', 'Mục tiêu đào tạo'); ?></th>





            <th class="column-title"><?php echo $this->Paginator->sort('describe', 'Miêu tả'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('level', 'Trình độ'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('typeobjective_id', 'Loại chuẩn đầu ra'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
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
                <td class=""><?php echo h($programObjective['Programoutcome']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['describe']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['level']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['Typeobjective']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($programObjective['ProgramObjective']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $programObjective['ProgramObjective']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $programObjective['ProgramObjective']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/programObjectives/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
