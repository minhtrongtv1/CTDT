<?php
$this->Paginator->options(array(
    'url' => array('pkt' => true, 'action' => 'pkt_index'),
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

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th><input type="checkbox" id="check-all" </th>
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
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $infrastructure['Infrastructure']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>
                <td>
                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $infrastructure['Infrastructure']['id'] ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/infrastructures/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
