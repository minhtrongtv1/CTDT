<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right green"></i>
    <a href="#" class="blue"> <?php echo __('Add Group'); ?> </a>
</h4>
<div class="hr hr-18 dotted hr-double"></div>


<?php
echo $this->Form->create('Group', array(
    'role' => 'form',
    'class' => 'form-horizontal',
    'novalidate' => '',
    'inputDefaults' => array(
        'div' => 'form-group',
        'class' => 'form-control',
        'label' => array('class' => 'col-sm-3 control-label no-padding-right'),
        'between' => '<div class="col-sm-9">',
        'after' => '</div>')
        )
);
?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('alias'); ?>
<?php echo $this->Form->input('order'); ?>
<?php echo $this->Form->input('image'); ?>
<?php echo $this->Form->input('image_path'); ?>
<?php echo $this->Form->input('decription'); ?>
<?php echo $this->Form->input('User'); ?>

<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
        &nbsp; &nbsp; &nbsp;
        <?php echo $this->Form->button('<i class="ace-icon fa fa-undo bigger-110"></i>Reset', array('class' => 'btn btn-info', 'type' => 'reset')); ?>

    </div>
</div>
<div class="hr hr-24"></div>
<?php echo $this->Form->end(); ?>

