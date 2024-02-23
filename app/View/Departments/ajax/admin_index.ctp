<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index','admin'=>true),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><table class="table table-bordered table-hover has-checked-item">
    <thead>

        <tr class="headings">
            <th>#</th>


            <th class="column-title"><?php echo $this->Paginator->sort('code'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('title'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('lms_id'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Department']['page'] - 1) * $this->Paginator->params['paging']['Department']['limit']) + 1; ?>
        <?php foreach ($departments as $department): ?>
            <tr id="row-<?php echo $department['Department']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($department['Department']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($department['Department']['title']); ?>&nbsp;</td>
                <td class=""><?php echo h($department['Department']['lms_id']); ?>&nbsp;</td>
                <td class=""><?php echo h($department['Department']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $department['Department']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $department['Department']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/departments/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  
<?php
echo $this->Js->writeBuffer();
