
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Evaluation Round'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $evaluationRound['EvaluationRound']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="EvaluationRounds" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Title'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationRound['EvaluationRound']['title']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Scholastic'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationRound['EvaluationRound']['scholastic']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Semester'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationRound['EvaluationRound']['semester']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('IsCompleted'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationRound['EvaluationRound']['isCompleted']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationRound['EvaluationRound']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationRound['EvaluationRound']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationRound['EvaluationRound']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Evaluation Results'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Evaluation Result'), array('controller' => 'evaluation_results', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($evaluationRound['EvaluationResult'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Evaluation Round Id'); ?></th>
                                <th class="text-center"><?php echo __('Course Id'); ?></th>
                                <th class="text-center"><?php echo __('Supporter Id'); ?></th>
                                <th class="text-center"><?php echo __('Pass'); ?></th>
                                <th class="text-center"><?php echo __('Reason'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($evaluationRound['EvaluationResult'] as $evaluationResult):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $evaluationResult['evaluation_round_id']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['course_id']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['supporter_id']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['pass']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['reason']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['created']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['modified']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'evaluation_results', 'action' => 'view', $evaluationResult['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'evaluation_results', 'action' => 'edit', $evaluationResult['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'evaluation_results', 'action' => 'delete', $evaluationResult['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $evaluationResult['id'])); ?>
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

