<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>
<table class="table table-striped jambo_table bulk_action">
    <thead>

        <tr class="headings">
            <th><input type="checkbox" id="check-all" class="flat"></th>

            <th class="column-title"><?php echo $this->Paginator->sort('name'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('alias'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('order'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('image'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('image_path'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('decription'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('created'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('modified'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>

        </tr>
    </thead>

    <tbody>
        <?php $i = 0; ?><?php foreach ($groups as $group): ?>
            <?php $class = ($i++ % 2) ? "even" : "odd"; ?><tr class="<?php echo $class ?> pointer">
                <td class=""><?php echo h($group['Group']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['alias']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['order']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['image']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['image_path']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['decription']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['created']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
                <td class=""><?php echo h($group['Group']['id']); ?>&nbsp;</td>
                <td class="">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $group['Group']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->element("pagination"); ?>  
<?php
echo $this->Js->writeBuffer();
