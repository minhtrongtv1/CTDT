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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã phòng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên phòng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Diện tích (m²)'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Room']['page'] - 1) * $this->Paginator->params['paging']['Room']['limit']) + 1; ?>
        <?php foreach ($rooms as $room): ?>
            <tr id="row-<?php echo $room['Room']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($room['Room']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($room['Room']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($room['Room']['acreage']); ?>&nbsp;</td>
                <td class=""><?php echo h($room['Room']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
