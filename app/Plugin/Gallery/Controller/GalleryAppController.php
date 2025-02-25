<?php

App::uses('Controller', 'Controller');

class GalleryAppController extends AppController {

    public $helpers = array('Gallery.Gallery', 'Form' => array('className' => 'Gallery.CakePHPFTPForm'));
    public $components = array('Gallery.Util');

    public function beforeFilter() {
        //parent::beforeFilter();
        if (isset($this->Security)) { //&& isset($this->Auth)) {
            $this->Security->validatePost = false;
            $this->Security->enabled = false;
            $this->Security->csrfCheck = false;
        }
        if (!$this->_checkConfigFile()) {
            # Set default theme for app
            $default_options = array(
                'App' => array(
                    'theme' => 'flatly',
                    'interfaced' => true
                )
            );
            Configure::write('GalleryOptions', $default_options);

            $this->render('Gallery.Install' . DS . 'config');
        }
    }

    /**
     * Check if plugin config file exists
     * @return bool
     */
    private function _checkConfigFile() {
        return !!file_exists(App::pluginPath('Gallery') . 'Config' . DS . 'config.php');
    }

}
