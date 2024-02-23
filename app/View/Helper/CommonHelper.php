<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


App::import('Vendor', 'simplehtmldom', array('file' => 'simplehtmldom' . DS . 'simple_html_dom.php'));
App::uses('CakeText', 'Utility');

/**
 * CakePHP MyCommonHelper
 * @author MyPC
 */
class CommonHelper extends AppHelper {

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

    public function html2text($Document) {

        return CakeText::truncate(str_get_html($Document)->plaintext, 200,
                        array(
                            'ellipsis' => '...',
                            'exact' => false
        ));
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

    //Kiểm tra ngày có đúng định dạng hay không
    function isValidDateTime($dateString, $format = null) {

        if (is_null($format)) {
            if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9] [0-23]:[0-59]:[0-59]$/", $dateString)) {
                $format = 'Y-m-d H:i:s';
            }
            if (preg_match("/^[0-9]{4}\/[0-1][0-9]\/[0-3][0-9] [0-23]:[0-59]:[0-59]$/", $dateString)) {
                $format = 'Y/m/d H:i:s';
            }
            if (preg_match("/^[0-1][0-9]-[0-3][0-9]-[0-9]{4} [0-23]:[0-59]:[0-59]$/", $dateString)) {
                $format = 'm-d-Y H:i:s';
            }

            if (preg_match("/^[0-1][0-9]\/[0-3][0-9]\/[0-9]{4} [0-23]:[0-59]:[0-59]$/", $dateString)) {
                $format = 'm/d/Y H:i:s';
            }

            if (preg_match("/^[0-3][0-9]-[0-1][0-9]-[0-9]{4} [0-23]:[0-59]:[0-59]$/", $dateString)) {
                $format = 'd-m-Y H:i:s';
            }
            if (preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4} [0-23]:[0-59]:[0-59]$/", $dateString)) {
                $format = 'd/m/Y H:i:s';
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

    //Ham hien thi ngay sinh ra view with date format Y-m-d

    function showTrueFalseAsCheck($value = "") {
        if ($value == "") {
            echo "";
        } else
        if ($value) {
            echo '<span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>';
        }
    }

    //Ham hien thi ngay sinh ra view with date format Y-m-d

    function showPass($value = "") {
        if ($value == "") {
            echo "Chưa đánh giá";
        } else
        if ($value) {
            echo '<span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i> ĐẠT</span>';
        } else {
            echo '<span class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> KHÔNG ĐẠT</span>';
        }
    }

    function showStatus($status) {
        switch ($status) {

            case WORKSHOP_DA_MO:
                return '<button class="button btn-info"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Đã mở</button>';
                break;
            case WORKSHOP_DA_HUY:
                return '<button class="button btn-danger"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Đã hủy</button>';
                break;

            default:
                return '<button class="button btn-success"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Đang đăng ký</button>';
                break;
        }
    }

    function showSupportingRequestStatus($status) {
        switch ($status) {

            case YEU_CAU_HO_TRO_DA_XU_LY:
                return '<button class="button btn-info"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Đã xử lý</button>';
                break;

            default:
                return '<button class="button btn-success"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Đang chờ xử lý</button>';
                break;
        }
    }

    function getStatus($not_show = array()) {

        $all_status = array(
            WORKSHOP_DA_MO => 'Đã mở',
            WORKSHOP_DA_HUY => 'Đã hủy',
            WORKSHOP_DANG_DANG_KY => 'Đang đăng ký',
        );
        if (empty($not_show)) {
            return $all_status;
        }
        foreach ($all_status as $key => $value) {
            if (in_array($key, $not_show)) {
                $all_status = array_diff($all_status, array($key => $value));
            }
        }
        return $all_status;
    }

    function getVaiTro() {
        return array(
            ROLE_TRUONG_NHOM => 'Trưởng nhóm',
            ROLE_THANH_VIEN => 'Thành viên'
        );
    }

    function showVaiTro($value) {
        $return = "Không xác định";
        switch ($value) {
            case ROLE_TRUONG_NHOM:
                $return = "Trưởng nhóm";
                break;
            case ROLE_THANH_VIEN:
                $return = "Thành viên";
                break;
        }
        return $return;
    }

    function getTinhTrangDangKy() {
        return array(
            DA_DANG_KY => 'Đã đăng ký',
            DA_HUY => 'Đã hủy',
            DA_XONG => 'Đã xong'
        );
    }

    //Ham hien thi ngay sinh ra view with date format Y-m-d

    public function showTrueFalseAsCheckOrEmpty($value = true) {
        if (!$value) {
            echo "";
        } else
        if ($value) {
            echo '<span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>';
        }
    }

    function showTrueFalseAsCheckNotTitle($value = true) {
        if ($value == "" || is_null($value)) {
            echo "Chưa đánh giá";
        } else
        if ($value) {
            echo '<span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>';
        } else {
            echo '<span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span>';
        }
    }
}
