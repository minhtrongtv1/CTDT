<?php
$this->Paginator->options(array(
    'url' => array('ptc' => true, 'action' => 'ptc_index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?>


<table class="table table-bordered table-hover has-checked-item">
    <thead>

        <tr class="headings">
            <th>#</th>


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã tài liệu'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên tài liệu'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('author_name', 'Tên tác giả'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('publisher', 'Nhà xuất bản'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('publishing_year', 'Năm xuất bản'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('link_libary', 'Link thư viện'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('pricing_code', 'Mã xếp giá'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('quantity', 'Số lượng'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('note', 'Ghi chú'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>



        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Book']['page'] - 1) * $this->Paginator->params['paging']['Book']['limit']) + 1; ?>
        <?php foreach ($books as $book): ?>
            <tr id="row-<?php echo $book['Book']['id'] ?>">
                <td><?php echo $stt++; ?></td>

                <td class=""><?php echo h($book['Book']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['author_name']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['publisher']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['publishing_year']); ?>&nbsp;</td>
                <td class=""><?php echo $this->Html->link("Link tài liệu", $book['Book']['link_libary']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['pricing_code']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['quantity']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['note']); ?>&nbsp;</td>
                <td class=""><?php echo h($book['Book']['id']); ?>&nbsp;</td>


            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
