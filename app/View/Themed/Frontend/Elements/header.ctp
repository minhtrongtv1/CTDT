<meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <meta content="Trường Đại học Trà Vinh, trung tâm hỗ trợ phát triển dạy và học" name="keywords">
        <title><?php echo (empty($title)) ? $this->Session->read('LAYOUT') . ' - ' . SITENAME : $title; ?></title>
        <meta name="description" content="Cổng thông tin quản lý dữ liệu - Trung tâm Hỗ trợ - Phát triển Dạy và Học" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" >
        <link rel="canonical" href="<?php Router::url() ?>">
        <meta name="robots" content="index,follow,noodp" /><meta name="robots" content="noarchive">
        <meta property="og:site_name" content="<?php echo SITENAME ?>" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:url" ontent="<?php echo Router::url(); ?>"  />
        <meta property="fb:app_id" content="499918907693997" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo (empty($title)) ? $this->Session->read('LAYOUT') . ' - ' . SITENAME : $title; ?>" /><!-- comment -->

        <meta property="og:description"   content="(<?php echo (empty($description)) ? SITENAME : ($description) ?>)" />

        <?php if (!empty($og_image)): ?>
            <meta property="og:image" content="<?php echo $this->Html->assetUrl($og_image, array('fullBase' => true, 'pathPrefix' => IMAGES_URL)) ?>" /><!-- comment -->
        <?php endif; ?>




        <!-- Favicons -->

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet"> 




        <!-- Vendor CSS Files -->
        <?php
        echo $this->Html->css('/vendor/bootstrap/css/bootstrap.min');
        echo $this->Html->css('/vendor/icofont/icofont.min');
        echo $this->Html->css('/vendor/boxicons/css/boxicons.min');
        echo $this->Html->css('/vendor/venobox/venobox');
        echo $this->Html->css('/vendor/remixicon/remixicon');
        //echo $this->Html->css('/vendor/owl.carousel/assets/owl.carousel.min');
        echo $this->Html->css('/vendor/aos/aos');
        echo $this->Html->script('/vendor/jquery/jquery.min');
        ?>


        <?php echo $this->Html->css('/font-awesome/css/all') ?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
        <!-- Template Main CSS File -->
        <?php echo $this->Html->css('style'); ?>
        <?php echo $this->Html->css('kyna'); ?>
        <?php echo $this->Html->css('kyna-main'); ?>
        <?php echo $this->Html->css('kyna-homepage'); ?>

        <!-- =======================================================
        * Template Name: Bootslander - v2.3.1
        * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
