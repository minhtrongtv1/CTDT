<?php

setlocale(LC_ALL, "Vietnamese");

$this->PHPWord->loadEssentials();
$fileArray = array();

$level = $curriculumn['Level']['name'];
$major_name = $curriculumn['Major']['name'];
$major_code = $curriculumn['Major']['code'];
$formOfTrainning = $curriculumn['FormOfTrainning']['name'];
$department = $curriculumn['Department']['title'];
$curriculumn_vn = $curriculumn['Curriculumn']['name_vn'];
$curriculumn_en = $curriculumn['Curriculumn']['name_eng'];

$this->PHPWord->loadTemplate('report/danh_sach_ctdt' . '.docx');

$rowCount = count($curriculumn);
//$this->PHPWord->setValue('chapter', htmlspecialchars($chuyen_de)); // On section/content
//$this->PHPWord->setValue("thoi_gian", htmlspecialchars($thoi_gian));
if ($rowCount > 0) {


    //setup data
    //$this->PHPWord->cloneRow('stt', $rowCount);
   // $i = 1;
  
        //debug($student);die;


        $this->PHPWord->setValue("department", htmlspecialchars($department)); // On footer
        //   $this->PHPWord->setValue("stt#$i", htmlspecialchars($i));
        $this->PHPWord->setValue("curriculumn_namevn", htmlspecialchars($curriculumn_vn));
        $this->PHPWord->setValue("curriculumn_nameen", htmlspecialchars($curriculumn_en));
        $this->PHPWord->setValue("level", htmlspecialchars($level));
        $this->PHPWord->setValue("major_name", htmlspecialchars($major_name));
        $this->PHPWord->setValue("major_code", htmlspecialchars($major_code));
        $this->PHPWord->setValue("form_of_trainnings", htmlspecialchars($formOfTrainning));

        

      //  $i++;
    


    $filename = 'files/danh_sach_ky_ten/' . $curriculumn['id'] . '.docx';
    $this->PHPWord->saveAs($filename);

    //$fileArray[] = "files/quyet_dinh/mau_file/blank_page.docx";
}

$this->PHPWord->output($filename);

