<?php
$this->Paginator->options(array(
    'url' => array('dvcm' => true, 'action' => 'dvcm_index'),
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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã khối kiến thức'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên khối kiến thức'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('program_objective_id', 'Chuẩn đầu ra'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('describe', 'Miêu tả'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Knowledge']['page'] - 1) * $this->Paginator->params['paging']['Knowledge']['limit']) + 1; ?>
        <?php foreach ($knowledges as $knowledge): ?>
            <tr id="row-<?php echo $knowledge['Knowledge']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($knowledge['Knowledge']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($knowledge['Knowledge']['name']); ?>&nbsp;</td>
                <td class="">
                    <?php echo $this->Html->link($knowledge['ProgramObjective']['code'], array('controller' => 'program_objectives', 'action' => 'view', $knowledge['ProgramObjective']['id'])); ?>
                </td>
                <td class=""><?php echo h($knowledge['Knowledge']['describe']); ?>&nbsp;</td>
                <td class=""><?php echo h($knowledge['Knowledge']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $knowledge['Knowledge']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $knowledge['Knowledge']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/knowledges/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
