
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> Cập nhật thông tin Workshop </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('Workshop', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('chapter_id',array('label'=>'Chuyên đề')); ?>
    <?php echo $this->Form->input('name',array('label'=>'Tên tập huấn')); ?>
    <?php echo $this->Form->input('so_luong_dang_ky_toi_da',array('label'=>'Số lượng đăng ký tối đa')); ?>
    <?php echo $this->Form->input('status',array('label'=>'Tình trạng','options'=>$this->Common->getStatus())); ?>
    <br>
    <?php echo $this->Form->input('start_date',array('label'=>'Ngày bắt đầu: ','class'=>false)); ?>
    <br>
    <?php echo $this->Form->input('lms_course_link',array('label'=>'LMS link')); ?>
    <?php echo $this->Form->input('description',array('label'=>'Miêu tả')); ?>

    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
            &nbsp; &nbsp; &nbsp;
<?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác', array('admin'=>true,'action' => 'index'), array('class' => 'btn btn-warning', 'escape' => false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
<?php echo $this->Form->end(); ?>

</div>

