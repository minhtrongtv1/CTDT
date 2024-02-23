<!DOCTYPE HTML>
<html>
    <head>
        <title>Công ty Giáo dục Kỹ năng THUẬN PHÁT | Trang thông báo nâng cấp</title>

        <?php echo $this->Html->css('style'); ?>
        <link href='http://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300' rel='stylesheet' type='text/css'>
        <style>

        </style>
    </head>
    <body>
        <div class="content">
            <div class="wrap">
                <?php
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                echo $this->fetch('content');
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </body>
</html>
