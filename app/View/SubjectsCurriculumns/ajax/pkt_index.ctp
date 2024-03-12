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


            <th class="column-title"><?php echo $this->Paginator->sort('curriculumn_id', 'Chương trình đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('subject_id', 'Học phần'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('knowledge_id', 'Khối kiến thức'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('semester_id', 'Học kỳ'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('typesubject', 'Loại học phần'); ?></th>




            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['SubjectsCurriculumn']['page'] - 1) * $this->Paginator->params['paging']['SubjectsCurriculumn']['limit']) + 1; ?>
        <?php foreach ($subjectsCurriculumns as $subjectsCurriculumn): ?>
            <tr id="row-<?php echo $subjectsCurriculumn['SubjectsCurriculumn']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class="">
                    <?php echo $this->Html->link($subjectsCurriculumn['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $subjectsCurriculumn['Curriculumn']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($subjectsCurriculumn['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectsCurriculumn['Subject']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($subjectsCurriculumn['Knowledge']['name'], array('controller' => 'knowledges', 'action' => 'view', $subjectsCurriculumn['Knowledge']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($subjectsCurriculumn['Semester']['name'], array('controller' => 'semesters', 'action' => 'view', $subjectsCurriculumn['Semester']['id'])); ?>
                </td>
                <td class=""><?php echo h($subjectsCurriculumn['SubjectsCurriculumn']['typesubject']); ?>&nbsp;</td>

                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $subjectsCurriculumn['SubjectsCurriculumn']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $subjectsCurriculumn['SubjectsCurriculumn']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/subjectsCurriculumns/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
