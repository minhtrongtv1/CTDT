<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP CommonComponent
 * @author NguyenThai
 */
class CommonComponent extends Component {

    public $components = array();

    public function initialize(Controller $controller) {
        
    }

    public function startup(Controller $controller) {
        
    }

    public function beforeRender(Controller $controller) {
        
    }

    public function shutDown(Controller $controller) {
        
    }

    public function beforeRedirect(Controller $controller, $url, $status = NULL, $exit = true) {
        
    }

    function number_of_days($days, $start, $end) {
        $w = array(date('w', $start), date('w', $end));
        $x = floor(($end - $start) / ONE_WEEK);
        $sum = 0;

        for ($day = 0; $day < 7; ++$day) {
            if ($days & pow(2, $day)) {
                $sum += $x + ($w[0] > $w[1] ? $w[0] <= $day || $day <= $w[1] : $w[0] <= $day && $day <= $w[1]);
            }
        }

        return $sum;
    }

    //Ngày phải định dạng dd/mm/yyyy
    function chuyenNgaySangDangOx($ngay) {

        $ngay = DateTime::createFromFormat('d/m/Y', $ngay);
        $jd = cal_to_jd(CAL_GREGORIAN, $ngay->format('m'), $ngay->format('d'), $ngay->format('Y'));
        $day = jddayofweek($jd, 0);
        switch ($day) {
            case 0:
                $thu = 0x01; //CN
                break;
            case 1:
                $thu = 0x02;//Hai
                break;
            case 2:
                $thu = 0x04;//Ba
                break;
            case 3:
                $thu = 0x08;//Tư
                break;
            case 4:
                $thu = 0x10;//Nắm
                break;
            case 5:
                $thu = 0x20;//Sáu
                break;
            case 6:
                $thu = 0x40;//Bảy
                break;
//Vì mod bằng 0
        }
        return $thu;
    }

}
