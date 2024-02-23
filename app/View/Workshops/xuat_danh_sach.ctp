<?php

setlocale(LC_ALL, "Vietnamese");

$this->PHPWord->loadEssentials();
$fileArray = array();

$chuyen_de = $workshop['Chapter']['name'];
$schedules = $workshop['Scheduling'];
$teachers = $workshop['Enrolment'];
$so_buoi = count($schedules);
if($so_buoi>=3){
    die('Vui lòng liên hệ Ban E-Learning bổ sung chức năng in danh sách khóa tập huấn có '.$so_buoi.' buổi.');
}


$this->PHPWord->loadTemplate('report/danh_sach_ky_ten_'.$so_buoi.'.docx');
$buoi_1='Buổi 1';
$buoi_2='Buổi 2';
$i=1;
foreach ($schedules as $schedule):
    
    $buoi = "";

    $time = new DateTime($schedule['start_time']);

    if ($time->format('A') == 'PM') {
        $buoi = "Chiều ";
    } else {
        $buoi = "Sáng ";
    }
    
    $buoi .= $time->format('d/m/Y');
    $this->PHPWord->setValue("buoi_".$i++, htmlspecialchars($buoi));
    

endforeach;


$thoi_gian = "";
$j = 1;

foreach ($schedules as $schedule):
    $buoi = "";

    $time = new DateTime($schedule['start_time']);

    if ($time->format('A') == 'PM') {
        $buoi = "Chiều ";
    } else {
        $buoi = "Sáng ";
    }
    $buoi .= $time->format('d/m/Y');
    if ($j == 1 && $so_buoi > 1) {


        $thoi_gian = $buoi . '; ';
        $j++;
    } else {
        if ($so_buoi == $j) {
            $thoi_gian .= $buoi;
        }
    }

endforeach;


$rowCount = count($teachers);
$this->PHPWord->setValue('chapter', htmlspecialchars($chuyen_de)); // On section/content
$this->PHPWord->setValue("thoi_gian", htmlspecialchars($thoi_gian));
if ($rowCount > 0) {


    //setup data
    $this->PHPWord->cloneRow('stt', $rowCount);
    $i = 1;
    foreach ($teachers as $student) {
        //debug($student);die;


        $this->PHPWord->setValue("department#$i", htmlspecialchars($student['Teacher']['Department']['title'])); // On footer
        $this->PHPWord->setValue("stt#$i", htmlspecialchars($i));

        $this->PHPWord->setValue("name#$i", htmlspecialchars($student['Teacher']['name']));
        $birthday = ($this->MyCommon->show_date($student['Teacher']['ngay_sinh']));
        $this->PHPWord->setValue("birthday#$i", htmlspecialchars($birthday));
        $this->PHPWord->setValue("birthplace#$i", htmlspecialchars($student['Teacher']['NoiSinh']['name']));

        $i++;
    }


    $filename = 'files/danh_sach_ky_ten/' . $workshop['name'] . '.docx';
    $this->PHPWord->saveAs($filename);

    //$fileArray[] = "files/quyet_dinh/mau_file/blank_page.docx";
}

$this->PHPWord->output($filename);

