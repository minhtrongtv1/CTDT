<?php $this->Html->script('moment.min', array('block' => 'scriptTop')) ?>
<?php echo $this->Html->css('bootstrap-datepicker3.min') ?>
<?php echo $this->Html->script('bootstrap-datepicker.min', array('block' => 'scriptTop')) ?>
<?php
echo $this->Html->script('/select2-4.0.3/js/select2.min', array('block' => 'scriptTop'));
echo $this->Html->script('/select2-4.0.3/js/i18n/vi', array('block' => 'scriptTop'));
echo $this->Html->css('/select2-4.0.3/css/select2.min', array('block' => 'scriptTop'));
//echo $this->Html->css('/select2-4.0.3/css/select2-bootstrap.min', array('block' => 'scriptTop'));
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

        $('a[data-toggle="tab"]').on('click', function () {
            if ($(this).parent('li').hasClass('disabled')) {
                return false;
            }
            ;
        });

    });
</script>
<div class="container">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> Đăng ký học viên mới </a>
    </h4>
    <div class="tabbable">
        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
            <li class="active">
                <a data-toggle="tab" href="#thong-tin-chung" aria-expanded="false">Thông tin chung</a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#nguoi-than" aria-expanded="true" class="disabled">Người thân</a>
            </li>

        </ul>
        <div class="tab-content">
            <div id="thong-tin-chung" class="tab-pane active">
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

                    <?php
                    $today = new DateTime();
                    echo $this->Form->input('last_name', array('label' => 'Họ lót'));
                    echo $this->Form->input('first_name', array('label' => 'Tên'));
                    echo $this->Form->input('gender', array('label' => 'Giới tính', 'empty' => '-- Chọn giới tính --', 'type' => 'select', 'options' => array('0' => 'Nữ', '1' => 'Nam')));
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
                    echo $this->Form->input('school_id', array('label' => 'Học trường', 'empty' => '-- chọn --'));
                    //echo $this->Form->input('noi_sinh', array('label' => 'Nơi sinh', 'options' => $noiSinhes, 'empty' => '..chọn nơi sinh'));
                    echo $this->Form->input('address', array('label' => 'Địa chỉ'));
                    ?>
                </fieldset>
                <div class="btn-toolbar" style="text-align: center;">
                    <?php echo $this->Html->link('Học viên', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
                    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>

                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div id="nguoi-than" class="tab-pane">
                <p>Hãy lưu thông tin học viên rồi tiếp tục.</p>

            </div>
        </div>
    </div>


</div>
<script>

    $(document).ready(function () {
        $("#UserLastName").focus();
        $("#UserSchoolId").select2({
                    placeholder: "--chọn trường học--",
                    allowClear: true
                });
    });

</script>