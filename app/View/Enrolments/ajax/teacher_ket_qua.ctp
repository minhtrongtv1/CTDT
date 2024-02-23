<table id="grid-sinh-vien" class="table table-bordered table-hover">
            <thead>
            <th ><input type="checkbox" id="check-all"> Chọn tất cả | <span id="dao-chon" class="btn btn-xs">Đảo chọn</span></th>
            <th>TT</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Kết quả</th>
            <th>Số QĐ</th>
            
            <th>Ngày ký QĐ</th>
            <th >Vắng có phép</th>
            <th >Vắng không phép</th>            
            <th >Lý do vắng</th>
            <th>Link file QĐ</th>
            <th></th>

            </thead>
            <tbody>
                <?php
                $stt = 1;
                foreach ($workshop['Enrolment'] as $student):
                    ?>
                    <tr>
                        <td><input type = "checkbox" class = "enrollment-checkbox" name = "selete-item" value="<?php echo $student['id'] ?>" id="checkbox_<?php echo $student['id'] ?>"></td>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $student['Teacher']['name']; ?></td>
                        <td><?php echo $student['Teacher']['email']; ?></td>
                        <td class="pass-value"><?php echo $this->Common->showTrueFalseAsCheckNotTitle($student['result']); ?></td>
                        <td><?php echo $student['so_qd']; ?></td>
                        <td><?php echo $student['ngay_qd']; ?></td>
                        <td class="vang_co_phep_td"><?php echo $this->Common->showTrueFalseAsCheckOrEmpty($student['vang_co_phep']); ?></td>
                        <td class="vang_khong_phep_td"><?php echo $this->Common->showTrueFalseAsCheckOrEmpty($student['vang_khong_phep']); ?></td>

                        <td><?php echo $student['ly_do_vang']; ?></td>
                        <td><?php if(!empty($student['link_file_qd']))echo $this->Html->link('Xem QĐ',$student['link_file_qd']); ?></td>
                        <td>
                            <?php if (!$student['vang_co_phep']): ?>
                                <button class="btn btn-xs btn-success danh-dau-vang-btn" value="<?php echo $student['id'] ?>">
                                    <i class="ace-icon fa fa-check"></i>
                                    Đánh dấu VẮNG CÓ PHÉP
                                </button>
                            <?php endif; ?>


                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            
            <tfoot>
                <tr cols="2"><td>Số lượng HV: </td>
                    <td cols="6"><b><?php echo $stt - 1; ?></b>
                    </td>
                </tr>
                <tr cols="2">
                    <td>Số lượng HV đạt: </td>
                    <td cols="6" id="so-sv-dat">
                        <b></b>

                    </td></tr>
                <tr cols="2">
                    <td>Số lượng HV không đạt: </td>
                    <td cols="6" id="so-sv-khong-dat">
                        <b></b>
                    </td>
                </tr>
            </tfoot>
            
        </table>