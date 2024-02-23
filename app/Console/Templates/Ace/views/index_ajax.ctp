<?php
echo '<?php
$this->Paginator->options(array(
    \'url\' => array(\'action\' => \'index\'),
    \'update\' => \'#datarows\',
    \'evalScripts\' => true,
    \'data\' => http_build_query($this->request->data),
    \'method\' => \'POST\',
));
?>';
?>
<table class="table table-striped jambo_table bulk_action">
    <thead>

        <tr class="headings">
            <th><input type="checkbox" id="check-all" class="flat"></th>
            <?php foreach ($fields as $field): ?>
                <th class="column-title"><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
            <?php endforeach; ?>
            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
            <th class="bulk-actions" colspan="<?php echo '<?php echo (count($' . $pluralVar . '[0]["' . $modelClass . '"])+2)?>' ?>" >
                <div class="dropdown">
                    <button class="antoo btn btn-success " style="color:#fff; font-weight:500;" data-toggle="dropdown">
                        Hành động hàng loạt ( <span class="action-cnt">trên 10 dòng đã chọn</span> ) 
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#deleteSeleted">Delete all</a></li>
                        <li><a href="#exportSeleted">Xuất báo cáo</a></li>

                    </ul>
            </th>
        </tr>
    </thead>

    <tbody>
        <?php
        echo '<?php $i = 0;?>';
        echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
        echo '<?php $class = ($i++%2)?"even":"odd";?>';
        echo '<tr class="<?php echo $class ?> pointer">';
        ?>
    <td class = "a-center ">
        <input type = "checkbox" class = "flat" name = "table_records">
    </td>
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

    echo "\t\t<td class=\"\">\n";
    echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"glyphicon glyphicon-eye-open\"></i>'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>\n";
    echo "\t\t\t<?php echo \$this->Html->link(__('<i class=\"glyphicon glyphicon-pencil\"></i>'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>\n";
    echo "\t\t\t<?php echo \$this->Form->postLink(__('<i class=\"glyphicon glyphicon-trash\"></i>'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
    echo "\t\t</td>\n";
    echo "\t</tr>\n";

    echo "<?php endforeach; ?>\n";
    ?>
</tbody>
</table>
<?php echo '<?php echo $this->element("pagination"); ?> '; ?> 
<?php echo '<?php echo $this->Js->writeBuffer();'; ?>