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

            <th class="column-title"><?php echo $this->Paginator->sort('fullname', 'Tên đầy đủ'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('startdate', 'Ngày bắt đầu'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('categoryname', 'Đơn vị quản lý'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('visible', 'Đang hiện'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('timecreated', 'Thời điểm tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('timemodified', 'Sửa lần cuối'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all"> </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['LmsCourse']['page'] - 1) * $this->Paginator->params['paging']['LmsCourse']['limit']) + 1; ?>
        <?php foreach ($lmsCourses as $lmsCourse): ?>
            <tr id="row-<?php echo $lmsCourse['LmsCourse']['id'] ?>">
                <td><?php echo $stt++; ?></td>


                <td class=""><?php echo h($lmsCourse['LmsCourse']['fullname']); ?>&nbsp;</td>
                <td class=""><?php echo date('Y-m-d', $lmsCourse['LmsCourse']['startdate']); ?>&nbsp;</td>



                <td class=""><?php echo h($lmsCourse['LmsCourse']['categoryname']); ?>&nbsp;</td>
                <td class=""><?php echo $this->Common->showTrueFalseAsCheck($lmsCourse['LmsCourse']['visible']); ?>&nbsp;</td>
                <td class=""><?php echo date('Y-m-d H:i:s', $lmsCourse['LmsCourse']['timecreated']); ?>&nbsp;</td>
                <td class=""><?php echo date('Y-m-d H:i:s', $lmsCourse['LmsCourse']['timemodified']); ?>&nbsp;</td>
                <td class=""><?php echo h($lmsCourse['LmsCourse']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $lmsCourse['LmsCourse']['id']), array('class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                    <?php echo $this->Html->link(__('<i class="fa fa-folder-open-o"></i>'), array('action' => 'view', $lmsCourse['LmsCourse']['id']), array('class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>

                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $lmsCourse['LmsCourse']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php
        echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Nhập khóa học từ LMS'),
                "/admin/lms_courses/get_lms_courses",
                ['class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Kế nối với LMS để lấy các khóa học trong học kỳ chỉ định']);
        ?>                        
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
