
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Evaluation Result'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $evaluationResult['EvaluationResult']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="EvaluationResults" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Evaluation Round'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($evaluationResult['EvaluationRound']['title'], array('controller' => 'evaluation_rounds', 'action' => 'view', $evaluationResult['EvaluationRound']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Course'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($evaluationResult['Course']['fullname'], array('controller' => 'courses', 'action' => 'view', $evaluationResult['Course']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Supporter'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($evaluationResult['Supporter']['name'], array('controller' => 'users', 'action' => 'view', $evaluationResult['Supporter']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Pass'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationResult['EvaluationResult']['pass']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Reason'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationResult['EvaluationResult']['reason']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationResult['EvaluationResult']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationResult['EvaluationResult']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($evaluationResult['EvaluationResult']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

