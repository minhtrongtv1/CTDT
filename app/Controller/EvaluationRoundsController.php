<?php
App::uses('AppController', 'Controller');
/**
 * EvaluationRounds Controller
 *
 * @property EvaluationRound $EvaluationRound
 * @property PaginatorComponent $Paginator
 */
class EvaluationRoundsController extends AppController {

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
//$conditions = Set::merge($conditions, array('EvaluationRound.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('evaluationRounds', $this->paginate());
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
if (!$this->EvaluationRound->exists($id)) {
throw new NotFoundException(__('Invalid evaluation round'));
}
$options = array('conditions' => array('EvaluationRound.' . $this->EvaluationRound->primaryKey => $id));
$this->set('evaluationRound', $this->EvaluationRound->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->EvaluationRound->create();
if ($this->EvaluationRound->save($this->request->data)) {
$this->Flash->success(__('The evaluation round has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The evaluation round could not be saved. Please, try again.'));

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
$this->EvaluationRound->id = $id;
if (!$this->EvaluationRound->exists($id)) {
throw new NotFoundException(__('Invalid evaluation round'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->EvaluationRound->save($this->request->data)) {
$this->Flash->success(__('evaluation round đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('evaluation round lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('EvaluationRound.' . $this->EvaluationRound->primaryKey => $id));
$this->request->data = $this->EvaluationRound->find('first', $options);
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
if ($this->EvaluationRound->deleteAll(array('EvaluationRound.id' => $requestDeleteId))) {
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
$this->EvaluationRound->id = $id;
if (!$this->EvaluationRound->exists()) {
throw new NotFoundException(__('Invalid evaluation round'));
}
if ($this->EvaluationRound->delete()) {
$this->Flash->success(__('Evaluation round đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Evaluation round xóa không thành công'));
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
//$conditions = Set::merge($conditions, array('EvaluationRound.fieldName' => $value));
}
$settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
$this->Paginator->settings=$settings;

$this->set('evaluationRounds', $this->paginate());
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
if (!$this->EvaluationRound->exists($id)) {
throw new NotFoundException(__('Invalid evaluation round'));
}
$options = array('conditions' => array('EvaluationRound.' . $this->EvaluationRound->primaryKey => $id));
$this->set('evaluationRound', $this->EvaluationRound->find('first', $options));
}

/**
* admin_add method
*
* @return void
*/
public function admin_add() {
if ($this->request->is('post')) {
$this->EvaluationRound->create();
if ($this->EvaluationRound->save($this->request->data)) {
$this->Flash->success(__('The evaluation round has been saved'));
$this->redirect(array('action' => 'index'));
} else {

$this->Flash->error(__('The evaluation round could not be saved. Please, try again.'));

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
$this->EvaluationRound->id = $id;
if (!$this->EvaluationRound->exists($id)) {
throw new NotFoundException(__('Invalid evaluation round'));
}
if ($this->request->is('post') || $this->request->is('put')) {
if ($this->EvaluationRound->save($this->request->data)) {
$this->Flash->success(__('evaluation round đã được lưu'));
$this->redirect(array('action' => 'index'));
} else {
$this->Flash->error(__('evaluation round lưu không thành công, vui lòng thử lại.'));
}
} else {
$options = array('conditions' => array('EvaluationRound.' . $this->EvaluationRound->primaryKey => $id));
$this->request->data = $this->EvaluationRound->find('first', $options);
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
if ($this->EvaluationRound->deleteAll(array('EvaluationRound.id' => $requestDeleteId))) {
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
$this->EvaluationRound->id = $id;
if (!$this->EvaluationRound->exists()) {
throw new NotFoundException(__('Invalid evaluation round'));
}
if ($this->EvaluationRound->delete()) {
$this->Flash->success(__('Evaluation round đã xóa'));
$this->redirect(array('action' => 'index'));
}else{
$this->Flash->error(__('Evaluation round xóa không thành công'));
$this->redirect(array('action' => 'index'));
}


}
}
