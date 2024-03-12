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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã học kỳ'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên học kỳ'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Semester']['page'] - 1) * $this->Paginator->params['paging']['Semester']['limit']) + 1; ?>
        <?php foreach ($semesters as $semester): ?>
            <tr id="row-<?php echo $semester['Semester']['id'] ?>">
                <td><?php echo $stt++; ?></td>
                <td class=""><?php echo h($semester['Semester']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($semester['Semester']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($semester['Semester']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
