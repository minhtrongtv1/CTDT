

<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Thêm mới học phần chương trình đào tạo'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('SubjectsCurriculumn', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('curriculumn_id', ['label' => 'Chương trình đào tạo']); ?>
    <?php echo $this->Form->input('subject_id', ['label' => 'Học phần']); ?>
    <?php echo $this->Form->input('knowledge_id', ['label' => 'Khối kiến thức']); ?>
    <?php echo $this->Form->input('programobjective_id', ['label' => 'Chuẩn đầu ra']); ?>
    <?php echo $this->Form->input('semester_id', ['label' => 'Học kỳ']); ?>
    <?php

  

    echo $this->Form->radio('typesubject', array(
        '0' => 'Học phần bắt buộc',
        '1' => 'Học phần tự chọn'
    ),['legend'=>'Loại học phần','separator' => '&nbsp &nbsp &nbsp &nbsp','class' => 'kichthuocchu']);
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

