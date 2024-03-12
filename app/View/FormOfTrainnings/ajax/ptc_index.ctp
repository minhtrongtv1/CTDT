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




            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên hình thức đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['FormOfTrainning']['page'] - 1) * $this->Paginator->params['paging']['FormOfTrainning']['limit']) + 1; ?>
        <?php foreach ($formOfTrainnings as $formOfTrainning): ?>
            <tr id="row-<?php echo $formOfTrainning['FormOfTrainning']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($formOfTrainning['FormOfTrainning']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($formOfTrainning['FormOfTrainning']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
