<?php

/**
 * Sitemap Behavior class file.
 *
 * @filesource
 * @author Nguyen Thai Toan
 * @link https://www.facebook.com/cakecoban/
 * @version    $Revision: 36 $
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 * @package app
 * @subpackage app.seo.models.behaviors
 */
class SitemapBehavior extends ModelBehavior {

    /**
     * Contain settings indexed by model name.
     *
     * @var array
     * @access private
     */
    public $__settings = array();
    public $__domain;
    public $__path;

    /*
      @format
      %% - Returns a percent sign
      %b - Binary number
      %c - The character according to the ASCII value
      %d - Signed decimal number (negative, zero or positive)
      %e - Scientific notation using a lowercase (e.g. 1.2e+2)
      %E - Scientific notation using a uppercase (e.g. 1.2E+2)
      %u - Unsigned decimal number (equal to or greather than zero)
      %f - Floating-point number (local settings aware)
      %F - Floating-point number (not local settings aware)
      %g - shorter of %e and %f
      %G - shorter of %E and %f
      %o - Octal number
      %s - String
      %x - Hexadecimal number (lowercase letters)
      %X - Hexadecimal number (uppercase letters)

     *      */

    public function setup(\Model $Model, $settings = array()) {

        $this->settings[$Model->alias] = $settings;
        $default = array(
            'uri' => array('format' => NULL, 'fields' => array('id', 'slug')),
            'priority' => NULL,
            'changefreq' => NULL,
            'lastmod' => 'modified'
            );
        if (!isset($this->__settings[$Model->alias])) {
            $this->__settings[$Model->alias] = $default;
        }

        if (is_array($settings)) {
            $retSettings = $settings;
        } else {
            $retSettings = array();
        }
        //pr( $retSettings );

        $this->__settings[$Model->alias] = am(
                $this->__settings[$Model->alias], $retSettings
        );
        
    }

    public function cleanup(\Model $Model) {
        parent::cleanup($Model);
    }

    public function beforeSave(\Model $Model, $options = array()) {
        if (is_null($this->__settings[$Model->alias]['uri']['format'])) {
            throw new Exception('Sitemap behavior uri format not set.');
        }
        foreach ($this->__settings[$Model->alias]['uri']['fields'] as $field) {
            if (!$Model->hasField($field)) {
                throw new Exception('Sitemap behavior uri fields not matches');
            }
        }
        return parent::beforeSave($Model, $options);
    }

    public function afterSave(\Model $model, $created, $options = array()) {
        parent::afterSave($model, $created, $options);
        if ($created) {
            $aFields = array();
            foreach ($this->__settings[$model->alias]['uri']['fields']as $field) {

                $aFields[] = $model->data[$model->alias][$field];
            }

            $uri = vsprintf($this->__settings[$model->alias]['uri']['format'], $aFields);
            $modified = new DateTime($model->data[$model->alias][$this->__settings[$model->alias]['lastmod']]);
            // Loads an XML file into an object
            $sitemap_file = WWW_ROOT . 'sitemap.xml';
            $go = simplexml_load_file($sitemap_file);
            //We are now able to manipulate the object ($go) and add a new url child element to it.
            $sitemap = $go->addChild('url');
            //Now we create are four child elements .
            $sitemap->addChild('loc', Router::fullBaseUrl().$uri);
            $sitemap->addChild('priority', $this->__settings[$model->alias]['priority']);
            $sitemap->addChild('lastmod', $modified->format('Y-m-d'));
            $sitemap->addChild('changefreq', $this->__settings[$model->alias]['changefreq']);
            //Return a well-formed XML string
            $xml = $go->asXML();
            //Write our string variable $xml back to the sitemap.xml file.
            file_put_contents($sitemap_file, $xml);
            //Destroy variable $xml
            unset($xml);
        }
    }

}
