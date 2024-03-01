
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Chuẩn đầu ra'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $programObjective['ProgramObjective']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="ProgramObjectives" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Group Type'); ?></strong></td>
                            <td>
                                <?php echo h($programObjective['ProgramObjective']['group_type']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($programObjective['ProgramObjective']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Program Outcome'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($programObjective['ProgramOutcome']['name'], array('controller' => 'program_outcomes', 'action' => 'view', $programObjective['ProgramOutcome']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Describe'); ?></strong></td>
                            <td>
                                <?php echo h($programObjective['ProgramObjective']['describe']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Level'); ?></strong></td>
                            <td>
                                <?php echo h($programObjective['ProgramObjective']['level']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($programObjective['ProgramObjective']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($programObjective['ProgramObjective']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($programObjective['ProgramObjective']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Knowledges'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Knowledge'), array('controller' => 'knowledges', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($programObjective['Knowledge'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Code'); ?></th>
                                <th class="text-center"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('Program Objective Id'); ?></th>
                                <th class="text-center"><?php echo __('Describe'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($programObjective['Knowledge'] as $knowledge):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $knowledge['code']; ?></td>
                                    <td class="text-center"><?php echo $knowledge['name']; ?></td>
                                    <td class="text-center"><?php echo $knowledge['program_objective_id']; ?></td>
                                    <td class="text-center"><?php echo $knowledge['describe']; ?></td>
                                    <td class="text-center"><?php echo $knowledge['created']; ?></td>
                                    <td class="text-center"><?php echo $knowledge['modified']; ?></td>
                                    <td class="text-center"><?php echo $knowledge['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'knowledges', 'action' => 'view', $knowledge['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'knowledges', 'action' => 'edit', $knowledge['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'knowledges', 'action' => 'delete', $knowledge['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $knowledge['id'])); ?>
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

