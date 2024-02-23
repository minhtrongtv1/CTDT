<?php
$this->Html->css(array(
    'Gallery.style'
        ), array('block' => 'css'))
?>

<div class="row">
    <div class="col-md-12">
        <div class="row">

            <?php if (empty($galleries)) { ?>
                <div class="container-empty">
                    <div class="img"><i class="fa fa-picture-o"></i></div>
                    <h2>Bạn không có <?php echo $search_status ?> albums nào.</h2>
                    <br/>
                    <?php
                    echo $this->Gallery->link(null, null, array('class' => 'btn btn-primary', 'style' => 'margin-top: 10px')
                    );
                    ?>
                </div>
            <?php } else { ?>
            <h2>Bộ sưu tập ảnh</h2>
                <?php foreach ($galleries as $gallery) { ?>
                    <a
                        href="<?php
                        echo $this->Html->url(
                                array(
                                    'controller' => 'albums',
                                    'action' => 'view',
                                    'plugin' => 'gallery',
                                    $gallery['Album']['id']
                                )
                        )
                        ?>">
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail <?php echo $search_status ?>">
                                <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>
                                <img src="<?php echo $picture_url ?>" alt="...">

                                <div class="caption">
                                    <h4>
                                        <?php if ($gallery['Album']['status'] == 'draft') { ?>
                                            <i class="fa fa-pagelines"></i>
                                        <?php } else { ?>
                                        <?php } ?>
                                        <?php echo $gallery['Album']['title'] ?>
                                    </h4>
                                    <h5><i
                                            class="fa fa-calendar"></i> <?php
                                            echo $this->Time->format(
                                                    $gallery['Album']['created'], '%B %e, %Y %H:%M %p'
                                            )
                                            ?>
                                    </h5>
                                    <h5><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Picture']) ?></h5>

                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
</div>


