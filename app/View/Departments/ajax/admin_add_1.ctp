
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> Thêm mới địa điểm</a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('Department', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>

    <?php echo $this->Form->input('name', array('label' => 'Tên')); ?>


    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
            &nbsp; &nbsp; &nbsp;
            <?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác', array('action' => 'index'), array('class' => 'btn btn-warning hide-modal', 'escape' => false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
    <?php echo $this->Form->end(); ?>
    <div id="error-log" style="text-align: center;display: none;">

    </div>
    <div id="loadingDiv" style="text-align: center;display: none; color:red;">
        <?php echo $this->Html->image('ajax-loader.gif', array('alt' => 'Đang thực hiện...', 'width' => '250px')); ?>
    </div>
</div>

<script>
    $(function () {
        var _loadingDiv = $("#loadingDiv");

        $(".hide-modal").on('click', function (e) {
            $('#add-modal').modal('hide');
        });

        $("#DepartmentAdminAddForm").on('submit', function (e) {
            e.preventDefault();
            var _this = $(this), data = _this.serialize();
            _loadingDiv.show();
            $.post(_this.attr('action'), data, function (rs) {

                if (rs.success) {

                    $("#error-log").hide();
                    $('#add-modal').modal('hide');
                    $("#VBDiNoiNhanVBDiNoiNhan").prepend(new Option(rs.name, rs.id));
                    $("#VBDiNoiNhanVBDiNoiNhan").val(rs.id);
                    $('#VBDiNoiNhanVBDiNoiNhan').trigger("chosen:updated");

                } else {
                    onError(rs);
                    _loadingDiv.hide();
                }
            }, 'json');
        });

        function onError(data) {
            $("#error-log").show();
            $.each(data.msg, function (model, errors) {
                _loadingDiv.hide();
                $("#error-log").append(errors + "<br>");

            });

        }
    });
</script>