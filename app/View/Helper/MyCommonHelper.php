<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP MyCommonHelper
 * @author MyPC
 */
class MyCommonHelper extends AppHelper {

    public $helpers = array();

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    public function boDauTiengViet($str = "") {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
    }

    function getDateFormat($dateString) {
        //Kiểm tra ngày có đúng định dạng hay không
        $format = null;
        if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/", $dateString)) {
            $format = 'Y-m-d';
        }
        if (preg_match("/^[0-9]{4}\/[0-1][0-9]\/[0-3][0-9]$/", $dateString)) {
            $format = 'Y/m/d';
        }
        if (preg_match("/^[0-1][0-9]-[0-3][0-9]-[0-9]{4}$/", $dateString)) {
            $format = 'm-d-Y';
        }

        if (preg_match("/^[0-1][0-9]\/[0-3][0-9]\/[0-9]{4}$/", $dateString)) {
            $format = 'm/d/Y';
        }

        if (preg_match("/^[0-3][0-9]-[0-1][0-9]-[0-9]{4}$/", $dateString)) {
            $format = 'd-m-Y';
        }
        if (preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $dateString)) {
            $format = 'd/m/Y';
        }
        return $format;
    }

    //Kiểm tra ngày có đúng định dạng hay không
    function isValidDate($dateString, $format = null) {

        if (is_null($format)) {
            if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/", $dateString)) {
                $format = 'Y-m-d';
            }
            if (preg_match("/^[0-9]{4}\/[0-1][0-9]\/[0-3][0-9]$/", $dateString)) {
                $format = 'Y/m/d';
            }
            if (preg_match("/^[0-1][0-9]-[0-3][0-9]-[0-9]{4}$/", $dateString)) {
                $format = 'm-d-Y';
            }

            if (preg_match("/^[0-1][0-9]\/[0-3][0-9]\/[0-9]{4}$/", $dateString)) {
                $format = 'm/d/Y';
            }

            if (preg_match("/^[0-3][0-9]-[0-1][0-9]-[0-9]{4}$/", $dateString)) {
                $format = 'd-m-Y';
            }
            if (preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $dateString)) {
                $format = 'd/m/Y';
            }
        }

        $dateTime = DateTime::createFromFormat($format, $dateString);
        $errors = DateTime::getLastErrors();
        if (!empty($errors['warning_count'])) {
            return false;
        }
        return $dateTime !== false;
    }

    //Hàm dịnh dạng tiền việt nam

    function formatVietnameseMoney($value = 0) {
        setlocale(LC_ALL, "Vietnamese");
        return number_format($value, 0, ',', '.') . ' đ';
    }

    function tienBangChu($number) {

        $hyphen = ' ';
        $conjunction = '  ';
        $separator = ' ';
        $negative = 'âm ';
        $decimal = ' phẩy ';
        $dictionary = array(
            0 => 'không',
            1 => 'một',
            2 => 'hai',
            3 => 'ba',
            4 => 'bốn',
            5 => 'năm',
            6 => 'sáu',
            7 => 'bảy',
            8 => 'tám',
            9 => 'chín',
            10 => 'mười',
            11 => 'mười một',
            12 => 'mười hai',
            13 => 'mười ba',
            14 => 'mười bốn',
            15 => 'mười năm',
            16 => 'mười sáu',
            17 => 'mười bảy',
            18 => 'mười tám',
            19 => 'mười chín',
            20 => 'hai mươi',
            30 => 'ba mươi',
            40 => 'bốn mươi',
            50 => 'năm mươi',
            60 => 'sáu mươi',
            70 => 'bảy mươi',
            80 => 'tám mươi',
            90 => 'chín mươi',
            100 => 'trăm',
            1000 => 'nghìn',
            1000000 => 'triệu',
            1000000000 => 'tỷ',
            1000000000000 => 'nghìn tỷ',
            1000000000000000 => 'nghìn triệu triệu',
            1000000000000000000 => 'tỷ tỷ'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
// overflow
            trigger_error(
                    'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . $this->tienBangChu(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int) ($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . $this->tienBangChu($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->tienBangChu($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->tienBangChu($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    function chua_quy_doi() {
        return 9;
    }

    //Ham quy doi gio giang theo quy che cu (truoc 1 thang 9 nam 2015)
    function quy_doi_quy_che_cu($soSinhVien = 15, $lyThuyet = 3, $thucHanh = 6) {
        $heSoLyThuyet = 1.1; //sĩ số <50
        $heSoThucHanh = 0;
        if ($soSinhVien < 15) {
            $heSoThucHanh = 0.6;
        }
        if (15 <= $soSinhVien && $soSinhVien <= 20) {
            $heSoThucHanh = 0.7;
        }
        if (21 <= $soSinhVien && $soSinhVien <= 25) {
            $heSoThucHanh = 0.8;
        }
        if (26 <= $soSinhVien && $soSinhVien <= 29) {
            $heSoThucHanh = 0.9;
        }
        if (30 <= $soSinhVien) {
            $heSoThucHanh = 1;
        }
        return $lyThuyet * $heSoLyThuyet + $thucHanh * $heSoThucHanh;
    }

    //Ham quy doi gio giang tu 1 thang 9 nam 2015
    function quy_doi_quy_che_2016($soSinhVien = 15, $lyThuyet = 3, $thucHanh = 6) {
        $heSoLyThuyet = 1.1; //sĩ số <50
        $heSoThucHanh = 0;
        if ($soSinhVien <= 15) {
            $heSoThucHanh = 0.8;
        }
        if (16 <= $soSinhVien && $soSinhVien <= 29) {
            $heSoThucHanh = 0.9;
        }

        if (30 <= $soSinhVien) {
            $heSoThucHanh = 1;
        }
        return $lyThuyet * $heSoLyThuyet + $thucHanh * $heSoThucHanh;
    }

    //Ham hien thi ngay sinh ra view with date format Y-m-d

    function show_date($date) {

        if ($this->isValidDate($date)) {
            $format = $this->getDateFormat($date);

            if (!empty($format)) {

                $born = DateTime::createFromFormat($format, $date);

                return $born->format('d/m/Y');
            }
        }

        return $date;
    }

    function vnd($amount) {
        if ($amount <= 0) {
            return $textnumber = "Tiền phải là số nguyên dương lớn hơn số 0";
        }
        $Text = array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
        $TextLuythua = array("", "nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
        $textnumber = "";
        $length = strlen($amount);

        for ($i = 0; $i < $length; $i++)
            $unread[$i] = 0;

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);

            if (($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)) {
                for ($j = $i + 1; $j < $length; $j++) {
                    $so1 = substr($amount, $length - $j - 1, 1);
                    if ($so1 != 0)
                        break;
                }

                if (intval(($j - $i ) / 3) > 0) {
                    for ($k = $i; $k < intval(($j - $i) / 3) * 3 + $i; $k++)
                        $unread[$k] = 1;
                }
            }
        }

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);
            if ($unread[$i] == 1)
                continue;

            if (($i % 3 == 0) && ($i > 0))
                $textnumber = $TextLuythua[$i / 3] . " " . $textnumber;

            if ($i % 3 == 2)
                $textnumber = 'trăm ' . $textnumber;

            if ($i % 3 == 1)
                $textnumber = 'mươi ' . $textnumber;


            $textnumber = $Text[$so] . " " . $textnumber;
        }

        //Phai de cac ham replace theo dung thu tu nhu the nay
        $textnumber = str_replace("không mươi", "lẻ", $textnumber);
        $textnumber = str_replace("lẻ không", "", $textnumber);
        $textnumber = str_replace("mươi không", "mươi", $textnumber);
        $textnumber = str_replace("một mươi", "mười", $textnumber);
        $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
        $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
        $textnumber = str_replace("mười năm", "mười lăm", $textnumber);

        return ucfirst($textnumber . " đồng");
    }
}
