<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php
$hideFields = array('created', 'created_user_id', 'modified', 'description', 'lft', 'rght');
$fields = array_diff($fields, $hideFields);
?>
<?php
echo '<?php
                        $this->Paginator->options(array(
                            \'url\' => array(\'action\' => \'index\'),
                            \'update\' => \'#datarows\',
                            \'evalScripts\' => true,
                            \'data\' => http_build_query($this->request->data),
                            \'method\' => \'POST\'
                        ));
                        ?>';
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo "<?php echo \$this->Form->create('{$modelClass}',array('url'=>array('action'=>'index'),'id'=>'filter-form','class'=>'form-inline','role'=>'form','novalidate'));?>\n" ?>
                <div class="col-md-12">

                    <?php foreach ($fields as $field): ?>
                        <?php if (!in_array($field, array('id', 'created', 'modified')) && stristr($field, 'date') === FALSE && stristr($field, 'content') === FALSE): ?>
                            <?php echo "<?php echo \$this->Form->input('{$field}',array('placeholder'=>'{$field}','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>\n" ?>
                        <?php endif; ?>
                    <?php endforeach; ?>                    
                    <div class="form-group">
                        <?php echo "<?php echo \$this->Form->button('Lọc',array('type'=>'submit','class'=>'btn btn-primary btn-xs'));?>\n" ?>
                        <?php echo "<?php echo \$this->Html->link('Bỏ lọc',array('action'=>'index'),array('class'=>'btn btn-warning btn-xs'));?>\n" ?>
                    </div>
                </div>
                <?php echo '<?php echo $this->Form->end();?>' ?>
            </div>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>

                            <?php foreach ($fields as $field): ?>

                                <th class="column-title"><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>

                            <?php endforeach; ?>
                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        echo "<?php \$stt = ((\$this->Paginator->params['paging']['{$modelClass}']['page'] - 1) * \$this->Paginator->params['paging']['{$modelClass}']['limit']) + 1; ?>\n";
                        echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";

                        echo "<tr id=\"row-<?php echo \${$singularVar}['{$modelClass}']['id'] ?>\">\n";
                        ?>
                        <?php
                        echo "\t\t<td><?php echo \$stt++;?></td>\n";
                        ?>

                        <?php
                        foreach ($fields as $field) {
                            $isKey = false;
                            if (!empty($associations['belongsTo'])) {
                                foreach ($associations['belongsTo'] as $alias => $details) {
                                    if ($field === $details['foreignKey']) {
                                        $isKey = true;
                                        echo "\t\t<td class=\"\">\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                        break;
                                    }
                                }
                            }
                            if ($isKey !== true) {
                                echo "\t\t<td class=\"\"><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                            }
                        }

                        echo "\t\t<td>\n";
                        echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"glyphicon glyphicon-pencil\"></i>'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>\n";
                        echo "\t\t</td>\n";
                        ?>
                    <td>
                        <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo "<?php echo \${$singularVar}['{$modelClass}']['id'] ?>"; ?>">
                    </td>
                    <?php
                    echo "\t</tr>\n";

                    echo "<?php endforeach; ?>\n";
                    ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo "<?php echo \$this->Html->link(__('<i class=\"glyphicon glyphicon-plus\"></i>Thêm mới'), \"/admin/$pluralVar/add\", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>" ?>
                        <?php echo '<?php echo $this->Html->link(__(\'<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn\'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>' ?>
                    </span>
                    </tfoot>
                </table>
                <?php echo '<?php echo $this->element("pagination"); ?> '; ?> 
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
        $.post("<?php echo BASE_URL . '/admin/' . $pluralVar . '/index' ?>", data, function (response) {
            $("#datarows").html(response);
        });

    });

    $(document).on("click", "#check-all", function () {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });


    $(document).on("click", "#delete-seleted", function () {
        var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
        //console.log(selectedRecord.length);return false;
        if (selectedRecord.length < 1) {
            alert("Vui lòng chọn dòng muốn xóa !");
            return false;
        }
        if (confirm("Thao tác này không thể phục hồi, bạn chắc chắn muốn thực hiện ?")) {
            var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
            $.post('<?php echo BASE_URL; ?>/admin/<?php echo $pluralVar; ?>/delete', {selectedRecord: selectedRecord}, function (response) {
                if (response) {
                    $.each(response, function (arrayID, rowId) {
                        $("#row-" + rowId).fadeOutAndRemove('fast');
                    });
                    return true;

                } else {
                    alert('Có lỗi trong quá trình thực hiện thao tác!!!');
                    return false;
                }
            }, 'json').fail(function (response) {
                alert('Error: ' + response.responseText);
            });
            return true;
        } else {
            return false;
        }
    });

</script>
<?php echo "<?php echo \$this->Js->writeBuffer();"; ?>