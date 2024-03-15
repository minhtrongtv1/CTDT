<?php
$this->Paginator->options(array(
    'url' => array('pkt' => true, 'action' => 'pkt_index'),
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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã chương trình đào tạo'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('name_vn', 'Tên chương trình đào tạo'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('level_id', 'Trình độ đào tạo'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('major_id', 'Ngành đào tạo'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('form_of_trainning_id', 'Hình thức đào tạo'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('graduation_condition', 'Điều kiện tốt nghiệp'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('diploma_id', 'Văn bằng tốt nghiệp'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('department_id', 'Đơn vị quản lý'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('year_of_curriculumn', 'Năm bắt đầu áp dụng chương trình'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('decision_number', 'Số quyết định ban hành'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('decision_filename', 'File quyết định'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('state_id', 'Trạng thái'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('approve', 'Phê duyệt'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>
            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Curriculumn']['page'] - 1) * $this->Paginator->params['paging']['Curriculumn']['limit']) + 1; ?>
        <?php foreach ($curriculumns as $curriculumn): ?>
            <tr id="row-<?php echo $curriculumn['Curriculumn']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($curriculumn['Curriculumn']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Curriculumn']['name_vn']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Level']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Major']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['FormOfTrainning']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Curriculumn']['graduation_condition']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Diploma']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Department']['title']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Curriculumn']['year_of_curriculumn']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Curriculumn']['decision_number']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Curriculumn']['decision_filename']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['State']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Curriculumn']['approve']); ?>&nbsp;</td>
                <td class=""><?php echo h($curriculumn['Curriculumn']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $curriculumn['Curriculumn']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $curriculumn['Curriculumn']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/curriculumns/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
