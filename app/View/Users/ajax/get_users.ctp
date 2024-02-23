<?php
$this->Paginator->options(array(
    'url' => array('prefix' => false, 'action' => 'getUsers'),
    'update' => '#modal-datarows',
    'evalScripts' => true,
    'before' => '$("#modal-datarows").LoadingOverlay("show")',
    'success' => '$("#modal-datarows").LoadingOverlay("show")',
    //'complete' => "editable()",
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>
<table id="modal-hoc-vien-table" class="<?php echo $divClass ?> table table-bordered table-hover table-condensed table-striped">
    <thead>
        <tr>
            <th>STT</th>            
            <th>Họ và tên</th>
            <th>SĐT</th>
            <th>Email</th>           
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        foreach ($users as $user):
            ?>
            <tr data-id="<?php echo $user['User']['id'] ?>">

                <td><?php echo $stt++; ?></td>
                <td><?php echo $user['User']['name'] ?></td>
                <td><?php echo $user['User']['so_dien_thoai'] ?></td>
                <td><?php echo $user['User']['email'] ?></td>
                

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
echo $this->Js->writeBuffer();
