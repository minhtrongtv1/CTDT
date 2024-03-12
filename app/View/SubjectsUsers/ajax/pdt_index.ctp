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


            <th class="column-title"><?php echo $this->Paginator->sort('user_id', 'Tên giáo viên'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('subject_id', 'Học phần'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('curriculumn_id', 'Chương trình đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


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
                <td class="">
                    <?php echo $this->Html->link($subjectsUser['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $subjectsUser['Curriculumn']['id'])); ?>
                </td>
                <td class=""><?php echo h($subjectsUser['SubjectsUser']['id']); ?>&nbsp;</td>


            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
