<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RolesController extends AppController {

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
//$conditions = Set::merge($conditions, array('Role.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('roles', $this->paginate());
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
if (!$this->Role->exists($id)) {
throw new NotFoundException(__('Invalid role'));
}
$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
$this->set('role', $this->Role->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->Role->create();
if ($this->Role->save($this->request->data)) {
$this->Flash->success(__('The role has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The role could not be saved. Please, try again.'));

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
$this->Role->id = $id;
if (!$this->Role->exists($id)) {
throw new NotFoundException(__('Invalid role'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->Role->save($this->request->data)) {
$this->Flash->success(__('role đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('role lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
$this->request->data = $this->Role->find('first', $options);
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
if ($this->Role->deleteAll(array('Role.id' => $requestDeleteId))) {
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
$this->Role->id = $id;
if (!$this->Role->exists()) {
throw new NotFoundException(__('Invalid role'));
}
if ($this->Role->delete()) {
$this->Flash->success(__('Role đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Role xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
