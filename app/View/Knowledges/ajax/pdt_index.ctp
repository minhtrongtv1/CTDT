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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã khối kiến thức'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên khối kiến thức'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('program_objective_id', 'Tên chuẩn đầu ra'); ?></th>





            <th class="column-title"><?php echo $this->Paginator->sort('describe', 'Miêu tả'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Knowledge']['page'] - 1) * $this->Paginator->params['paging']['Knowledge']['limit']) + 1; ?>
        <?php foreach ($knowledges as $knowledge): ?>
            <tr id="row-<?php echo $knowledge['Knowledge']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($knowledge['Knowledge']['code']); ?>&nbsp;</td>

                <td class=""><?php echo h($knowledge['Knowledge']['name']); ?>&nbsp;</td>
                <td class="">
                    <?php echo $this->Html->link($knowledge['ProgramObjective']['id'], array('controller' => 'program_objectives', 'action' => 'view', $knowledge['ProgramObjective']['id'])); ?>
                </td>
                <td class=""><?php echo h($knowledge['Knowledge']['describe']); ?>&nbsp;</td>
                <td class=""><?php echo h($knowledge['Knowledge']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
