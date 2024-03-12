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

            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên chương trình đào tạo tham khảo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('curriculumn_id', 'Chương trình đào tạo tham khảo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['CurriculumnsReference']['page'] - 1) * $this->Paginator->params['paging']['CurriculumnsReference']['limit']) + 1; ?>
        <?php foreach ($curriculumnsReferences as $curriculumnsReference): ?>
            <tr id="row-<?php echo $curriculumnsReference['CurriculumnsReference']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($curriculumnsReference['CurriculumnsReference']['name']); ?>&nbsp;</td>
                <td class="">
                    <?php echo $this->Html->link($curriculumnsReference['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $curriculumnsReference['Curriculumn']['id'])); ?>
                </td>
                <td class=""><?php echo h($curriculumnsReference['CurriculumnsReference']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
