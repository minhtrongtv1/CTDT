
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Kết quả tư vấn</h3>

            </div>

            <div class="box-body table-responsive">
                <table id="TuVanCdrs" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong>CĐR</strong></td>
                            <td>
                                <?php echo h($tuVanCdr['TuVanCdr']['prompt']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong>Kết quả</strong></td>
                            <td>
                                <?php echo $this->Text->autoParagraph($tuVanCdr['TuVanCdr']['completion']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong>Người yêu cầu</strong></td>
                            <td>
                                <?php echo $this->Html->link($tuVanCdr['User']['ho_va_ten_khoa_code'], array('controller' => 'users', 'action' => 'view', $tuVanCdr['User']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($tuVanCdr['TuVanCdr']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>



                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($tuVanCdr['TuVanCdr']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

