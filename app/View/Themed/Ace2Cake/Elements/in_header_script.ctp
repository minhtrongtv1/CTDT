<!--[if !IE]> -->
<?php
echo $this->Html->meta('ico', '/theme/Frontend/img/favicon.ico', array('type' => 'icon'));
?>
<?php
echo $this->Html->script(['jquery-2.1.4.min']);
?>
<!-- <![endif]-->





<!--[if IE]>
<?php echo $this->Html->script(['jquery-1.11.3.min']); ?>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<?php echo $this->Html->script(['bootstrap.min']); ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php echo $this->Html->script('/jquery.overlay.loader/src/loadingoverlay.min'); ?>
<!-- bootstrap & fontawesome -->
<?php
echo $this->Html->css([
    'bootstrap.min',
        //'/font-awesome/4.7/css/font-awesome.min',
]);
?>



<!-- page specific plugin styles -->

<!-- text fonts -->

<?php
//echo $this->Html->css(['fonts.googleapis.com']);
?>

<!-- ace styles -->

<?php
echo $this->Html->css(['ace.min'], ['class' => "ace-main-stylesheet", 'id' => "main-ace-style"]);
?>



<!--[if lte IE 9]>
<?php
echo $this->Html->css(['ace-part2.min'], ['class' => "ace-main-stylesheet"]);
?>        
<![endif]-->

<?php
//echo $this->Html->css(['ace-skins.min', 'ace-rtl.min']);
?>
<?php
echo $this->Html->css(['ace-skins.min']);
?>

<!--[if lte IE 9]>
<?php
echo $this->Html->css(['ace-ie.min']);
?>
<![endif]-->



<!-- inline styles related to this page -->

<!-- ace settings handler -->
<?php
echo $this->Html->script(['ace-extra.min','toastr.min','show_toast_msg']);
?>
<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<?php
echo $this->Html->script(['html5shiv.min', 'respond.min']);
?>
<![endif]-->

<?php
echo $this->Html->css(array('pace','toastr.min'));
echo $this->Html->script('pace.min');
echo $this->fetch('css');
echo $this->fetch('js');






