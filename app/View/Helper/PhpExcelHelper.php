<?php

App::uses('AppHelper', 'Helper');

/**
 * Helper for working with PHPExcel class.
 * PHPExcel has to be in the vendors directory.
 */
class PhpExcelHelper extends AppHelper {

    /**
     * Instance of PHPExcel class
     * @var object
     */
    public $xls;

    /**
     * Pointer to actual row
     * @var int
     */
    protected $row = 1;

    /**
     * Internal table params 
     * @var array
     */
    protected $tableParams;

    /**
     * Constructor
     */
    public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
    }

    /**
     * Create new worksheet
     */
    public function createWorksheet() {
        $this->loadEssentials();
        $this->xls = new PHPExcel();
    }

    /**
     * Create new worksheet from existing file
     */
    public function loadWorksheet($path) {
        $this->loadEssentials();

        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->xls = $objReader->load($path);
    }

    public function mergeCells($range = null) {
        if ($range) {
            $this->xls->getActiveSheet()
                    ->mergeCells($range);
        }
    }

    public function setBorder($range = null, $style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))) {
        if ($range) {
            $this->xls->getActiveSheet()
                    ->getStyle($range)->applyFromArray($style);
        }
    }

    //align
    public function setTextAlign($range = null, $align = 'left') {
        if ($range) {
            $this->xls->getActiveSheet()
                    ->getStyle($range)->getAlignment()->applyFromArray(
                    array('horizontal' => $align));
        }
    }

