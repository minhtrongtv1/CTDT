
<?php echo $this->Form->create(null, array('url' => array('action' => 'changeLayout', 'admin' => false, 'plugin' => false), 'id' => 'changeLayoutForm', 'class' => 'navbar-form navbar-left form-search')); ?>
<div class="form-group">
    <label for="layout" style="color: #ffffff">Chọn giao diện</label>
    <select name="layout" id="layout_select_box">
        <?php
        $logginUserGroup = SessionComponent::read('LogginUserGroup');

        foreach ($logginUserGroup as $group):
            ?>
            <option value="<?php echo $group['alias'] ?>"><?php echo $group['name'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<?php echo $this->Form->end(); ?>
<script>
    $(function () {
        $("select[name=layout] option[value=<?php echo $this->Session->read('LAYOUT'); ?>]").attr('selected', 'selected');

        $("#layout_select_box").change(function () {
            //alert(1);
            $('#changeLayoutForm').submit();
        });
    });
</script>
