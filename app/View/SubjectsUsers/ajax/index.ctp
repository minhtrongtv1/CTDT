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


            <th class="column-title"><?php echo $this->Paginator->sort('user_id', 'Tên giáo viên'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('subject_id', 'Tên học phần'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['SubjectsUser']['page'] - 1) * $this->Paginator->params['paging']['SubjectsUser']['limit']) + 1; ?>
        <?php foreach ($subjectsUsers as $subjectsUser): ?>
            <tr id="row-<?php echo $subjectsUser['SubjectsUser']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class="">
                    <?php echo $this->Html->link($subjectsUser['User']['ho_va_ten_khoa_code'], array('controller' => 'users', 'action' => 'view', $subjectsUser['User']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($subjectsUser['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectsUser['Subject']['id'])); ?>
                </td>
                <td class=""><?php echo h($subjectsUser['SubjectsUser']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $subjectsUser['SubjectsUser']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $subjectsUser['SubjectsUser']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/subjectsUsers/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
