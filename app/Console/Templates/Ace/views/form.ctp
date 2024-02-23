<?php
$hideFields = array('created', 'modified', 'lft', 'rght', 'ghi_chu', 'mieu_ta');
$fields = array_diff($fields, $hideFields);
?>

<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php echo "<?php echo \$this->Form->create('{$modelClass}', array(
            'role'=>'form',
            'class' => 'form-horizontal',
            'inputDefaults' => array(
                
                'class' => 'form-control',
               )
            )
        ); ?>\n"; ?>
    <?php
    foreach ($fields as $field) {
        if (strpos($action, 'add') !== false && $field == $primaryKey) {
            continue;
        } elseif (!in_array($field, array('created', 'modified', 'updated'))) {

            echo "\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}'); ?>\n";
        }
    }
    if (!empty($associations['hasAndBelongsToMany'])) {
        foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
            echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}');?>\n";
        }
    }
    echo "\n";
    ?>
    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php
            echo "\t\t\t\t\t<?php echo \$this->Form->button('<i class=\"ace-icon fa fa-check bigger-110\"></i>Lưu', array('class' => 'btn btn-info','type'=>'submit')); ?>\n";
            ?>
            &nbsp; &nbsp; &nbsp;
            <?php
            echo "\t\t\t\t\t<?php echo \$this->Html->link('<i class=\"ace-icon fa fa-undo bigger-110\"></i>Hủy thao tác',array('action'=>'index') ,array('class' => 'btn btn-warning','escape'=>false)); ?>\n";
            ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
    <?php echo "\t\t\t<?php echo \$this->Form->end(); ?>\n"; ?>

</div>

