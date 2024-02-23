<div class="well">
    <?php echo $this->Form->create('Project', array('url' => array('controller' => 'projects', 'action' => 'index'))) ?>

    <div class="border-bottom pb-2 ml-2">
        <h4 id="burgundy">Bộ lọc</h4>
    </div>
    <div class="form-group has-search">
        <?php echo $this->Form->input('name', array('class' => "form-control", 'label'=>false,'div' => false, 'placeholder' => "Tên nhu cầu/ý tưởng..",'required'=>false)); ?>

    </div>
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Tình trạng</h6>
        <div id="orange"><span class="fa fa-minus"></span></div>

        <div class="form-group"> <input type="checkbox" id="tea" name="status[]" value="<?php echo PROJECT_DA_GUI ?>"> <label for="tea">Đề xuất</label> </div>
        <div class="form-group"> <input type="checkbox" id="cookies" name="status[]" value="<?php echo PROJECT_DANG_THUC_HIEN ?>"> <label for="cookies">Đang thực hiện</label> </div>
        <div class="form-group"> <input type="checkbox" id="pastries" name='status[]' value="<?php echo PROJECT_DA_HOAN_THANH ?>"> <label for="pastries">Đã hoàn thành</label> </div>


    </div>
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Chuyên mục</h6>
        <div id="orange"><span class="fa fa-minus"></span></div>

        <?php $fields = $this->requestAction(array('controller' => 'fields', 'action' => 'list_fields')); ?>

        <?php foreach ($fields as $field): ?>



            <div class="form-group"> <input type="checkbox" name="field[]" value="<?php echo $field['Field']['id'] ?>"> <label for="field"><?php echo $field['Field']['name'] ?></label> </div>
        <?php endforeach; ?>


    </div>
    
    <br>
    <div class="btn-group> text-center">
        <button type="submit" class="btn btn-info">Lọc</button>
        <button type="reset" class="btn btn-warning">Nhập lại</button>
    </div>
    <?php $this->Form->end() ?><!-- comment -->
</div>

<script><!-- comment -->
    $(function(){
    $("#ProjectIndexForm").submit(function(e){
        e.preventDefault();
        var data=$(this).serialize();
        $.post('/projects/index',data,function(res){
            $('#datarows').html(res);
        });
    });
    });
</script>