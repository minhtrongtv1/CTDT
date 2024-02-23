<?php

class GalleryController extends GalleryAppController {

    public $uses = array('Gallery.Album');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('newest_albums', 'index');
    }

    public function index() {
        if (!$this->Auth->user('id'))
            $this->layout = 'iframe';
        $search_status = "published";
        $page_title = __d('gallery', 'Published galleries');

        if (isset($this->request->query['status']) && $this->request->query['status'] == 'draft') {
            $search_status = $this->request->query['status'];
            $page_title = __d('gallery', 'Drafts');
        }

        $galleries = $this->Album->findAllByStatus($search_status);

        $this->set(compact('galleries', 'page_title', 'search_status'));
    }

    public function newest_albums() {
        $search_status = "published";

        $galleries = $this->Album->findAllByStatus($search_status);

        $this->set(compact('galleries'));
    }

    public function admin_index() {
        $search_status = "published";
        $page_title = __d('gallery', 'Published galleries');

        if (isset($this->request->query['status']) && $this->request->query['status'] == 'draft') {
            $search_status = $this->request->query['status'];
            $page_title = __d('gallery', 'Drafts');
        }

        $galleries = $this->Album->findAllByStatus($search_status);

        $this->set(compact('galleries', 'page_title', 'search_status'));
    }

}
