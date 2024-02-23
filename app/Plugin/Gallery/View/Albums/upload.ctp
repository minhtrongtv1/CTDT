<?php
$this->Html->script(
        array(
    'Gallery.lib/dropzone.min.js',
    'Gallery.scripts.js'
        ), array('block' => 'js')
);
?>

<?php
$this->Html->css(array(
    'Gallery.dropzone',
    'Gallery.style'
        ), array('block' => 'css'))
?>

<div id="albumInfo" data-album-id="<?php echo $album['Album']['id'] ?>"
     data-post-url="<?php
     echo Router::url(array('plugin' => 'gallery',
         'controller' => 'pictures',
         'action' => 'upload'))
     ?>"></div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default panel-container-album">
            <div class="panel-heading">
                <h2 class="panel-title pull-left">
                    <i class="fa fa-picture-o"></i>
                    <?php echo $album['Album']['title'] ?>
                </h2>

                <?php
                echo $this->Html->link(
                        '<i class="fa fa-cloud-upload"></i> ' . __d('gallery', 'Tải ảnh lên'), 'javascript:void(0)', array(
                    'escape' => false,
                    'class' => 'uploadButton btn btn-success btn-sm pull-right'
                        )
                );
                ?>
                <?php
                echo $this->Html->link(
                        '<i class="fa fa-external-link"></i> ' . __d('gallery', 'Xem album'), array(
                    'controller' => 'albums',
                    'action' => 'view',
                    $album['Album']['id'],
                    'plugin' => 'gallery'
                        ), array(
                    'data-toggle' => 'modal',
                    'escape' => false,
                    'target' => '_blank',
                    'class' => 'btn btn-info btn-sm pull-right',
                    'style' => 'margin-right: 10px; margin-left: 10px'
                        )
                );
                ?>

                <a href="javascript:void(0)" class="btn btn-sm btn-primary open-config pull-right">
                    <i class="fa fa-cog"></i> <?php echo __d('gallery', 'Options'); ?>
                </a>

                <div class="clearfix"></div>
            </div>
            <div class="panel-body uploader-panel">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $data = $this->Js->get('#AlbumUpdateForm')->serializeForm(
                                array('isForm' => true, 'inline' => true)
                        );
                        $this->Js->get('#AlbumUpdateForm')->event(
                                'submit', $this->Js->request(
                                        array('action' => 'update'), array(
                                    'update' => '#folderStatus',
                                    'data' => $data,
                                    'async' => true,
                                    'dataExpression' => true,
                                    'method' => 'POST',
                                    'complete' => 'toastr.success("Album saved"); $(".panel.options").slideToggle()'
                                        )
                                )
                        );
                        echo $this->Form->create('Gallery.Album', array('url' => array('action' => 'update'), 'default' => false));
                        ?>
                        <div class="panel panel-success options">
                            <div class="panel-heading options">
                                <h3 class="panel-title">
                                    <i class="fa fa-cog"></i>
                                    <?php echo __d('gallery', 'Album options'); ?>
                                </h3>
                            </div>
                            <div class="panel-body options">
                                <?php if (!empty($album)) { ?>
                                    <?php echo $this->Form->input('id', array('value' => $album['Album']['id'])) ?>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->input(
                                                'title', array(
                                            'value' => !empty($album) ? $album['Album']['title'] : '',
                                            'label' => __d('gallery', 'Tên album'),
                                            'placeholder' => 'Ví dụ: Toán trí tuệ-360'
                                                )
                                        )
                                        ?>
                                        <?php echo $this->element('slug_input', array('slugFieldId' => 'AlbumSlug', 'baseFieldId' => 'AlbumTitle', 'value' => !empty($album) ? $album['Album']['slug'] : '',)); ?>

                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                        echo $this->Form->input(
                                                'tags', array(
                                            'value' => !empty($album) ? $album['Album']['tags'] : '',
                                            'label' => __d('gallery', 'Tags (cách nhau dấu ,)'),
                                            'placeholder' => 'Ví dụ: toán trí tuệ, bảng tính, tính nhanh'
                                                )
                                        )
                                        ?>
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><?php echo __d('gallery', 'Trạng thái'); ?></label>

                                        <div class="manipulation">
                                            <?php
                                            echo $this->Form->input(
                                                    'status', array(
                                                'type' => 'radio',
                                                'value' => !empty($album) ? $album['Album']['status'] : 'published',
                                                'legend' => false,
                                                'separator' => '',
                                                'options' => array(
                                                    'draft' => __d('gallery', 'Nháp'),
                                                    'published' => __d('gallery', 'Công khai')
                                                )
                                                    )
                                            )
                                            ?>
                                        </div>


                                    </div>


                                </div>
                            </div>
                            <div class="panel-footer options">

                                <button class="btn btn-success pull-left btn-sm">
                                    <i class="fa fa-check"></i>
                                    <?php echo __d('gallery', 'Lưu'); ?>
                                </button>
                                <a href="javascript:void(0)" class="btn btn-default btn-sm pull-left close-config"
                                   style="margin-left: 10px"><?php echo __d('gallery', 'Đóng'); ?></a>

                                <button type="button" class="btn btn-warning btn-sm pull-right popovertrigger"
                                        style="margin-left: 10px"
                                        data-container="body" data-toggle="popover" data-placement="left" data-content="<ul>
                                        <li><?php echo __d('gallery', 'Sử dụng form Album options để cập nhật thông tin bộ sưu tập ví dụ như tên, tags hay trạng thái.'); ?></li>
                                        <li><?php echo __d('gallery', 'Để tải ảnh mới chọn nút Tải ảnh lên.'); ?></li>
                                        <li><?php echo __d('gallery', 'Kéo thả ảnh để sắp xếp lại thứ tự ảnh. (Hệ thống sẽ lưu tự động)'); ?></li>
                                        <li><?php echo __d('gallery', 'Nếu bạn xóa album, toàn bộ ảnh của album đó sẽ bị xóa theo.'); ?></li>
                                        <li><?php echo __d('gallery', 'Ảnh đầu tiên của album sẽ được coi như là ảnh đại diện cho album đó'); ?></li>
                                        </ul>">
                                    <i class="fa fa-info-circle"></i> <?php echo __d('gallery', 'Hướng dẫn'); ?>
                                </button>

                                <?php
                                echo $this->Html->link(
                                        '<i class="fa fa-trash-o"></i> ' . __d('gallery', 'Xóa album'), array(
                                    'controller' => 'albums',
                                    'action' => 'delete',
                                    'plugin' => 'gallery',
                                    $album['Album']['id']
                                        ), array(
                                    'escape' => false,
                                    'style' => 'text-align: right; color: red',
                                    'class' => 'pull-right btn btn-sm confirm-delete'
                                        )
                                );
                                ?>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        </form>
                        <?php echo $this->Js->writeBuffer(); ?>
                    </div>
                </div>
                <div id="container-pictures">
                    <ul class="row" id="sortable"></ul>
                    <?php if (!count($album['Picture'])) { ?>
                        <div class="container-empty">
                            <div class="img"><i class="fa fa-picture-o"></i></div>
                            <h2><?php echo __d('gallery', "Album này chưa có tấm ảnh nào."); ?></h2>
                            <br/>
                            <a href="javascript:void(0)" class="btn btn-success uploadButton">
                                <i class="fa fa-cloud-upload"></i>
                                <?php echo __d('gallery', 'Click chọn tải lên hoặc kéo thả ảnh vào đây '); ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="folderinfo"
     data-public-folder-path="<?php echo $this->params->webroot . "files/gallery/" . $album['Album']['id'] . "/" ?>"></div>

<div id="uploadContainer">
    <div id="previews" class="dropzone-previews"></div>
    <div class="clearfix"></div>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"
         aria-valuenow="0">
        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
    </div>
</div>


<script type="x-tmpl-mustache" id="pictureBoxTemplate">
    <li class="col-xs-6 col-md-3 ui-state-default" alt="{{id}}"
    id="{{id}}">
    <div class="thumbnail th-pictures-container" style="position: relative">
    <a href="{{large}}" title="{{caption}}" class="swipebox"><img src="{{url}}" alt=""></a>
    <div class="image-actions">
    <a href="javascript:void(0)" class="remove-picture pull-right"
    data-file-id="{{id}}">
    <span style="color:red;"><i class="fa fa-trash-o"></i></span>
    </a>
    </div>
    <div class="image-caption caption">
    <div class="text" data-id="{{id}}">{{caption}}</div>

    </div>
    <div class="clearfix"></div>
    </div>
    </li>
</script>
