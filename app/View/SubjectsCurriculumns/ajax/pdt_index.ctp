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


            <th class="column-title"><?php echo $this->Paginator->sort('subject_id', 'Học phần'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('knowledge_id', 'Khối kiến thức'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('semester_id', 'Học kỳ'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('typesubject', 'Loại học phần'); ?></th>

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


            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
