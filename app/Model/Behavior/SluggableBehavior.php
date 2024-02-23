<?php

class SluggableBehavior extends ModelBehavior {

    /**
     * Contain settings indexed by model name.
     *
     * @var array
     */
    private $__settings = array();

    public function setup(Model $model, $settings = array()) {
        $default = array('label' => array('title'), 'slug' => 'slug', 'separator' => '-', 'length' => 200, 'overwrite' => true, 'translation' => null);

        if (!isset($this->__settings[$model->alias])) {
            $this->__settings[$model->alias] = $default;
        }

        $this->__settings[$model->alias] = am($this->__settings[$model->alias], (is_array($settings) ? $settings : array()));
    }

    /**
     * Run before a model is saved, used to set up slug for model.
     *
     * @param Model $model Model about to be saved.
     * @return boolean true if save should proceed, false otherwise
     */
    public function beforeSave(Model $model, $options = Array()) {
        $return = parent::beforeSave($model);

        if (!is_array($this->__settings[$model->alias]['label'])) {
            $this->__settings[$model->alias]['label'] = array($this->__settings[$model->alias]['label']);
        }

        foreach ($this->__settings[$model->alias]['label'] as $field) {
            if (!$model->hasField($field)) {
                return $return;
            }
        }

        if ($model->hasField($this->__settings[$model->alias]['slug']) && ($this->__settings[$model->alias]['overwrite'] || empty($model->id))) {
            $label = '';

            foreach ($this->__settings[$model->alias]['label'] as $field) {
                if (!empty($model->data[$model->alias][$field])) {
                    $label .= (!empty($label) ? ' ' : '') . $model->data[$model->alias][$field];
                }
            }

            if (!empty($label)) {
                $slug = $this->__slug($label, $this->__settings[$model->alias]);
                $conditions = array($model->alias . '.' . $this->__settings[$model->alias]['slug'] . ' LIKE' => $slug . '%'); // Fix 2

                if (!empty($model->id)) {
                    $conditions['not'] = array(
                        $model->alias . '.' . $model->primaryKey =>
                        $model->id
                    );
                }

                $result = $model->find('all', array('conditions' => $conditions, 'fields' => array($model->primaryKey, $this->__settings[$model->alias]['slug']), 'recursive' => -1));
                $sameUrls = null;

                if (!empty($result)) {
                    $sameUrls = Hash::extract($result, '{n}.' . $model->alias . '.' . $this->__settings[$model->alias]['slug']);
                }

                if (!empty($sameUrls)) {
                    $begginingSlug = $slug;
                    $index = 1;

                    while ($index > 0) {
                        if (!in_array($begginingSlug . $this->__settings[$model->alias]['separator'] . $index, $sameUrls)) {
                            $slug = $begginingSlug . $this->__settings[$model->alias]['separator'] . $index;
                            $index = -1;
                        }

                        $index++;
                    }
                }

                if (!empty($model->whitelist) && !in_array($this->__settings[$model->alias]['slug'], $model->whitelist)) {
                    $model->whitelist[] = $this->__settings[$model->alias]['slug'];
                }

                $model->data[$model->alias][$this->__settings[$model->alias]['slug']] = $slug;
            }
        }

        return $return;
    }

    /**
     * Generate a slug for the given string using specified settings.
     *
     * @param string $string String from where to generate slug
     * @param array $settings Settings to use (looks for 'separator' and 'length')
     * @return string Slug for given string
     */
    private function __slug($string, $settings) {
        $string = Inflector::slug($string, $settings['separator']);

        if (strlen($string) > $settings['length']) {
            $string = substr($string, 0, $settings['length']);
        }

        return strtolower($string);
    }

}