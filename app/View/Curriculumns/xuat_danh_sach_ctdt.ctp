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
$credit = $curriculumn['Curriculumn']['credit'];
$trainning_time = $curriculumn['Curriculumn']['trainning_time'];
$enrollment_subject = $curriculumn['Curriculumn']['enrollment_subject'];
$point_ladder = $curriculumn['Curriculumn']['point_ladder'];
$graduation_condition = $curriculumn['Curriculumn']['graduation_condition'];
$diploma = $curriculumn['Diploma']['name'];

$curriculumnsreferences = $curriculumn['CurriculumnsReference'];
#$typereference = $curriculumn['CurriculumnsReference']['typereference'];
$schools= $curriculumn['CurriculumnsReference'];



$school_ngoai_nuoc="";
$school_trong_nuoc="";
$test="";
$refe="";
$schooll="";


foreach($schools as $school):
    //debug($school);die;
    if($school['typereference']=="0"){
        $refe.=$school['name']." ";
        $schooll.=$school['school']." ";
        $school_trong_nuoc.=$school['typereference']." ";
        //$typeschool.=$school['typereference']." ";
        $test.=$school['address']." ";
    }
    
    if($school['typereference']=="1"){
        $refe.=$school['name']." ";
        $schooll.=$school['school']." ";
        $school_trong_nuoc.=$school['typereference']." ";
        //$typeschool.=$school['typereference']." ";
        $test.=$school['address']." ";
    }

endforeach;

//debug( $school_ngoai_nuoc);die;
$address= $curriculumn['CurriculumnsReference']['address'];

$this->PHPWord->loadTemplate('report/danh_sach_ctdt' . '.docx');

$rowCount = count($curriculumn);
//$this->PHPWord->setValue('chapter', htmlspecialchars($chuyen_de)); // On section/content
//$this->PHPWord->setValue("thoi_gian", htmlspecialchars($thoi_gian));
if ($rowCount > 0) {


    //setup data
    //$this->PHPWord->cloneRow('stt', $rowCount);
    $i = 1;
  
        //debug($student);die;

foreach($schools as $school){
        $this->PHPWord->setValue("department", htmlspecialchars($department)); // On footer
        //   $this->PHPWord->setValue("stt#$i", htmlspecialchars($i));
        $this->PHPWord->setValue("curriculumn_namevn", htmlspecialchars($curriculumn_vn));
        $this->PHPWord->setValue("curriculumn_nameen", htmlspecialchars($curriculumn_en));
        $this->PHPWord->setValue("level", htmlspecialchars($level));
        $this->PHPWord->setValue("major_name", htmlspecialchars($major_name));
        $this->PHPWord->setValue("major_code", htmlspecialchars($major_code));
        $this->PHPWord->setValue("form_of_trainnings", htmlspecialchars($formOfTrainning));
        $this->PHPWord->setValue("credit", htmlspecialchars($credit));
        $this->PHPWord->setValue("trainning_time", htmlspecialchars($trainning_time));
        $this->PHPWord->setValue("enrollment_subject", htmlspecialchars($enrollment_subject));
        $this->PHPWord->setValue("point_ladder", htmlspecialchars($point_ladder));
        $this->PHPWord->setValue("graduation_condition", htmlspecialchars($graduation_condition));
        $this->PHPWord->setValue("diploma", htmlspecialchars($diploma));
        
        $this->PHPWord->setValue("curriculumnsreferences", htmlspecialchars($refe));
        $this->PHPWord->setValue("typereference", htmlspecialchars($school_trong_nuoc));      
        $this->PHPWord->setValue("school", htmlspecialchars($schooll));
        $this->PHPWord->setValue("address", htmlspecialchars($test));
        
        $i++;
}


    $filename = 'files/danh_sach_ctdt/' . $curriculumn['id'] . '.docx';
    $this->PHPWord->saveAs($filename);

    //$fileArray[] = "files/quyet_dinh/mau_file/blank_page.docx";
}

$this->PHPWord->output($filename);

