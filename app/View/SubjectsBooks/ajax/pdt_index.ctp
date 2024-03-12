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


            <th class="column-title"><?php echo $this->Paginator->sort('subject_id', 'Tên học phần'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('book_id', 'Tên tài liệu',); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['SubjectsBook']['page'] - 1) * $this->Paginator->params['paging']['SubjectsBook']['limit']) + 1; ?>
        <?php foreach ($subjectsBooks as $subjectsBook): ?>
            <tr id="row-<?php echo $subjectsBook['SubjectsBook']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class="">
                    <?php echo $this->Html->link($subjectsBook['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectsBook['Subject']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($subjectsBook['Book']['name'], array('controller' => 'books', 'action' => 'view', $subjectsBook['Book']['id'])); ?>
                </td>
                <td class=""><?php echo h($subjectsBook['SubjectsBook']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
