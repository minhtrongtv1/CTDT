<!--
<div>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                </a>
            </li>
            <li class="active"><a href="#">01</a></li>
            <li><a href="#">02</a></li>
            <li><a href="#">03</a></li>
            <li><a href="#">04</a></li>
            <li><a href="#">05</a></li>
            <li><a href="#">06</a></li>
            <li><a href="#">07</a></li>
            <li><a href="#">08</a></li>
            <li><a href="#">09</a></li>
            <li><a href="#">10</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                </a>
            </li>
        </ul>
    </nav>
</div>
-->

<p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Trang {:page} của tất cả {:pages} trang, hiển thị {:current} dòng của {:count} dòng từ dòng {:start},đến dòng {:end}')
    ));
    ?>	
</p>
<div style="text-align: center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            echo $this->Paginator->prev('<span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>', array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1));
            echo $this->Paginator->next('<span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>', array('tag' => 'li', 'currentClass' => 'disabled','escape'=>false), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
            ?>
        </ul>
    </nav>
</div>