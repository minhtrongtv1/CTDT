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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã thiết bị'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên thiết bị'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Số lượng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Được sử dụng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Ghi chú'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Device']['page'] - 1) * $this->Paginator->params['paging']['Device']['limit']) + 1; ?>
        <?php foreach ($devices as $device): ?>
            <tr id="row-<?php echo $device['Device']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($device['Device']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['quantity']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['used']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['note']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $device['Device']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $device['Device']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/devices/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
