
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> Thêm thí sinh hùng biện </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('ThiSinhHungBien', array(
        'role' => 'form',
        'type' => 'file',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('ho_va_ten', array('label' => 'Họ và tên')); ?>
    <?php
    echo $this->Form->input('so_bao_danh', array('label' => 'Số báo danh'));
    echo $this->Form->input('so_dien_thoai', array('label' => 'Số điện thoại'));
    echo $this->Form->input('email', array('label' => 'Email'));
    echo $this->Form->input('khoa', array('label' => 'Khoa'));
    echo $this->Form->input('nam_du_thi', array('label' => 'Năm dự thi'));
    echo $this->Form->input('vao_chung_ket', array('label' => 'Vào chung kết'));
    echo $this->Form->input('anh_dai_dien', array('type' => 'file', 'label' => 'Ảnh đại diện:'));
    echo $this->Form->input('anh_dai_dien_path', array('type' => 'hidden'));
    ?>

    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
            &nbsp; &nbsp; &nbsp;
            <?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác', array('action' => 'index'), array('class' => 'btn btn-warning', 'escape' => false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
    <?php echo $this->Form->end(); ?>

</div>

