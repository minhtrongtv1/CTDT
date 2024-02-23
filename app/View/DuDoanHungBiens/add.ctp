<style>
    .error-message{
        color:red
    }
    th, td {
        padding: 15px;
    }
</style>
<section id="contact" class="contact">
    <div class="container">

        <div class="row">

            <div class="col-md-8 offset-md-2 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">

                <h2 >DỰ ĐOÁN THÍ SINH GIẢI NHẤT HỘI THI HÙNG BIỆN 2022</h2>

                <p class="text-info">(Lưu ý: Mỗi số điện thoại chỉ tham gia dự đoán 01 lần).</p>               
                <?php
                echo $this->Form->create('DuDoanHungBien', array(
                    'role' => 'form',
                    //'class' => 'php-email-form',
                    'inputDefaults' => array(
                        'class' => 'form-control',
                    )
                        )
                );
                ?>
                <?php echo $this->Form->input('ho_va_ten', array('label' => 'Họ và tên người tham gia dự đoán')); ?>
                <br>
                <?php echo $this->Form->input('so_dien_thoai', array('label' => 'Số điện thoại')); ?>
                <br>
                <h3>Hãy chọn 01 trong các thí sinh dưới đây:</h3>
                <hr>
                <table boder="0" class="table table-responsive">

                    <?php
                    //debug($thiSinhs);die;
                    $n = count($thiSinhs);
                    $so_dong = ceil($n / 2);

                    $c = 0;
                    for ($i = 0; $i < $so_dong; $i++):
                        ?>
                        <tr>
                            <?php
                            for ($j = 2*$i; ($j <= 2*$i+1)&&($j<$n); $j++):
                                ?>
                                <td class="profile-picture">
                                    <?php
                                    if (!empty($thiSinhs[$j]['ThiSinh']['anh_dai_dien'])) {
                                        $photo = BASE_URL . "files/thi_sinh_hung_bien/anh_dai_dien/{$thiSinhs[$j]['ThiSinh']['id']}/{$thiSinhs[$j]['ThiSinh']['anh_dai_dien']}";
                                    } else {
                                        $photo = BASE_URL . 'img/no-image.png';
                                    }
                                    ?>
                                    <img class="avatar editable img-responsive" style="max-height:150px; max-width: 225px" alt="<?php echo $thiSinhs[$j]['ThiSinh']['ho_va_ten'] ?>" src="<?php echo $photo ?>" style="display: block;"/>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="data[DuDoanHungBien][thi_sinh_id]" id="inlineRadio1" value="<?php echo $thiSinhs[$j]['ThiSinh']['id'] ?>">
                                        <label class="form-check-label" for="inlineRadio1"><?php echo $thiSinhs[$j]['ThiSinh']['ho_va_ten'] ?> - SBD: <?php echo $thiSinhs[$j]['ThiSinh']['so_bao_danh'] ?></label>
                                    </div>
                                </td>
                                <?php
                            endfor;
                            
                            ?>
                        </tr><!-- comment -->
                    <?php endfor; ?>
                </table>


                <?php //echo $this->Form->input('thi_sinh_id', array('label' => 'Chọn thí sinh'));   ?>
                <br>
                <?php echo $this->Form->input('so_du_doan', array('label' => 'Dự đoán số người tham gia dự đoán')); ?>



                <div class="hr hr-24"></div>
                <div class="my-3"><div class="loading"></div>
                    <div class="error-message"></div>
                    <div class="sent-message"></div>

                </div>
                <div class="text-center"><button type="submit">Thực hiện</button></div>
                <?php echo $this->Form->end(); ?>

            </div>
        </div>
    </div></section>

