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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã cơ sở vật chất'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên thiết bị'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Tên phòng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Tên chương trình đào tạo'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Infrastructure']['page'] - 1) * $this->Paginator->params['paging']['Infrastructure']['limit']) + 1; ?>
        <?php foreach ($infrastructures as $infrastructure): ?>
            <tr id="row-<?php echo $infrastructure['Infrastructure']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($infrastructure['Infrastructure']['code']); ?>&nbsp;</td>
                <td class="">
                    <?php echo $this->Html->link($infrastructure['Device']['name'], array('controller' => 'devices', 'action' => 'view', $infrastructure['Device']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($infrastructure['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $infrastructure['Room']['id'])); ?>
                </td>
                <td class="">
                    <?php echo $this->Html->link($infrastructure['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $infrastructure['Curriculumn']['id'])); ?>
                </td>
                <td class=""><?php echo h($infrastructure['Infrastructure']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
