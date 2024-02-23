<?php
App::uses('AppController', 'Controller');
/**
 * LinhVucNhanThucs Controller
 *
 * @property LinhVucNhanThuc $LinhVucNhanThuc
 * @property PaginatorComponent $Paginator
 */
class LinhVucNhanThucsController extends AppController {

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
//$conditions = Set::merge($conditions, array('LinhVucNhanThuc.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('linhVucNhanThucs', $this->paginate());
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
if (!$this->LinhVucNhanThuc->exists($id)) {
throw new NotFoundException(__('Invalid linh vuc nhan thuc'));
}
$options = array('conditions' => array('LinhVucNhanThuc.' . $this->LinhVucNhanThuc->primaryKey => $id));
$this->set('linhVucNhanThuc', $this->LinhVucNhanThuc->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->LinhVucNhanThuc->create();
if ($this->LinhVucNhanThuc->save($this->request->data)) {
$this->Flash->success(__('The linh vuc nhan thuc has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The linh vuc nhan thuc could not be saved. Please, try again.'));

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
$this->LinhVucNhanThuc->id = $id;
if (!$this->LinhVucNhanThuc->exists($id)) {
throw new NotFoundException(__('Invalid linh vuc nhan thuc'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->LinhVucNhanThuc->save($this->request->data)) {
$this->Flash->success(__('linh vuc nhan thuc đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('linh vuc nhan thuc lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('LinhVucNhanThuc.' . $this->LinhVucNhanThuc->primaryKey => $id));
$this->request->data = $this->LinhVucNhanThuc->find('first', $options);
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
if ($this->LinhVucNhanThuc->deleteAll(array('LinhVucNhanThuc.id' => $requestDeleteId))) {
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
$this->LinhVucNhanThuc->id = $id;
if (!$this->LinhVucNhanThuc->exists()) {
throw new NotFoundException(__('Invalid linh vuc nhan thuc'));
}
if ($this->LinhVucNhanThuc->delete()) {
$this->Flash->success(__('Linh vuc nhan thuc đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Linh vuc nhan thuc xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
