
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> ĐÁNH GIÁ KHÓA HỌC </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('EvaluationResult', array(
    'role' => 'form',
    'class' => 'form-horizontal',
    'inputDefaults' => array(
    'class' => 'form-control',
    )
    )
    );

   
    if (empty($course['Course']['lms_course_id'])) {
        $url = "https://lms.tvu.edu.vn/course/search.php?q=" . $course['Course']['subject_code'];
    } else {
        $url = "https://lms.tvu.edu.vn/course/view.php?id=" . $course['Course']['lms_course_id'];
    }
    
   
    ?>
    <p>Link khóa học: <?php echo $this->Html->link($course['Course']['fullname'], $url, array('target' => "_blank"));?></p>

            <?php echo $this->Form->input('evaluation_round_id', ['label' => 'Đợt đánh giá']); ?>
            <?php echo $this->Form->input('course_id', array('label' => 'Kết quả')); ?>
            <?php echo $this->Form->input('pass', array('label' => 'Kết quả', 'options' => array("" => '-- CHỌN --', 0 => 'KHÔNG ĐẠT', 1 => 'ĐẠT'))); ?>
            <?php echo $this->Form->input('reason', array('label' => 'Lý do không đạt')); ?>
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

