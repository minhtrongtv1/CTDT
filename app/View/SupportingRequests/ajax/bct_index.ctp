<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php echo $this->Html->css('/select2-4.0.3/css/select2.min'); ?>
<?php echo $this->Html->script('/select2-4.0.3/js/select2.min'); ?>


<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index', 'bct' => true),
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


            <th class="column-title"><?php echo $this->Paginator->sort('title', 'Tiêu đề'); ?></th>

            <th class="column-title"><?php echo $this->Paginator->sort('course_link', 'Link khóa'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('requester_id', 'Người gửi'); ?></th>



            <th class="column-title"><?php echo $this->Paginator->sort('status', 'Tình trạng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('supporter_id', 'Người nhận'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('created', 'Ngày gửi'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>

        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['SupportingRequest']['page'] - 1) * $this->Paginator->params['paging']['SupportingRequest']['limit']) + 1; ?>
        <?php foreach ($supportingRequests as $supportingRequest): ?>
            <tr id="row-<?php echo $supportingRequest['SupportingRequest']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($supportingRequest['SupportingRequest']['title']); ?>&nbsp;</td>
                 <td class=""><?php echo h($supportingRequest['SupportingRequest']['course_link']); ?>&nbsp;</td>
                <td class="">
                    <?php echo $this->Html->link($supportingRequest['Requester']['name'], array('controller' => 'users', 'action' => 'view', $supportingRequest['Requester']['id'])); ?>
                </td>

                <td class=""><?php echo $this->Common->showSupportingRequestStatus($supportingRequest['SupportingRequest']['status']); ?>&nbsp;</td>

                <td class="">
                    <?php echo $this->Html->link($supportingRequest['Supporter']['name'], array('controller' => 'users', 'action' => 'view', $supportingRequest['Supporter']['id'])); ?>
                </td>
                <td class=""><?php echo h($supportingRequest['SupportingRequest']['created']); ?>&nbsp;</td>

                <td class=""><?php echo h($supportingRequest['SupportingRequest']['responsing']); ?>&nbsp;</td>
                <td class=""><?php echo h($supportingRequest['SupportingRequest']['responded_time']); ?>&nbsp;</td>
                <td class=""><?php echo h($supportingRequest['SupportingRequest']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $supportingRequest['SupportingRequest']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    <span class="pull-right">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/supportingRequests/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
</tfoot>
</table>
<?php echo $this->element("pagination"); ?>
<?php
echo $this->Js->writeBuffer();
