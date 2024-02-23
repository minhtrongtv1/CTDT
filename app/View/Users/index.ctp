<?php
$this->Html->addCrumb('Danh sách học viên', array('action' => 'index'));
//$this->Html->addCrumb('Cập nhật thông tin lớp');
?>
<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'before' => '$("#datarows").LoadingOverlay("show");',
    'success' => '$("#datarows").LoadingOverlay("hide");',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?>

    <div class="">
        <div class="box-header">
            <h3 class="box-title" style="font-family: arial">DANH SÁCH HỌC VIÊN
                <?php echo $this->Html->link('Thêm học viên', array('action' => 'add'), array('class' => 'btn btn-success')); ?>

            </h3>
            <div id="commentStatus"></div>
            <div id="filter" class="well">
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
                echo $this->Form->input('name', array('label' => false, 'required' => false, 'placeholder' => 'Họ tên'));
                echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Mã số/username', 'required' => false));
                echo $this->Form->input('so_dien_thoai', array('label' => false, 'placeholder' => 'số điện thoại', 'required' => false));
                echo $this->Form->month('thang_sinh', array('monthNames' => false, 'label' => false, 'empty' => '-- Sinh vào tháng --', 'required' => false));
                ?>
                <button type="submit" class="btn btn-primary btn-sm ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">Tìm</span></button>
                <?php
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>

    <div class="box-body" id="datarows">

        <table class="table table-hover table-responsive">
            <tr>
                <th>STT</th>
                <th><?php echo $this->Paginator->sort('last_name', 'Họ lót'); ?></th>
                <th><?php echo $this->Paginator->sort('first_name', 'Tên'); ?></th>
                <th><?php echo $this->Paginator->sort('username', 'Mã số'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('so_dien_thoai', 'Số điện thoại'); ?></th>
                <th><?php echo $this->Paginator->sort('ngay_sinh', 'Ngày sinh'); ?></th>
                <th><?php echo $this->Paginator->sort('school_id', 'Học trường'); ?></th>
                <th><?php echo $this->Paginator->sort('created', 'Ngày tạo'); ?></th>
                <th class="actions">Thao tác</th>
            </tr>
            <?php $stt = ($this->Paginator->param('page') - 1) * $this->Paginator->param('limit') + 1; ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th><?php echo $stt++ ?></th>
                    <td><?php echo $this->Html->link($user['User']['last_name'], array('action' => 'edit', $user['User']['id'])); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link($user['User']['first_name'], array('action' => 'edit', $user['User']['id'])); ?>&nbsp;</td>

                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['so_dien_thoai']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['ngay_sinh']); ?></td>
                    <td><?php echo h($user['School']['name']); ?>&nbsp;</td>
                    <td><?php echo $this->Time->format('H:i d/m/Y', $user['User']['created']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Form->postLink('<button type="button" class="btn btn-warning">
                        <span class="glyphicon glyphicon-trash"></span></button>', array('action' => 'delete', $user['User']['id']), array('escape' => false, 'data-toggle' => "tooltip", 'data-placement' => "top", 'title' => "Xóa"), __('Bạn có chắc xóa "%s"?', $user['User']['name'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $this->element('pagination'); ?>
    </div>


<script>

    $(function () {
        $('#filter-form').on('submit', function (e) {
            e.preventDefault();
            $("#datarows").LoadingOverlay('show');
            var data = $(this).serialize();
            $.post("<?php echo BASE_URL ?>/users/index", data, function (response) {
                $("#datarows").html(response);
                $("#datarows").LoadingOverlay('hide');
            });

        });
    })</script>
<?php
echo $this->Js->writeBuffer();
