
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Mục tiêu đào tạo'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $programOutcome['ProgramOutcome']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="ProgramOutcomes" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($programOutcome['ProgramOutcome']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Content'); ?></strong></td>
                            <td>
                                <?php echo h($programOutcome['ProgramOutcome']['content']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Typeoutcome'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($programOutcome['Typeoutcome']['name'], array('controller' => 'typeoutcomes', 'action' => 'view', $programOutcome['Typeoutcome']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Curriculumn'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($programOutcome['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $programOutcome['Curriculumn']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($programOutcome['ProgramOutcome']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($programOutcome['ProgramOutcome']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($programOutcome['ProgramOutcome']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Program Objectives'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Program Objective'), array('controller' => 'program_objectives', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($programOutcome['ProgramObjective'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Curriculumn Id'); ?></th>
                                <th class="text-center"><?php echo __('Program Outcome Id'); ?></th>
                                <th class="text-center"><?php echo __('Code'); ?></th>
                                <th class="text-center"><?php echo __('Describe'); ?></th>
                                <th class="text-center"><?php echo __('Level'); ?></th>
                                <th class="text-center"><?php echo __('Group Type'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($programOutcome['ProgramObjective'] as $programObjective):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $programObjective['curriculumn_id']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['program_outcome_id']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['code']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['describe']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['level']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['group_type']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['created']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['modified']; ?></td>
                                    <td class="text-center"><?php echo $programObjective['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'program_objectives', 'action' => 'view', $programObjective['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'program_objectives', 'action' => 'edit', $programObjective['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'program_objectives', 'action' => 'delete', $programObjective['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $programObjective['id'])); ?>
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

