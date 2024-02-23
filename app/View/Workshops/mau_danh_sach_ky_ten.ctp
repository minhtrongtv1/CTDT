<?php

ini_set('max_execution_time', 120);
//Thong tin mon hoc
$certificates = $quyetdinh['Certificate'];
$certificates = Set::sort($certificates, '{n}.cert_no', 'asc');
$certificates = Hash::combine($certificates, '{n}.cert_no', '{n}.Student', '{n}.classroom');
?>
<?php

setlocale(LC_ALL, "Vietnamese");

$this->PHPWord->loadEssentials();
$fileArray = array();

$dec_no = $quyetdinh['Quyetdinh']['soqd'];
$ngay_ky = explode("-", $quyetdinh['Quyetdinh']['ngay_ky']);

foreach ($certificates as $classroom => $students) {
    $rowCount = count($students);

    if ($rowCount > 0) {
        $this->PHPWord->loadTemplate('files/quyet_dinh/mau_file/mau_quyet_dinh_mot_lop.docx');
        $this->PHPWord->setValue('dec_no', htmlspecialchars($dec_no)); // On section/content
        $this->PHPWord->setValue('dd', htmlspecialchars($ngay_ky[0])); // On section/content
        $this->PHPWord->setValue('mm', htmlspecialchars($ngay_ky[1])); // On section/content
        $this->PHPWord->setValue('yyyy', htmlspecialchars($ngay_ky[2])); // On section/content
        $this->PHPWord->setValue('className', htmlspecialchars($classroom)); // On section/content
        //setup data
        $this->PHPWord->cloneRow('stt', $rowCount);
        $i = 1;
        foreach ($students as $student) {
            if ($i == 1) {
                $this->PHPWord->setValue('departmentName', htmlspecialchars($student['Classroom']['Department']['name'])); // On footer
                $textCount = ($rowCount < 10) ? "0$rowCount" : $rowCount;
                $this->PHPWord->setValue('count', $textCount);
            }

            $this->PHPWord->setValue("stt#$i", htmlspecialchars($i));
            $this->PHPWord->setValue("username#$i", htmlspecialchars($student['username']));
            $this->PHPWord->setValue("name#$i", htmlspecialchars($student['name']));
            $birthday = ($this->MyCommon->show_date($student['borndate']));
            if (!$student['khong_co_ngay_sinh']) {
                $this->PHPWord->setValue("birthday#$i", htmlspecialchars($birthday));
            } else {
                $this->PHPWord->setValue("birthday#$i", htmlspecialchars($birthday));
            }
            $this->PHPWord->setValue("birthplace#$i", htmlspecialchars($student['Province']['name']));
            $sex = ($student['sex'] == 'F') ? 'Nữ' : 'Nam';
            $this->PHPWord->setValue("sex#$i", htmlspecialchars($sex));
            $i++;
        }


        $filename = 'files/quyet_dinh/' . $classroom . '.docx';
        $this->PHPWord->saveAs($filename);


        $fileArray[] = $filename;
        //$fileArray[] = "files/quyet_dinh/mau_file/blank_page.docx";
    }
}

$out = $this->PHPWord->mergeFile($fileArray);

foreach ($fileArray as $file) {
    if ($file != "files/quyet_dinh/mau_file/blank_page.docx") {
        $file = new File($file);
        $file->delete();
    }
}

$this->PHPWord->output($out);


