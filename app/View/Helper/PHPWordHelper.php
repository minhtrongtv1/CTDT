<?php

App::uses('clsTbsZip', 'Lib');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::import('Vendor', 'DocxMerge', array('file' => 'DocxMerge/vendor/autoload.php'));

use PhpOffice\PhpWord\Shared\Html as HTMLParser;
use DocxMerge\DocxMerge;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP PHPWordHelper
 * @author NGUYEN THAI TOAN
 */
class PHPWordHelper extends AppHelper {

    public $template;
    public $parser;

    public function loadEssentials() {
        App::import('Vendor', 'PhpWord', array('file' => 'PhpWord/autoload.php'));
        App::import('Vendor', 'HTMLtoOpenXML', array('file' => 'HTMLtoOpenXML/HTMLtoOpenXML.php'));
        //\HTMLtoOpenXML\Autoloader::register();
        $this->parser = HTMLtoOpenXML::getInstance();
    }

    /**
     * Load template (docx file) from existing file
     */
    public function loadTemplate($path) {

        $this->template = new \PhpOffice\PhpWord\TemplateProcessor($path);
    }

    /* set value */

    public function setTextValue($search_term = null, $value = "") {
        if ($search_term) {


            $this->template->setValue($search_term, $value);
        }
    }

    /* set value */

    public function setValue($search_term = null, $value = "") {
        if ($search_term) {
            \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
            $html = ($this->parser->fromHTML($value));

            $html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');

            $html = str_replace(array("<i>", "<w:b/>", '</h2>', "<w:pStyle w:val='BulletStyle'/>",
                '<strong>', '</w:rPr>', "<w:u w:val='single'/>", "<w:i/>", "<w:rPr>", "<w:t xml:space='preserve'>", "</w:t>", "</w:r>", "</w:p>", "<w:p>", "<w:pPr>", "<w:pStyle w:val='OurStyle2'/>", "</w:pPr>", "<w:r>", "<w:t xml:space='preserve'></w:t>", "</w:r></w:p>"), '', $html);

            $this->template->setValue($search_term, $html);
            \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(false);
        }
    }

    public function cloneBlock($blockName, $blockNumber) {
        $this->template->cloneBlock($blockName, $blockNumber, true, true);
    }

    public function addValueBlock($blockname, $clones = 1, $replace = true, $indexVariables = false, $variableReplacements = null) {
        $this->template->cloneBlock($blockname, $clones, $replace, $indexVariables, $variableReplacements);
    }

    public function saveAs($path = 'files/hopdongbiensoan/hdbs.docx') {
        if ($path) {
            $this->template->saveAs($path);
        }
        return $path;
    }

    public function cloneRow($search, $numberOfClones) {
        $this->template->cloneRow($search, $numberOfClones);
    }

    public function output($file) {
        //$this->loadIOFactory();
        $this->_View->layout = '';

        // headers
        ob_end_clean();
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        ob_end_clean();
        flush();
        readfile($file);
        exit;
    }

    public function mergeFile($file_array = array()) {

        $final = new File('/tmp/final.docx');

        foreach ($file_array as $file) {
            $file = new File($file);
        }
        //die;
        if (empty($file_array)) {
            throw new Exception('Merge files are empty');
        }
        $dm = new DocxMerge();
        ($dm->merge($file_array, $final->path));
        return $final->path;
    }
}
