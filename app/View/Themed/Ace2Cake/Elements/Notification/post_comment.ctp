<a href="#" class="clearfix">
    <?php echo $this->Html->image($data['User']['avatar'], array("class" => "msg-photo")); ?>                                
    <span class="msg-body">
        <span class="msg-title">
            <span class="blue"><?php echo $data['User']['name'] ?></span>
            <?php $data['Message']['title'] ?>
        </span>

        <span class="msg-time">
            <i class="ace-icon fa fa-clock-o"></i>
            <span> <?php echo $this->Time->niceShort($data['Notification']['created']); ?></span>
        </span>
    </span>
</a>
