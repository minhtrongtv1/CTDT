<?php

setlocale(LC_ALL, "Vietnamese");

$this->PHPWord->loadEssentials();
$fileArray = array();

$chuyen_de = $workshop['Chapter']['name'];
$schedules = $workshop['Schedule'];
$teachers = $workshop['Teacher'];
$so_buoi = count($schedules);
$this->PHPWord->loadTemplate('files/quyet_dinh/mau_file/danh_sach_ky_ten.docx');
$rowCount = count($teachers);
$this->PHPWord->setValue('chapter', htmlspecialchars($chuyen_de)); // On section/content
if ($rowCount > 0) {

    
    //setup data
    $this->PHPWord->cloneRow('stt', $rowCount);
    $i = 1;
    foreach ($teachers as $student) {
        if ($i == 1) {
            $this->PHPWord->setValue('department', htmlspecialchars($student['Department']['name'])); // On footer
            
        }

        $this->PHPWord->setValue("stt#$i", htmlspecialchars($i));
        
        $this->PHPWord->setValue("name#$i", htmlspecialchars($student['name']));
        $birthday = ($this->MyCommon->show_date($student['ngay_sinh']));
        $this->PHPWord->setValue("birthday#$i", htmlspecialchars($birthday));
        $this->PHPWord->setValue("birthplace#$i", htmlspecialchars($student['NoiSinh']['name']));
        
        $i++;
    }


    $filename = 'files/danh_sach_ky_ten/' . $workshop['name'] . '.docx';
    $this->PHPWord->saveAs($filename);

 
    //$fileArray[] = "files/quyet_dinh/mau_file/blank_page.docx";
}

$this->PHPWord->output($filename);

