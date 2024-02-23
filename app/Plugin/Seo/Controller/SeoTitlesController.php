<?php

class SeoTitlesController extends SeoAppController {

    public $name = 'SeoTitles';
    public $helpers = array('Time');

    /* This function will get articles from article table and insert into seo_title */

    public function admin_import() {
        //Load Model
        $this->loadModel('Blog.BlogPost');
        $articles = $this->BlogPost->find('all', array('fields' => array('id', 'title', 'slug'), 'conditions' => array('BlogPost.published' => 1)));
        $importCounter = 0;
        $this->SeoTitle->deleteAll(array('1=1'));
        foreach ($articles as $article) {
            $seoTitle['SeoTitle']['title'] = $article['BlogPost']['title'];
            $seoTitle['SeoUri']['uri'] = Configure::read('Website.subfolder') . '/bai-viet/' . $article['BlogPost']['id'] . '-' . $article['BlogPost']['slug'];
            $this->SeoTitle->create();
            if ($this->SeoTitle->save($seoTitle)) {
                $importCounter++;
            }
        }
        $this->Flash->success($importCounter . ' imported');
        $this->redirect($this->referer());
    }

    function admin_index($filter = null) {
        if (!empty($this->request->data)) {
            $filter = $this->request->data['SeoTitle']['filter'];
        }
        $conditions = $this->SeoTitle->generateFilterConditions($filter);
        $this->set('seoTitles', $this->paginate($conditions));
        $this->set('filter', $filter);
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Flash->error(__('Invalid seo title'));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('seoTitle', $this->SeoTitle->read(null, $id));
        $this->set('id', $id);
    }

    function admin_add() {
        if (!empty($this->request->data)) {
            $this->SeoTitle->clear();
            if ($this->SeoTitle->save($this->request->data)) {
                $this->Flash->success(__('The seo title has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The seo title could not be saved. Please, try again.'));
            }
        }
        $seoUris = $this->SeoTitle->SeoUri->find('list');
        $this->set(compact('seoUris'));
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->request->data)) {

            $this->Flash->error(__('Invalid seo title'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            if ($this->SeoTitle->save($this->request->data)) {
                $this->Flash->success(__('The seo title has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The seo title could not be saved. Please, try again.'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->SeoTitle->read(null, $id);
        }
        $seoUris = $this->SeoTitle->SeoUri->find('list');
        $this->set(compact('seoUris'));
        $this->set('id', $id);
    }

    function admin_delete($id = null) {
        if (!$id) {

            $this->Flash->error(__('Invalid id for seo title'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->SeoTitle->delete($id)) {

            $this->Flash->success(__('Seo title deleted'));
            $this->redirect(array('action' => 'index'));
        }

        $this->Flash->error(__('Seo title was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

?>