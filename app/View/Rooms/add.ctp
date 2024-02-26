
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Thêm mới phòng'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('Room', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
<<<<<<< HEAD
    <?php echo $this->Form->input('code', ['label' => 'Mã phòng']); ?>
    <?php echo $this->Form->input('name', ['label' => 'Tên phòng']); ?>
    <?php echo $this->Form->input('acreage', ['label' => 'Diện tích(m²)']); ?>
=======
    <?php echo $this->Form->input('code'); ?>
    <?php echo $this->Form->input('name'); ?>
    <?php echo $this->Form->input('acreage'); ?>
    <?php
    echo $this->Form->input('syllabus_filename', array('type' => 'file', 'label' => 'File đề cương:'));
    echo $this->Form->input('syllabus_path', array('type' => 'hidden'));
    ?>
>>>>>>> 8ef84d1d4da18eba1302dd16bffea3059c319665

    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
            &nbsp; &nbsp; &nbsp;
            <?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác', array('action' => 'index'), array('class' => 'btn btn-warning', 'escape' => false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
<<<<<<< HEAD
            <?php echo $this->Form->end(); ?>
=======
    <?php echo $this->Form->end(); ?>
>>>>>>> 8ef84d1d4da18eba1302dd16bffea3059c319665

</div>

