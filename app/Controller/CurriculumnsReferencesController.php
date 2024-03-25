<?php
App::uses('AppController', 'Controller');
/**
 * CurriculumnsReferences Controller
 *
 * @property CurriculumnsReference $CurriculumnsReference
 * @property PaginatorComponent $Paginator
 */
class CurriculumnsReferencesController extends AppController {

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
//$conditions = Set::merge($conditions, array('CurriculumnsReference.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('curriculumnsReferences', $this->paginate());
if(!$this->request->is('ajax')){
		$curriculumns = $this->CurriculumnsReference->Curriculumn->find('list');
		$majors = $this->CurriculumnsReference->Major->find('list');
		$this->set(compact('curriculumns', 'majors'));
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
if (!$this->CurriculumnsReference->exists($id)) {
throw new NotFoundException(__('Invalid curriculumns reference'));
}
$options = array('conditions' => array('CurriculumnsReference.' . $this->CurriculumnsReference->primaryKey => $id));
$this->set('curriculumnsReference', $this->CurriculumnsReference->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->CurriculumnsReference->create();
if ($this->CurriculumnsReference->save($this->request->data)) {
$this->Flash->success(__('The curriculumns reference has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The curriculumns reference could not be saved. Please, try again.'));

}
}
		$curriculumns = $this->CurriculumnsReference->Curriculumn->find('list');
		$majors = $this->CurriculumnsReference->Major->find('list');
		$this->set(compact('curriculumns', 'majors'));
}

/**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function edit($id = null) {
$this->CurriculumnsReference->id = $id;
if (!$this->CurriculumnsReference->exists($id)) {
throw new NotFoundException(__('Invalid curriculumns reference'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->CurriculumnsReference->save($this->request->data)) {
$this->Flash->success(__('curriculumns reference đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('curriculumns reference lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('CurriculumnsReference.' . $this->CurriculumnsReference->primaryKey => $id));
$this->request->data = $this->CurriculumnsReference->find('first', $options);
}
		$curriculumns = $this->CurriculumnsReference->Curriculumn->find('list');
		$majors = $this->CurriculumnsReference->Major->find('list');
		$this->set(compact('curriculumns', 'majors'));
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
if ($this->CurriculumnsReference->deleteAll(array('CurriculumnsReference.id' => $requestDeleteId))) {
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
$this->CurriculumnsReference->id = $id;
if (!$this->CurriculumnsReference->exists()) {
throw new NotFoundException(__('Invalid curriculumns reference'));
}
if ($this->CurriculumnsReference->delete()) {
$this->Flash->success(__('Curriculumns reference đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Curriculumns reference xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
