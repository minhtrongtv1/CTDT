

<table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>


                            <th class="column-title"><?php echo $this->Paginator->sort('title','Tên'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('scholastic','Năm học'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('semester','Học kỳ'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('isCompleted','Đã hoàn thành'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all"/> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['EvaluationRound']['page'] - 1) * $this->Paginator->params['paging']['EvaluationRound']['limit']) + 1; ?>
                        <?php foreach ($evaluationRounds as $evaluationRound): ?>
                            <tr id="row-<?php echo $evaluationRound['EvaluationRound']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($evaluationRound['EvaluationRound']['title']); ?>&nbsp;</td>
                                <td class=""><?php echo h($evaluationRound['EvaluationRound']['scholastic']); ?>&nbsp;</td>
                                <td class=""><?php echo h($evaluationRound['EvaluationRound']['semester']); ?>&nbsp;</td>
                                <td class=""><?php echo h($evaluationRound['EvaluationRound']['isCompleted']); ?>&nbsp;</td>
                                <td class=""><?php echo h($evaluationRound['EvaluationRound']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $evaluationRound['EvaluationRound']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                </td>
                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $evaluationRound['EvaluationRound']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/evaluationRounds/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
                    </tfoot>
                </table>
                <?php echo $this->element("pagination"); ?> 
