
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Room'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $room['Room']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Rooms" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Code'); ?></strong></td>
                            <td>
                                <?php echo h($room['Room']['code']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($room['Room']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Acreage'); ?></strong></td>
                            <td>
                                <?php echo h($room['Room']['acreage']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($room['Room']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($room['Room']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($room['Room']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Infrastructures'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Infrastructure'), array('controller' => 'infrastructures', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($room['Infrastructure'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Code'); ?></th>
                                <th class="text-center"><?php echo __('Device Id'); ?></th>
                                <th class="text-center"><?php echo __('Room Id'); ?></th>
                                <th class="text-center"><?php echo __('Curriculumn Id'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($room['Infrastructure'] as $infrastructure):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $infrastructure['code']; ?></td>
                                    <td class="text-center"><?php echo $infrastructure['device_id']; ?></td>
                                    <td class="text-center"><?php echo $infrastructure['room_id']; ?></td>
                                    <td class="text-center"><?php echo $infrastructure['curriculumn_id']; ?></td>
                                    <td class="text-center"><?php echo $infrastructure['created']; ?></td>
                                    <td class="text-center"><?php echo $infrastructure['modified']; ?></td>
                                    <td class="text-center"><?php echo $infrastructure['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'infrastructures', 'action' => 'view', $infrastructure['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'infrastructures', 'action' => 'edit', $infrastructure['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'infrastructures', 'action' => 'delete', $infrastructure['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $infrastructure['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>



        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

