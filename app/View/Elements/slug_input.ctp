<?php $this->Html->script('slug', array('block' => 'scriptTop')); ?>

    <?php echo $this->Form->input('slug',array('type'=>'hidden')); ?>

<?php echo $this->Html->script('slug'); ?>
<script>

    $(function () {

        $("#<?php echo $baseFieldId ?>").keyup(function () {
            var Text = $(this).val();
            $("#<?php echo $slugFieldId ?>").val(genSlug(Text));
        });
    });
</script>
