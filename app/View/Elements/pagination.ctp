<p>
    <small><?php echo $this->Paginator->counter(array('format' => __('Trang thứ {:page}/{:pages} trang, đang hiển thị {:current}/{:count} dòng, từ dòng {:start}, đến dòng {:end}'))); ?></small>
</p>

<?php
$params = $this->Paginator->params();
if ($params['pageCount'] > 1) {
    ?>
    <ul class="pagination pagination-sm">
        <?php
        echo $this->Paginator->prev('← Trước', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">← Trước</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
        echo $this->Paginator->next('Kế →', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Kế →</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
        ?>
    </ul>
<?php } ?>