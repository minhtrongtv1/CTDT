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
    <?php echo $this->Form->input('curriculumn_id', ['label' => 'Chương trình đào tạo']); ?>
    <?php echo $this->Form->input('program_outcome_id', ['label' => 'Mục tiêu đào tạo']); ?>
    <?php echo $this->Form->input('code', ['label' => 'Mã chuẩn đầu ra']); ?>
    <?php echo $this->Form->input('describe', ['label' => 'Miêu tả']); ?>
    <?php echo $this->Form->input('level', ['label' => 'Trình độ']); ?>
<<<<<<< HEAD
    <?php
    echo $this->Form->input('group_type', array('type' => 'select', 'options' => array('PO1' => 'PO1',
            'PLO2' => 'PLO2',
            'PLO3' => 'PLO3'), 'label' => 'Loại nhóm chuẩn đầu ra'));
    ?>
    <?php echo $this->Form->input('id'); ?>
=======
    <?php echo $this->Form->input('group_type', ['label' => 'Loại nhóm chuẩn đầu ra']); ?>
<?php echo $this->Form->input('id'); ?>
>>>>>>> 44514db2cc53104cda8971bc7720054e20440c14

    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
            &nbsp; &nbsp; &nbsp;
<?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác', array('action' => 'index'), array('class' => 'btn btn-warning', 'escape' => false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
<?php echo $this->Form->end(); ?>

