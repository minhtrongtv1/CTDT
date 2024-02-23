
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Subjects Curriculumn'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $subjectsCurriculumn['SubjectsCurriculumn']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="SubjectsCurriculumns" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Curriculumn'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($subjectsCurriculumn['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $subjectsCurriculumn['Curriculumn']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Subject'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($subjectsCurriculumn['Subject']['id'], array('controller' => 'subjects', 'action' => 'view', $subjectsCurriculumn['Subject']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Knowledge'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($subjectsCurriculumn['Knowledge']['name'], array('controller' => 'knowledges', 'action' => 'view', $subjectsCurriculumn['Knowledge']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Obligatory'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsCurriculumn['SubjectsCurriculumn']['obligatory']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Elective'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsCurriculumn['SubjectsCurriculumn']['elective']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsCurriculumn['SubjectsCurriculumn']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsCurriculumn['SubjectsCurriculumn']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsCurriculumn['SubjectsCurriculumn']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsCurriculumn['SubjectsCurriculumn']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

