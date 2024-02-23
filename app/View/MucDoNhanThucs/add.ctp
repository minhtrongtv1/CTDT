
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Add Muc Do Nhan Thuc'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('MucDoNhanThuc', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('level',array('label'=>'Mức (Số nguyên)')); ?>
    <?php echo $this->Form->input('name',array('label'=>'Tên mức')); ?>
    <?php echo $this->Form->input('english_name',array('label'=>'Tên mức bằng Tiếng Anh')); ?>
    <?php echo $this->Form->input('describe',array('label'=>'Miêu tả')); ?>
    <?php echo $this->Form->input('linh_vuc_nhan_thuc_id',array('label'=>'Lĩnh vực nhận thức')); ?>

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

