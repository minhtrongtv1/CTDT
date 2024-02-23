<?php
$this->Html->addCrumb('Tìm kiếm người dùng', array('controller' => 'users', 'action' => 'search'));
$this->Html->addCrumb('Kết quả');
?>
<table class="table table-hover table-responsive">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Mã số</th>
        <th>SĐT</th>
        <th>Học trường</th>
        <th class="actions">Thao tác</th>
    </tr>
    <?php $stt = 1; ?>
    <?php foreach ($users as $user): ?>
        <tr>
            <th><?php echo $stt++ ?></th>
            <td><?php echo $this->Html->link($user['User']['name'], array('admin' => false, 'plugin' => false, 'controller' => 'users', 'action' => 'xem_hoc_vien', $user['User']['id'])); ?>&nbsp;</td>
            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['so_dien_thoai']); ?>&nbsp;</td>
            <td><?php echo h($user['School']['name']); ?>&nbsp;</td>

        </tr>
    <?php endforeach; ?>
</table>


