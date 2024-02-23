
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Knowledge'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $knowledge['Knowledge']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Knowledges" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Program Objective'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($knowledge['ProgramObjective']['name'], array('controller' => 'program_objectives', 'action' => 'view', $knowledge['ProgramObjective']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($knowledge['Knowledge']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Describe'); ?></strong></td>
                            <td>
                                <?php echo h($knowledge['Knowledge']['describe']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($knowledge['Knowledge']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($knowledge['Knowledge']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($knowledge['Knowledge']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Subjects Curriculumns'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Subjects Curriculumn'), array('controller' => 'subjects_curriculumns', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($knowledge['SubjectsCurriculumn'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Curriculumn Id'); ?></th>
                                <th class="text-center"><?php echo __('Subject Id'); ?></th>
                                <th class="text-center"><?php echo __('Knowledge Id'); ?></th>
                                <th class="text-center"><?php echo __('Obligatory'); ?></th>
                                <th class="text-center"><?php echo __('Elective'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($knowledge['SubjectsCurriculumn'] as $subjectsCurriculumn):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['curriculumn_id']; ?></td>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['subject_id']; ?></td>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['knowledge_id']; ?></td>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['obligatory']; ?></td>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['elective']; ?></td>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['created']; ?></td>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['modified']; ?></td>
                                    <td class="text-center"><?php echo $subjectsCurriculumn['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'subjects_curriculumns', 'action' => 'view', $subjectsCurriculumn['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'subjects_curriculumns', 'action' => 'edit', $subjectsCurriculumn['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'subjects_curriculumns', 'action' => 'delete', $subjectsCurriculumn['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $subjectsCurriculumn['id'])); ?>
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

