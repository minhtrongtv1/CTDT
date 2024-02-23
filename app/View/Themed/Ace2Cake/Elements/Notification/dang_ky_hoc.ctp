<a href="<?php echo BASE_URL ?>/dang_ky_hocs/view/<?php echo $data['DangKyHoc']['id']; ?>" class='clearfix'>
    <?php echo $this->Html->image($data['User']['avatar'], array("class" => "msg-photo")); ?>                                
    <span class="msg-body">
        <span class="msg-title">
            <span class="blue"><?php echo $data['User']['name'] ?></span>
            đăng ký học cho bé <?php echo $data['DangKyHoc']['ho_ten_be'] ?>
        </span>

        <span class="msg-time">
            <i class="ace-icon fa fa-clock-o"></i>
            <span> <?php echo $this->Time->niceShort($data['Notification']['created']); ?></span>
        </span>
    </span>
</a>
