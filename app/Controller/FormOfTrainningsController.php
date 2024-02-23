<?php
App::uses('AppController', 'Controller');
/**
 * FormOfTrainnings Controller
 *
 * @property FormOfTrainning $FormOfTrainning
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class FormOfTrainningsController extends AppController {

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
//$conditions = Set::merge($conditions, array('FormOfTrainning.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('formOfTrainnings', $this->paginate());
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
if (!$this->FormOfTrainning->exists($id)) {
throw new NotFoundException(__('Invalid form of trainning'));
}
$options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
$this->set('formOfTrainning', $this->FormOfTrainning->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->FormOfTrainning->create();
if ($this->FormOfTrainning->save($this->request->data)) {
$this->Flash->success(__('The form of trainning has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The form of trainning could not be saved. Please, try again.'));

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
$this->FormOfTrainning->id = $id;
if (!$this->FormOfTrainning->exists($id)) {
throw new NotFoundException(__('Invalid form of trainning'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->FormOfTrainning->save($this->request->data)) {
$this->Flash->success(__('form of trainning đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('form of trainning lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
$this->request->data = $this->FormOfTrainning->find('first', $options);
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
if ($this->FormOfTrainning->deleteAll(array('FormOfTrainning.id' => $requestDeleteId))) {
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
$this->FormOfTrainning->id = $id;
if (!$this->FormOfTrainning->exists()) {
throw new NotFoundException(__('Invalid form of trainning'));
}
if ($this->FormOfTrainning->delete()) {
$this->Flash->success(__('Form of trainning đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Form of trainning xóa không thành công'));
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
//$conditions = Set::merge($conditions, array('FormOfTrainning.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('formOfTrainnings', $this->paginate());
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
if (!$this->FormOfTrainning->exists($id)) {
throw new NotFoundException(__('Invalid form of trainning'));
}
$options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
$this->set('formOfTrainning', $this->FormOfTrainning->find('first', $options));
}

/**
* admin_add method
*
* @return void
*/
public function admin_add() {
if ($this->request->is('post')) {
$this->FormOfTrainning->create();
if ($this->FormOfTrainning->save($this->request->data)) {
$this->Flash->success(__('The form of trainning has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The form of trainning could not be saved. Please, try again.'));

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
$this->FormOfTrainning->id = $id;
if (!$this->FormOfTrainning->exists($id)) {
throw new NotFoundException(__('Invalid form of trainning'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->FormOfTrainning->save($this->request->data)) {
$this->Flash->success(__('form of trainning đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('form of trainning lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
$this->request->data = $this->FormOfTrainning->find('first', $options);
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
if ($this->FormOfTrainning->deleteAll(array('FormOfTrainning.id' => $requestDeleteId))) {
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
$this->FormOfTrainning->id = $id;
if (!$this->FormOfTrainning->exists()) {
throw new NotFoundException(__('Invalid form of trainning'));
}
if ($this->FormOfTrainning->delete()) {
$this->Flash->success(__('Form of trainning đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Form of trainning xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
