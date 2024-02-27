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


            <th class="column-title"><?php echo $this->Paginator->sort('code','Mã tài liệu'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name','Tên tài liệu'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Tên tác giả'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Nhà xuất bản'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Năm xuất bản'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Mã định danh'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Ghi chú'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Book']['page'] - 1) * $this->Paginator->params['paging']['Book']['limit']) + 1; ?>
        <?php foreach ($books as $book): ?>
            <tr id="row-<?php echo $book['Book']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($book['Book']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['author_name']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['publisher']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['publishing_year']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['link_libary']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['note']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $book['Book']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $book['Book']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/books/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  



<?php
echo $this->Js->writeBuffer();
