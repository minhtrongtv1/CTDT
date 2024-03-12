<?php
$this->Paginator->options(array(
    'url' => array('ptc' => true, 'action' => 'ptc_index'),
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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã thiết bị'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên thiết bị'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Số lượng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Được sử dụng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Ghi chú'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Device']['page'] - 1) * $this->Paginator->params['paging']['Device']['limit']) + 1; ?>
        <?php foreach ($devices as $device): ?>
            <tr id="row-<?php echo $device['Device']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($device['Device']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['quantity']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['used']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['note']); ?>&nbsp;</td>
                <td class=""><?php echo h($device['Device']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
