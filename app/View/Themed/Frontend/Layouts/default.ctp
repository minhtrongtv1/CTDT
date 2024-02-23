<!DOCTYPE html>
<html lang="en">

    <head>
        <?php echo $this->element('header'); ?>
    </head>

    <body>

        <header id="header">
            <?php //echo $this->element('navigation');?>
        </header>


        <div id="content">
            <?php
            
            echo $this->Flash->render();
            echo $this->Flash->render('auth');
            echo $this->fetch('content');
            ?>
        </div>


        <!-- ======= Hero Section ======= -->


        <!-- ======= Footer ======= -->
        <?php echo $this->element('footer'); ?>

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <?php
        echo $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min');
        echo $this->Html->script('/vendor/jquery.easing/jquery.easing.min');
        echo $this->Html->script('/vendor/php-email-form/validate');
        echo $this->Html->script('/vendor/venobox/venobox.min');
        echo $this->Html->script('/vendor/waypoints/jquery.waypoints.min');
        echo $this->Html->script('/vendor/counterup/counterup.min');
        echo $this->Html->script('/vendor/owl.carousel/owl.carousel.min');
        echo $this->Html->script('/vendor/aos/aos');
        ?>

        <!-- Template Main JS File -->
        <?php echo $this->Html->script('main.js'); ?>


    </body>

    <script>
        $(function () {

            var path = window.location.pathname;
            path = path.replace(/\/$/, "");
            path = decodeURIComponent(path);
            $("#header a").each(function () {

                var href = $(this).attr('href');
                if (path === href) {
                    $(this).closest('li').addClass('active');
                    var treeviewmenu = $(this).closest('li').parent();
                    treeviewmenu.parent().addClass('active');
                } else {
                    $(this).closest('li').removeClass('active');
                }
            });
        });
    </script>
</html>