//Tự động độ rộng cột $rang="A:I"

    public function setColAutoSize($from, $to, $style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)))) {

        foreach (range($from, $to) as $columnID) {
            $this->xls->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
    }

    /**
     * merge cell 
     * */
    public function writeDataToCell($row, $column, $value) {
        $this->xls->getActiveSheet()
                ->setCellValue($column . '' . $row, $value);
        $this->row++;
    }

    /**
     * Set row pointer
     */
    public function setRow($to) {
        $this->row = (int) $to;
    }

    public function getRow() {
        return $this->row;
    }

    /**
     * Set default font
     */
    public function setDefaultFont($name, $size) {
        $this->xls->getDefaultStyle()->getFont()->setName($name);
        $this->xls->getDefaultStyle()->getFont()->setSize($size);
    }

    public function setTextStyle($cell, $fontWeight = 'normal', $color = array('rgb' => '000000'), $size = 13, $name = 'Times New Roman') {
        $styleArray = array(
            'font' => array(
                $fontWeight => true,
                'color' => $color,
                'size' => $size,
                'name' => $name
        ));
        $this->xls->getActiveSheet()->getStyle($cell)->applyFromArray($styleArray);
    }

    public function wrapTextInCell($cell) {
        $this->xls->getActiveSheet()->getStyle($cell)->getAlignment()->setWrapText(true);
    }

    public function wrapTextInColumn($col) {
        $this->xls->getActiveSheet()->getStyle($col . '1:' . $col . '' . $this->xls->getActiveSheet()->getHighestRow())
                ->getAlignment()->setWrapText(true);
    }

    /**
     * Start table
     * inserts table header and sets table params
     * Possible keys for data:
     *   label   -  table heading
     *   width  -  "auto" or units
     *   filter  -  true to set excel filter for column
     *   wrap  -  true to wrap text in column
     * Possible keys for params:
     *   offset  -  column offset (numeric or text)
     *   font  -  font name
     *   size  -  font size
     *   bold  -  true for bold text
     *   italic  -  true for italic text
     *   
     */
    public function addTableHeader($data, $params = array()) {
        // offset
        $offset = 0;
        if (array_key_exists('offset', $params))
            $offset = is_numeric($params['offset']) ? (int) $params['offset'] : PHPExcel_Cell::columnIndexFromString($params['offset']);
        // font name
        if (array_key_exists('font', $params))
            $this->xls->getActiveSheet()->getStyle($this->row)->getFont()->setName($params['font']);
        // font size
        if (array_key_exists('size', $params))
            $this->xls->getActiveSheet()->getStyle($this->row)->getFont()->setSize($params['font_size']);
        // bold
        if (array_key_exists('bold', $params))
            $this->xls->getActiveSheet()->getStyle($this->row)->getFont()->setBold($params['bold']);
        // italic
        if (array_key_exists('italic', $params))
            $this->xls->getActiveSheet()->getStyle($this->row)->getFont()->setItalic($params['italic']);

        // set internal params that need to be processed after data are inserted
        $this->tableParams = array(
            'header_row' => $this->row,
            'offset' => $offset,
            'row_count' => 0,
            'auto_width' => array(),
            'filter' => array(),
            'wrap' => array()
        );

        foreach ($data as $d) {
            // set label
            $this->xls->getActiveSheet()->setCellValueByColumnAndRow($offset, $this->row, $d['label']);
            // set width
            if (array_key_exists('width', $d)) {
                if ($d['width'] == 'auto')
                    $this->tableParams['auto_width'][] = $offset;
                else
                    $this->xls->getActiveSheet()->getColumnDimensionByColumn($offset)->setWidth((float) $d['width']);
            }
            // filter
            if (array_key_exists('filter', $d) && $d['filter'])
                $this->tableParams['filter'][] = $offset;
            // wrap
            if (array_key_exists('wrap', $d) && $d['wrap'])
                $this->tableParams['wrap'][] = $offset;

            $offset++;
        }
        $this->row++;
    }

    /**
     * Write array of data to actual row
     */
    public function addTableRow($data) {
        $offset = $this->tableParams['offset'];

        foreach ($data as $d) {
            $this->xls->getActiveSheet()->setCellValueByColumnAndRow($offset++, $this->row, $d);
        }
        $this->row++;
        $this->tableParams['row_count']++;
    }

    /**
     * End table
     * sets params and styles that required data to be inserted
     */
    public function addTableFooter() {
        // auto width
        foreach ($this->tableParams['auto_width'] as $col)
            $this->xls->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
        // filter (has to be set for whole range)
        if (count($this->tableParams['filter']))
            $this->xls->getActiveSheet()->setAutoFilter(PHPExcel_Cell::stringFromColumnIndex($this->tableParams['filter'][0]) . ($this->tableParams['header_row']) . ':' . PHPExcel_Cell::stringFromColumnIndex($this->tableParams['filter'][count($this->tableParams['filter']) - 1]) . ($this->tableParams['header_row'] + $this->tableParams['row_count']));
        // wrap
        foreach ($this->tableParams['wrap'] as $col)
            $this->xls->getActiveSheet()->getStyle(PHPExcel_Cell::stringFromColumnIndex($col) . ($this->tableParams['header_row'] + 1) . ':' . PHPExcel_Cell::stringFromColumnIndex($col) . ($this->tableParams['header_row'] + $this->tableParams['row_count']))->getAlignment()->setWrapText(true);
    }

    /**
     * Write array of data to actual row starting from column defined by offset
     * Offset can be textual or numeric representation
     */
    public function addData($data, $offset = 0) {
        // solve textual representation
        if (!is_numeric($offset))
            $offset = PHPExcel_Cell::columnIndexFromString($offset);

        foreach ($data as $d) {
            $this->xls->getActiveSheet()->setCellValueByColumnAndRow($offset++, $this->row, $d);
        }
        $this->row++;
    }

    /**
     * Output file to browser
     */
    public function output($filename = 'export.xlsx') {

        // set layout

        $this->_View->layout = '';
        // headers
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // writer
        //PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
        $objWriter = PHPExcel_IOFactory::createWriter($this->xls, 'Excel2007');

        ob_end_clean();

        $objWriter->save('php://output');
        //debug('dang luu');die;
        // clear memory
        $this->xls->disconnectWorksheets();
    }

    /**
     * Load vendor classes
     */
    protected function loadEssentials() {
        // load vendor class
        App::import('Vendor', 'PHPExcel/Classes/PHPExcel');
        if (!class_exists('PHPExcel')) {
            throw new CakeException('Vendor class PHPExcel not found!');
        }
    }

    function getActiveSheet() {
        return $this->xls->getActiveSheet();
    }

    function setActiveSheet($sheetnumber) {
        $this->xls->setActiveSheetIndex($sheetnumber);
    }

    protected function setTitle($newTitle) {
        $this->xls->getActiveSheet()->setTitle($newTitle);
    }
}
