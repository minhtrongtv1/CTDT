<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?>
<div class="container">
    <div class="">
        <div class="box-header">
            <h3 class="box-title" style="font-family: arial">DANH SÁCH NGƯỜI DÙNG 
                <?php echo $this->Html->link('Thêm mới', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

            </h3>
            <div id="commentStatus"></div>
            <div id="filter">
                <?php
//Search
                echo $this->Form->create(null, array(
                    'inputDefaults' => array(
                        'div' => 'form-group',
                        'label' => false,
                        'wrapInput' => false,
                        'class' => 'form-control'
                    ),
                    'class' => 'form-inline',
                    'id' => 'filter-form'
                ));
                ?>
                <?php
                $name = "";
                $username = "";

                if ($this->Session->check('USER_INDEX_FILTER')) {
                    $USER_INDEX_FILTER = $this->Session->read('USER_INDEX_FILTER');
                    if (isset($USER_INDEX_FILTER['User']['name'])) {
                        $name = $USER_INDEX_FILTER['User']['name'];
                    }
                    if (isset($USER_INDEX_FILTER['User']['username'])) {
                        $username = $USER_INDEX_FILTER['User']['username'];
                    }
                }
                //if(isset())
                echo $this->Form->input('name', array('label' => false, 'required' => false, 'placeholder' => 'Họ tên', 'value' => $name));
                echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Mã số/username', 'required' => false, 'value' => $username));
                echo $this->Form->input('so_dien_thoai', array('label' => false, 'placeholder' => 'số điện thoại', 'required' => false));
                echo $this->Form->month('thang_sinh', array('monthNames' => false, 'label' => false, 'empty' => '-- Sinh vào tháng --', 'required' => false));
                echo $this->Form->input('group_id', array('label' => false, 'empty' => 'Nhóm', 'required' => false));
                ?>
                <button type="submit" class="btn btn-primary btn-sm ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">Tìm</span></button>
                <?php
                echo $this->Form->end();
                ?>
            </div>

        </div>
        <div class="box-body" id="datarows">

            <table class="table table-hover table-responsive">
                <tr>
                    <th>STT</th>
                    <th><?php echo $this->Paginator->sort('last_name', 'Họ lót'); ?></th>
                    <th><?php echo $this->Paginator->sort('first_name', 'Tên'); ?></th>                    
                    <th><?php echo $this->Paginator->sort('ngay_sinh', 'Ngày sinh'); ?></th>
                    <th><?php echo $this->Paginator->sort('noi_sinh', 'Nơi sinh'); ?></th>
                    <th><?php echo $this->Paginator->sort('username', 'Tên đăng nhập'); ?></th>
                    <th>Nhóm</th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('so_dien_thoai', 'Số điện thoại'); ?></th>
                    <th><?php echo $this->Paginator->sort('activated', 'Đã kích hoạt'); ?></th>

                    <th style="width:5%"><?php echo $this->Paginator->sort('last_login', 'Lần đăng nhập cuối'); ?></th>
                    <th class="actions">Thao tác</th>
                </tr>
                <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <th><?php echo $stt++ ?></th>
                        <td><?php echo $this->Html->link($user['User']['last_name'], array('admin' => true, 'action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($user['User']['first_name'], array('admin' => true, 'action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['ngay_sinh']); ?>&nbsp;</td>
                        <td><?php echo h($user['NoiSinh']['name']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                        <td>
                            <?php
                            foreach ($user['Group'] as $group) {
                                echo $group['name'] . '; ';
                            }
                            ?>

                        </td>

                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['so_dien_thoai']); ?>&nbsp;</td>

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
                        <span class="glyphicon glyphicon-edit"></span></button>', array('admin' => true, 'action' => 'edit', $user['User']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "top", 'title' => "Sửa")); ?>
                            <?php echo $this->Html->link('<button type="button" class="btn btn-info">
                        <span class="fa fa-key"></span></button>', array('admin' => false, 'action' => 'changeUserPassword', $user['User']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "top", 'title' => "Đổi mật khẩu")); ?>

                            <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-trash"></span></button>', array('admin' => false, 'action' => 'delete', $user['User']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "top", 'title' => "Xóa"), __('Bạn có chắc xóa "%s"?', $user['User']['name'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php echo $this->element('pagination'); ?>


        </div>

    </div>
</div>
<script>

    $(function () {
        $('#filter-form').on('submit', function (e) {
            e.preventDefault();
            //Pace.start();
            var data = $(this).serialize();
            $.post("<?php echo BASE_URL ?>/admin/users/index", data, function (response) {
                $("#datarows").html(response);
                //Pace.stop();
            });

        });
    })</script>
<?php
echo $this->Js->writeBuffer();
