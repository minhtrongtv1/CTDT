<?php
App::uses('AppController', 'Controller');
/**
 * Typeobjectives Controller
 *
 * @property Typeobjective $Typeobjective
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TypeobjectivesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
* index method
*
* @return void
*/
public function index() {
$conditions=array();
$contain=array();
$order=array();
if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Typeobjective.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('typeobjectives', $this->paginate());
if(!$this->request->is('ajax')){
}
}

/**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function view($id = null) {
if (!$this->Typeobjective->exists($id)) {
throw new NotFoundException(__('Invalid typeobjective'));
}
$options = array('conditions' => array('Typeobjective.' . $this->Typeobjective->primaryKey => $id));
$this->set('typeobjective', $this->Typeobjective->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->Typeobjective->create();
if ($this->Typeobjective->save($this->request->data)) {
$this->Flash->success(__('The typeobjective has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The typeobjective could not be saved. Please, try again.'));

}
}
}

/**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function edit($id = null) {
$this->Typeobjective->id = $id;
if (!$this->Typeobjective->exists($id)) {
throw new NotFoundException(__('Invalid typeobjective'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->Typeobjective->save($this->request->data)) {
$this->Flash->success(__('typeobjective đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('typeobjective lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('Typeobjective.' . $this->Typeobjective->primaryKey => $id));
$this->request->data = $this->Typeobjective->find('first', $options);
}
}

/**
* delete method
*
* @throws NotFoundException
* @throws MethodNotAllowedException
* @param string $id
* @return void
*/
public function delete($id = null) {
if ($this->request->is('ajax')) {
$this->autoRender = false;
if (!empty($this->request->data)) {
$requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
if ($this->Typeobjective->deleteAll(array('Typeobjective.id' => $requestDeleteId))) {
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
$this->Typeobjective->id = $id;
if (!$this->Typeobjective->exists()) {
throw new NotFoundException(__('Invalid typeobjective'));
}
if ($this->Typeobjective->delete()) {
$this->Flash->success(__('Typeobjective đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Typeobjective xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}/**
* admin_index method
*
* @return void
*/
public function admin_index() {
$conditions=array();
$contain=array();
$order=array();
if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Typeobjective.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('typeobjectives', $this->paginate());
if(!$this->request->is('ajax')){
}
}

/**
* admin_view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function admin_view($id = null) {
if (!$this->Typeobjective->exists($id)) {
throw new NotFoundException(__('Invalid typeobjective'));
}
$options = array('conditions' => array('Typeobjective.' . $this->Typeobjective->primaryKey => $id));
$this->set('typeobjective', $this->Typeobjective->find('first', $options));
}

/**
* admin_add method
*
* @return void
*/
public function admin_add() {
if ($this->request->is('post')) {
$this->Typeobjective->create();
if ($this->Typeobjective->save($this->request->data)) {
$this->Flash->success(__('The typeobjective has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The typeobjective could not be saved. Please, try again.'));

}
}
}

/**
* admin_edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function admin_edit($id = null) {
$this->Typeobjective->id = $id;
if (!$this->Typeobjective->exists($id)) {
throw new NotFoundException(__('Invalid typeobjective'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->Typeobjective->save($this->request->data)) {
$this->Flash->success(__('typeobjective đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('typeobjective lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('Typeobjective.' . $this->Typeobjective->primaryKey => $id));
$this->request->data = $this->Typeobjective->find('first', $options);
}
}

/**
* admin_delete method
*
* @throws NotFoundException
* @throws MethodNotAllowedException
* @param string $id
* @return void
*/
public function admin_delete($id = null) {
if ($this->request->is('ajax')) {
$this->autoRender = false;
if (!empty($this->request->data)) {
$requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
if ($this->Typeobjective->deleteAll(array('Typeobjective.id' => $requestDeleteId))) {
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
$this->Typeobjective->id = $id;
if (!$this->Typeobjective->exists()) {
throw new NotFoundException(__('Invalid typeobjective'));
}
if ($this->Typeobjective->delete()) {
$this->Flash->success(__('Typeobjective đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Typeobjective xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
