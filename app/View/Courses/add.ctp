
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Add Course'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php echo $this->Form->create('Course', array(
            'role'=>'form',
            'class' => 'form-horizontal',
            'inputDefaults' => array(
                
                'class' => 'form-control',
               )
            )
        ); ?>
    						<?php echo $this->Form->input('fullname'); ?>
						<?php echo $this->Form->input('shortname'); ?>
						<?php echo $this->Form->input('startdate'); ?>
						<?php echo $this->Form->input('scholastic'); ?>
						<?php echo $this->Form->input('semester'); ?>
						<?php echo $this->Form->input('subject_code'); ?>
						<?php echo $this->Form->input('subject_name'); ?>
						<?php echo $this->Form->input('subject_class'); ?>
						<?php echo $this->Form->input('department_id'); ?>
						<?php echo $this->Form->input('lms_created_date'); ?>
						<?php echo $this->Form->input('lms_modified_date'); ?>

    <div class="clearfix form-actions">
        <div class="pull-right">
            					<?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info','type'=>'submit')); ?>
            &nbsp; &nbsp; &nbsp;
            					<?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác',array('action'=>'index') ,array('class' => 'btn btn-warning','escape'=>false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
    			<?php echo $this->Form->end(); ?>

</div>

