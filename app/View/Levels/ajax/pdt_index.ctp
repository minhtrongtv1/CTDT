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


            <th class="column-title"><?php echo $this->Paginator->sort('code','Mã trình độ đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name','Tên trình độ đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Level']['page'] - 1) * $this->Paginator->params['paging']['Level']['limit']) + 1; ?>
        <?php foreach ($levels as $level): ?>
            <tr id="row-<?php echo $level['Level']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($level['Level']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($level['Level']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($level['Level']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
