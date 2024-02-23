
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Subjects User'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $subjectsUser['SubjectsUser']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="SubjectsUsers" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('User'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($subjectsUser['User']['ho_va_ten_khoa_code'], array('controller' => 'users', 'action' => 'view', $subjectsUser['User']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Subject'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($subjectsUser['Subject']['id'], array('controller' => 'subjects', 'action' => 'view', $subjectsUser['Subject']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Room'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($subjectsUser['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $subjectsUser['Room']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsUser['SubjectsUser']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsUser['SubjectsUser']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsUser['SubjectsUser']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($subjectsUser['SubjectsUser']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

