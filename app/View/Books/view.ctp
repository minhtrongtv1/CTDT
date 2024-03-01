
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Tài liệu'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $book['Book']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Books" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Code'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['code']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Author Name'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['author_name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Publisher'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['publisher']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Publishing Year'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['publishing_year']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Link Libary'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['link_libary']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Pricing Code'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['pricing_code']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Quantity'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['quantity']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Note'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['note']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($book['Book']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Subjects'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Subject'), array('controller' => 'subjects', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($book['Subject'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Code'); ?></th>
                                <th class="text-center"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('Theory Credit'); ?></th>
                                <th class="text-center"><?php echo __('Practice Credit'); ?></th>
                                <th class="text-center"><?php echo __('Theory Hour'); ?></th>
                                <th class="text-center"><?php echo __('Practice Hour'); ?></th>
                                <th class="text-center"><?php echo __('Self Learning Time'); ?></th>
                                <th class="text-center"><?php echo __('Note'); ?></th>
                                <th class="text-center"><?php echo __('Describe'); ?></th>
                                <th class="text-center"><?php echo __('Syllabus Filename'); ?></th>
                                <th class="text-center"><?php echo __('Syllabus Path'); ?></th>
                                <th class="text-center"><?php echo __('Semester Id'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($book['Subject'] as $subject):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $subject['code']; ?></td>
                                    <td class="text-center"><?php echo $subject['name']; ?></td>
                                    <td class="text-center"><?php echo $subject['theory_credit']; ?></td>
                                    <td class="text-center"><?php echo $subject['practice_credit']; ?></td>
                                    <td class="text-center"><?php echo $subject['theory_hour']; ?></td>
                                    <td class="text-center"><?php echo $subject['practice_hour']; ?></td>
                                    <td class="text-center"><?php echo $subject['self_learning_time']; ?></td>
                                    <td class="text-center"><?php echo $subject['note']; ?></td>
                                    <td class="text-center"><?php echo $subject['describe']; ?></td>
                                    <td class="text-center"><?php echo $subject['syllabus_filename']; ?></td>
                                    <td class="text-center"><?php echo $subject['syllabus_path']; ?></td>
                                    <td class="text-center"><?php echo $subject['semester_id']; ?></td>
                                    <td class="text-center"><?php echo $subject['created']; ?></td>
                                    <td class="text-center"><?php echo $subject['modified']; ?></td>
                                    <td class="text-center"><?php echo $subject['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'subjects', 'action' => 'view', $subject['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'subjects', 'action' => 'edit', $subject['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'subjects', 'action' => 'delete', $subject['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $subject['id'])); ?>
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

