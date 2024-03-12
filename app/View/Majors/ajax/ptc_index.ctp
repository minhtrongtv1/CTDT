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




            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã ngành'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên ngành'); ?></th>





            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Major']['page'] - 1) * $this->Paginator->params['paging']['Major']['limit']) + 1; ?>
        <?php foreach ($majors as $major): ?>
            <tr id="row-<?php echo $major['Major']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($major['Major']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($major['Major']['name']); ?>&nbsp;</td>

                <td class=""><?php echo h($major['Major']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
