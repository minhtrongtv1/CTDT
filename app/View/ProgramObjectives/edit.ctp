
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Thay đổi thông tin chuẩn đầu ra'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('ProgramObjective', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('group_type', ['label' => 'Loại nhóm chuẩn đầu ra']); ?>
    <?php echo $this->Form->input('name', ['label' => 'Tên chuẩn đầu ra']); ?>
    <?php echo $this->Form->input('category', ['label' => 'Thể loại']); ?>
    <?php echo $this->Form->input('describe', ['label' => 'Miêu tả']); ?>
    <?php echo $this->Form->input('level', ['label' => 'Trình độ']); ?>
<?php echo $this->Form->input('id'); ?>

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

