<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP MyCommonBehavior
 * @author MyPC
 */
class CommonBehavior extends ModelBehavior {

    public function setup(Model $model, $settings = array()) {
        $this->settings[$model->alias] = $settings;
    }

    public function cleanup(Model $model) {
        parent::cleanup($model);
    }

//Kiểm tra ngày có đúng định dạng hay không
    function isValidDate($dateString, $format = 'd/m/Y') { 
        
        $dateTime = DateTime::createFromFormat($format, $dateString);
        $errors = DateTime::getLastErrors();
        if (!empty($errors['warning_count'])) {
            return false;
        }
        return $dateTime !== false;
    }

    public function boDauTiengViet(Model $Model, $str = "") {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ầ|ấ|ậ|ẩ|ẫ|ầ|ă|ằ|ắ|ặ|ẳ|ẵ|ẩ|ạ)/", 'a', $str);
        $str = preg_replace("/(é|è|é|ẹ|ẽ|ệ|ẻ|ễ|ê|ề|ế|ệ|ể|ễ|ễ|ế)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ|ị|ì)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ọ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ụ|ù)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|ỹ|ỳ|ý)/", 'y', $str);
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

    //Tinhs phan tram

    function percent(Model $model, $num_amount, $num_total) {
        $count1 = $num_amount / $num_total;

        $count2 = $count1 * 100;
        $count = number_format($count2, 0);

        return $count;
    }

}
