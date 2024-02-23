<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>DANH MỤC CÁC NHU CẦU TỪ CỘNG ĐỒNG</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Project', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">
                    <?php echo $this->Form->input('code', array('placeholder' => 'Mã nhu cầu/dự án', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('name', array('placeholder' => 'Tên nhu cầu/dự án', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('field_id', array('empty' => 'Chọn lĩnh vực', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            </div>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>

                            <th class="column-title"><?php echo $this->Paginator->sort('image', 'Ảnh đại diện'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã nhu cầu'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên nhu cầu'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('created_user_id', 'Người đề xuất'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('field_id', 'Lĩnh vực'); ?></th>



                            <th class="column-title"><?php echo $this->Paginator->sort('created', 'Ngày đăng'); ?></th>
                            

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Project']['page'] - 1) * $this->Paginator->params['paging']['Project']['limit']) + 1; ?>
                        <?php foreach ($projects as $project): ?>
                            <tr id="row-<?php echo $project['Project']['id'] ?>">
                                <td><?php echo $stt++; ?></td>
                                <td class="">
                                    <?php
                                    if (!empty($project['Project']['image']))
                                        echo $this->Html->image('/files/project/image/' . $project['Project']['id'] . '/' . $project['Project']['image'], array('alt' => $project['Project']['name'], 'width' => 100, 'url' => array('action' => 'view', $project['Project']['id'])));
                                    ?>
                                    &nbsp;</td>
                                <td class=""><?php echo h($project['Project']['code']); ?>&nbsp;</td>
                                <td class=""><?php echo h($project['Project']['name']); ?>&nbsp;</td>
                                <td class=""><?php echo h($project['CreatedUser']['name']); ?>&nbsp;</td>
                                <td class=""><?php echo h($project['Field']['name']); ?>&nbsp;</td>
                                
                                <td class=""><?php $created=new DateTime($project['Project']['created']); echo $created->format('d/m/Y H:i')?>&nbsp;</td>
                                
                                <td>
                                    <?php echo $this->Html->link('chọn nghiên cứu', array('action' => 'select', $project['Project']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Chọn dự án này để thực hiện')); ?>
                                    <?php echo $this->Html->link('xem', array('action' => 'view', $project['Project']['id']), array('class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Chọn dự án này để thực hiện')); ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <?php echo $this->element("pagination"); ?>  
            </div>
        </div>
    </div>
</div>


<script>
    jQuery.fn.fadeOutAndRemove = function (speed) {
        $(this).fadeOut(speed, function () {
            $(this).remove();
        })
    };

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("<?php echo BASE_URL ?>/teacher/projects/index", data, function (response) {
            $("#datarows").html(response);
        });

    });



</script>
<?php
echo $this->Js->writeBuffer();

