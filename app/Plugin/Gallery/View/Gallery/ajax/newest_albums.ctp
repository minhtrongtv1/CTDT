
<?php

foreach ($galleries as $gallery):
    ?>
    <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>

    <li>
        <a href="<?php
        echo $this->Html->url(
                array(
                    'controller' => 'dashboards',
                    'action' => 'album_show',
                    'plugin' => false,
                    $gallery['Album']['id']
                )
        )
        ?>">
            <img src="<?php echo $picture_url ?>" class="attachment-news size-news wp-post-image" alt=""></a>
    </li>
<?php endforeach; ?>