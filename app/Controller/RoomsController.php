<?php
App::uses('AppController', 'Controller');
/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
//$conditions = Set::merge($conditions, array('Room.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('rooms', $this->paginate());
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
if (!$this->Room->exists($id)) {
throw new NotFoundException(__('Invalid room'));
}
$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
$this->set('room', $this->Room->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->Room->create();
if ($this->Room->save($this->request->data)) {
$this->Flash->success(__('The room has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The room could not be saved. Please, try again.'));

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
$this->Room->id = $id;
if (!$this->Room->exists($id)) {
throw new NotFoundException(__('Invalid room'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->Room->save($this->request->data)) {
$this->Flash->success(__('room đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('room lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
$this->request->data = $this->Room->find('first', $options);
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
if ($this->Room->deleteAll(array('Room.id' => $requestDeleteId))) {
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
$this->Room->id = $id;
if (!$this->Room->exists()) {
throw new NotFoundException(__('Invalid room'));
}
if ($this->Room->delete()) {
$this->Flash->success(__('Room đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Room xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
