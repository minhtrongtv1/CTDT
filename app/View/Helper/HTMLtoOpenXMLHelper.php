<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP PHPWordHelper
 * @author NGUYEN THAI TOAN
 */
class HTMLtoOpenXMLHelper extends AppHelper {

    public function loadEssentials() {
        App::import('Vendor', 'HTMLtoOpenXML', array('file' => 'HTMLtoOpenXML/HTMLtoOpenXML.php'));
    }

    public function __construct() {
        $this->loadEssentials();
    }

    public function html2Text($html) {

        return htmlentities(HTMLtoOpenXML::getInstance()->fromHTML($html));
    }
}
