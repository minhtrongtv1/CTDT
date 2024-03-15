<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class StatesController extends AppController {

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
//$conditions = Set::merge($conditions, array('State.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('states', $this->paginate());
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
if (!$this->State->exists($id)) {
throw new NotFoundException(__('Invalid state'));
}
$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
$this->set('state', $this->State->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->State->create();
if ($this->State->save($this->request->data)) {
$this->Flash->success(__('The state has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The state could not be saved. Please, try again.'));

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
$this->State->id = $id;
if (!$this->State->exists($id)) {
throw new NotFoundException(__('Invalid state'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->State->save($this->request->data)) {
$this->Flash->success(__('state đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('state lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
$this->request->data = $this->State->find('first', $options);
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
if ($this->State->deleteAll(array('State.id' => $requestDeleteId))) {
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
$this->State->id = $id;
if (!$this->State->exists()) {
throw new NotFoundException(__('Invalid state'));
}
if ($this->State->delete()) {
$this->Flash->success(__('State đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('State xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
