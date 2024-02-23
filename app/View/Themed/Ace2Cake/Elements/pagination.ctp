<style>
    .pagination {
        padding-left: 0;
        margin: 4px 0 !important;
        border-radius: 4px;
    }
</style>
<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Trang thứ {:page} của tất cả {:pages} trang. Đang hiển thị {:current} dòng của tất cả {:count} dòng từ dòng {:start}, đến dòng {:end}')
    ));
    ?>	</p>
<div class="pagination pagination-small">
    <ul class="pagination">
        <?php
        echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
        echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1));
        echo $this->Paginator->next(__('next'), array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
        ?>
    </ul>
</div>
