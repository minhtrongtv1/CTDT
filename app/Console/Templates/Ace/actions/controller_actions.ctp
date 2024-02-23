<?php
/**
 * Bake Template for Controller action generation.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php $compact = array(); ?>
/**
* <?php echo $admin ?>index method
*
* @return void
*/
public function <?php echo $admin ?>index() {
$conditions=array();
$contain=array();
$order=array();
if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('<?php echo $currentModelName ?>.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('<?php echo $pluralName ?>', $this->paginate());
if(!$this->request->is('ajax')){
<?php
foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
    foreach ($modelObj->{$assoc} as $associationName => $relation):
        if (!empty($associationName)):
            $otherModelName = $this->_modelName($associationName);
            $otherPluralName = $this->_pluralName($associationName);
            echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
            $compact[] = "'{$otherPluralName}'";
        endif;
    endforeach;
endforeach;
if (!empty($compact)):
    echo "\t\t\$this->set(compact(" . join(', ', $compact) . "));\n";
endif;
?>
}
}

/**
* <?php echo $admin ?>view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function <?php echo $admin ?>view($id = null) {
if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
}
$options = array('conditions' => array('<?php echo $currentModelName; ?>.' . $this-><?php echo $currentModelName; ?>->primaryKey => $id));
$this->set('<?php echo $singularName; ?>', $this-><?php echo $currentModelName; ?>->find('first', $options));
}

<?php $compact = array(); ?>
/**
* <?php echo $admin ?>add method
*
* @return void
*/
public function <?php echo $admin ?>add() {
if ($this->request->is('post')) {
$this-><?php echo $currentModelName; ?>->create();
if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
$this->Flash->success(__('The <?php echo strtolower($singularHumanName); ?> has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The <?php echo strtolower($singularHumanName); ?> could not be saved. Please, try again.'));

}
}
<?php
foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
    foreach ($modelObj->{$assoc} as $associationName => $relation):
        if (!empty($associationName)):
            $otherModelName = $this->_modelName($associationName);
            $otherPluralName = $this->_pluralName($associationName);
            echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
            $compact[] = "'{$otherPluralName}'";
        endif;
    endforeach;
endforeach;
if (!empty($compact)):
    echo "\t\t\$this->set(compact(" . join(', ', $compact) . "));\n";
endif;
?>
}

<?php $compact = array(); ?>
/**
* <?php echo $admin ?>edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function <?php echo $admin; ?>edit($id = null) {
$this-><?php echo $currentModelName; ?>->id = $id;
if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
$this->Flash->success(__('<?php echo strtolower($singularHumanName); ?> đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('<?php echo strtolower($singularHumanName); ?> lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('<?php echo $currentModelName; ?>.' . $this-><?php echo $currentModelName; ?>->primaryKey => $id));
$this->request->data = $this-><?php echo $currentModelName; ?>->find('first', $options);
}
<?php
foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
    foreach ($modelObj->{$assoc} as $associationName => $relation):
        if (!empty($associationName)):
            $otherModelName = $this->_modelName($associationName);
            $otherPluralName = $this->_pluralName($associationName);
            echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
            $compact[] = "'{$otherPluralName}'";
        endif;
    endforeach;
endforeach;
if (!empty($compact)):
    echo "\t\t\$this->set(compact(" . join(', ', $compact) . "));\n";
endif;
?>
}

/**
* <?php echo $admin ?>delete method
*
* @throws NotFoundException
* @throws MethodNotAllowedException
* @param string $id
* @return void
*/
public function <?php echo $admin; ?>delete($id = null) {
if ($this->request->is('ajax')) {
$this->autoRender = false;
if (!empty($this->request->data)) {
$requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
if ($this-><?php echo $currentModelName; ?>->deleteAll(array('<?php echo $currentModelName; ?>.id' => $requestDeleteId))) {
echo json_encode($requestDeleteId);
} else {
echo json_encode(array());
}
}
exit();
}
if (!$this->request->is('post')) {
throw new MethodNotAllowedException();
}
$this-><?php echo $currentModelName; ?>->id = $id;
if (!$this-><?php echo $currentModelName; ?>->exists()) {
throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
}
if ($this-><?php echo $currentModelName; ?>->delete()) {
$this->Flash->success(__('<?php echo ucfirst(strtolower($singularHumanName)); ?> đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('<?php echo ucfirst(strtolower($singularHumanName)); ?> xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}