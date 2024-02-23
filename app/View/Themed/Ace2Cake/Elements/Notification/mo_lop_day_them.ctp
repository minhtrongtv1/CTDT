<a href="<?php echo BASE_URL ?>/manager/courses/view/<?php echo $data['Course']['id']; ?>" class='clearfix'>
                                 
    <span class="msg-body">
        <span class="msg-title">
           Hệ thống đã tự động mở lớp dạy thêm id là <?php echo $data['Course']['id']; ?>
        </span>

        <span class="msg-time">
            <i class="ace-icon fa fa-clock-o"></i>
            <span> <?php echo $this->Time->niceShort($data['Notification']['created']); ?></span>
        </span>
    </span>
</a>
