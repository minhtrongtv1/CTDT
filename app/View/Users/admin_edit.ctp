<?php $this->Html->script('moment.min', array('block' => 'scriptTop')) ?>


<?php echo $this->Html->css('bootstrap-datepicker3.min') ?>

<?php echo $this->Html->script('bootstrap-datepicker.min', array('block' => 'scriptTop')) ?>
<?php
echo $this->Html->script('/select2-4.0.3/js/select2.full', array('block' => 'scriptTop'));
echo $this->Html->script('/select2-4.0.3/js/i18n/vi', array('block' => 'scriptTop'));
echo $this->Html->css('/select2-4.0.3/css/select2.min', array('block' => 'scriptTop'));
echo $this->Html->css('/select2-4.0.3/css/select2-bootstrap.min', array('block' => 'scriptTop'));
?>
<script>
    $(function () {
        //datepicker plugin
        //link
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function () {
            $(this).prev().focus();
        });
    });
</script>


<?php
echo $this->Form->create('User', array(
    'type' => 'file',
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => array(
            'class' => 'col col-sm-2 control-label'
        ),
        'wrapInput' => 'col col-sm-6',
        'class' => 'form-control'
    ),
    'class' => 'well form-horizontal', 'id' => 'addTeacher'
));
?>
<fieldset>
    <legend>Cập nhật thông tin người dùng dùng</legend>
    <?php
    $today = new DateTime();
    echo $this->Form->input('id');
    echo $this->Form->input('last_name', array('label' => 'Họ lót'));
    echo $this->Form->input('first_name', array('label' => 'Tên'));

    echo $this->Form->input('gender', array('label' => 'Giới tính', 'empty' => '-- Chọn giới tính --', 'type' => 'select', 'options' => array('0' => 'Nữ', '1' => 'Nam')));
    echo $this->Form->input('department_id', array('label' => 'Đơn vị', 'escape' => false));
    ?>
    <div class="form-group">
        <label for="id-date-picker-1">Ngày sinh</label>

        <div class="input-group">

            <?php
            echo $this->Form->input('ngay_sinh', array('div' => false, 'class' => 'form-control date-picker', 'type' => 'text',
                "data-date-format" => "dd/mm/yyyy", 'label' => false, 'after' => '<span class="input-group-addon">
                                                                        <i class="fa fa-calendar bigger-110"></i>
                                                                    </span>
                                                                    '));
            ?>
        </div>

    </div>

    <?php
    echo $this->Form->input('so_dien_thoai', array('label' => 'Số điện thoại'));

    echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control'));

    echo $this->Form->input('address', array('label' => 'Địa chỉ'));

    echo $this->Form->input('Group', array('label' => 'Nhóm'));
    ?>
    <label>
        <?php
        echo $this->Form->input('activated', array(
            'label' => false,
            'type' => 'checkbox',
            'class' => "ace",
            'after' => '<span class="lbl"> Đã kích hoạt</span>'
        ));
        ?>
    </label>
    <?php
    echo $this->Form->input('username', array('label' => 'Tên đăng nhập'));
    ?>
</fieldset>
<div class="btn-toolbar" style="text-align: center;
     ">
         <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
         <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>

    <?php echo $this->Form->end(); ?>
</div>



<script>
    function emailUsername(emailAddress)
    {
        return emailAddress.substring(0, emailAddress.indexOf("@"));
    }
    $(document).ready(function () {
        $("#UserDepartmentId").select2();
        $('#UserEmail').keyup(function () {
            var username = emailUsername($(this).val());
            $("#UserUsername").val(username);
            return true;
        });
    });
</script>