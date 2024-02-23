<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title_for_layout; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <?php
        echo $this->Html->css(array(
            'https:////netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
            'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css',
            'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery.swipebox/1.3.0.2/css/swipebox.min.css',
            'Gallery.bootstrap-editable',
            'Gallery.sweetalert'))
        ?>


        <?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
            <?php
            echo $this->Html->css(
                    array(
                        'Gallery.themes/' . Configure::read('GalleryOptions.App.theme') . '.min'
                    )
            );
            ?>
        <?php } ?>
        <?php echo $this->fetch('scriptTop'); ?>

        <?php echo $this->Html->script('Gallery.lib/modernizr') ?>
        <?php echo $this->fetch('css'); ?>
        
    </head>
    <body class="<?php echo $this->params->params['controller'] . '_' . $this->params->params['action'] ?>"
          data-base-url="<?php echo $this->params->webroot ?>"
          data-plugin-base-url="<?php
          echo $this->Html->url(
                  array('plugin' => 'gallery', 'controller' => 'gallery', 'action' => 'index')
          )
          ?>">

        <div id="canvasup"></div>

        <?php
        echo $this->Html->script(array(
            'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
            'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js',
            'https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery.swipebox/1.3.0.2/js/jquery.swipebox.min.js',
            'Gallery.lib/bootstrap-editable.min',
            'Gallery.lib/mustache.min',
            'Gallery.lib/sweetalert.min'
        ))
        ?>

        <?php echo $this->fetch('js'); ?>

        <?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
            <div class="container">
                <hr>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        <?php } else { ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        <?php } ?>
    </body>
</html>
