<?php
if (!isset($fieldName)) {
    $fieldName = 'image';
}
?>
<div class="form-group text required">
    <label class="control-label" for="<?php echo $fieldName ?>"><?php echo $label ?></label>
    <div class="input-group">
        <?php echo $this->Form->input($fieldName, ['div' => false, 'label' => false, 'class' => 'form-control']); ?>
        <span class="input-group-btn">
            <button class="btn btn-default btn-sm" type="button" button data-toggle="modal" type="button" data-target="#myModal<?php echo $fieldName?>">Chọn..</button>
        </span>
    </div><!-- /input-group -->
</div>
<div class="modal fade" id="myModal<?php echo $fieldName?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body" style="padding:0px; margin:0px;">
                <iframe width="590" height="400" src="/qlvb/filemanager/dialog.php?&relative_url=0&field_id='<?php echo $fieldId ?>'&akey=asdsdsgF453" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; " __idm_frm__="3"></iframe>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
