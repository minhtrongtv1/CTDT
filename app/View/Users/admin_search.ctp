<table class="table table-hover">
    <tr>
        <th>STT</th>
        <th><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
        <th><?php echo $this->Paginator->sort('Tên đăng nhập'); ?></th>
        <th><?php echo $this->Paginator->sort('email'); ?></th>
        <th><?php echo $this->Paginator->sort('Số điện thoại'); ?></th>
        <th><?php echo $this->Paginator->sort('Đơn vị'); ?></th>
        <th><?php echo $this->Paginator->sort('activated', 'Đã kích hoạt'); ?></th>
        <th style="width:5%"><?php echo $this->Paginator->sort('last_login', 'Lần đăng nhập cuối'); ?></th>
        <th>Thao tác</th>
    </tr>
    <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
    <?php foreach ($users as $user): ?>
        <tr>
            <th><?php echo $stt++ ?></th>
            <td><?php echo $this->Html->link($user['User']['name'], array('admin' => true, 'action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['so_dien_thoai']); ?>&nbsp;</td>
            <td><?php echo h($user['Department']['name']); ?>&nbsp;</td>
            <td><?php
                if ($user['User']['activated'] == 1)
                    echo 'Có';
                else
                    echo 'Không';
                ?>&nbsp;</td>
            <td><?php
                if ($user['User']['last_login']) {
                    $last_login = new DateTime($user['User']['last_login']);
                    echo $last_login->format('H:i') . ', ngày: ' . $last_login->format('d/m/Y');
                }
                ?>&nbsp;</td>
            <td class="actions">

                <?php echo $this->Html->link('<button type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span></button>', array('manager' => true, 'action' => 'edit', $user['User']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "top", 'title' => "Sửa")); ?>
                <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-trash"></span></button>', array('action' => 'delete', $user['User']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "top", 'title' => "Xóa"), __('Bạn có chắc xóa "%s"?', $user['User']['name'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Trang {:page} của {:pages} trang, hiển thị {:current} của {:count} tất cả, bắt đầu từ {:start}, đến {:end}')
    ));
    ?>	
</p>
<?php
echo $this->Paginator->pagination(array(
    'ul' => 'pagination'
));
?>