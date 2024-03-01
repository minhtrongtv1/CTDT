<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?>
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Thay đổi thông tin học phần'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('Subject', array(
        'type' => 'file',
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('code', ['label' => 'Mã học phần']); ?>
    <?php echo $this->Form->input('name', ['label' => 'Tên học phần']); ?>
    <?php echo $this->Form->input('theory_credit', ['label' => 'Số tín chỉ lý thuyết']); ?>
    <?php echo $this->Form->input('practice_credit', ['label' => 'Số tín chỉ thực hành']); ?>
    <?php echo $this->Form->input('theory_hour', ['label' => 'Số giờ lý thuyết']); ?>
    <?php echo $this->Form->input('practice_hour', ['label' => 'Số giờ thực hành']); ?>
    <?php echo $this->Form->input('self_learning_time', ['label' => 'Số giờ tự học']); ?>
    <?php echo $this->Form->input('note', ['label' => 'Ghi chú']); ?>
    <?php echo $this->Form->input('describe', ['label' => 'Miêu tả']); ?>

    <?php
    echo $this->Form->input('syllabus_filename', array('type' => 'file', 'label' => 'File đề cương:'));
    echo $this->Form->input('syllabus_path', array('type' => 'hidden'));
    ?>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var theoryCreditInput = document.getElementById("SubjectTheoryCredit");
        var practiceCreditInput = document.getElementById("SubjectPracticeCredit");
        var theoryHourInput = document.getElementById("SubjectTheoryHour");
        var practiceHourInput = document.getElementById("SubjectPracticeHour");
        var selfLearningTimeInput = document.getElementById("SubjectSelfLearningTime");

        function calculateSelfLearningTime() {
            var theoryCredit = parseInt(theoryCreditInput.value);
            var practiceCredit = parseInt(practiceCreditInput.value);

//            var theoryHour = 0;
//            var practiceHour = 0;
            var theoryHour = 15;
            var practiceHour = 30;
            if (theoryCredit === parseInt(theoryCreditInput.value)) {
                theoryHour = theoryCredit * 15;
            }
            if (practiceCredit === parseInt(practiceCreditInput.value)) {
                practiceHour = practiceCredit * 30;
            }

            theoryHourInput.value = theoryHour;
            practiceHourInput.value = practiceHour;

            var selfLearningTime = ((theoryCredit + practiceCredit) * 50) - ((15 * theoryCredit) + (30 * practiceCredit));
            selfLearningTimeInput.value = selfLearningTime;
        }

        theoryCreditInput.addEventListener("input", calculateSelfLearningTime);
        practiceCreditInput.addEventListener("input", calculateSelfLearningTime);
    });
</script> 
<?php
echo $this->Js->writeBuffer();
