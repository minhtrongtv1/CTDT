<?php
if (!isset($fieldName)) {
    $fieldName = 'image';
}
?>
<div class="input">
    <label for="<?php echo $fieldId ?>">Ảnh đại diện</label>
    <div class="input-group">
        <?php echo $this->Form->input($fieldName, ['div' => false, 'label' => false, 'class' => 'form-control']); ?>
        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button" button data-toggle="modal" type="button" data-target="#myModal">Chọn ảnh</button>
        </span>
    </div><!-- /input-group -->
</div>
<div class="modal fade" id="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body" style="padding:0px; margin:0px;">
                <iframe width="590" height="400" src="<?php echo BASE_URL ?>/filemanager/dialog.php?type=1&field_id='<?php echo $fieldId ?>'&akey=asdsdsgF453&relative_url=1" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; " __idm_frm__="3"></iframe>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
