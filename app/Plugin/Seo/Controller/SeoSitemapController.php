<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
App::uses('Sitemap', 'Seo.Lib');

/**
 * CakePHP SeoSitemapController
 * @author MyPC
 */
class SeoSitemapController extends AppController {

    public $uses = array();
    protected $sitemap;

    public function __construct($request = null, $response = null) {

        parent::__construct($request, $response);
        $this->sitemap = new Sitemap(Router::fullBaseUrl());
        $this->sitemap->setPath(WWW_ROOT);
    }

    public function admin_generate() {
        //
        $this->loadModel('Blog.BlogPost');

        $articles = $this->BlogPost->find('all', array(
            'conditions' => array('BlogPost.published' => true),
            'recursive' => 0,
            'fields' => array('id', 'title', 'slug', 'created', 'modified')));

        $this->sitemap->addItem('/', '1.0', 'daily', 'Today');

        foreach ($articles as $article) {
            $modified=new DateTime($article['BlogPost']['modified']);
            $this->sitemap->addItem('/bai-viet/' . $article['BlogPost']['id'] . '-' . $article['BlogPost']['slug'],'daily',$modified->format('Y-m-d'));
        }
        /*
          $this->sitemap->addItem('/', '1.0', 'daily', 'Today');
          $this->sitemap->addItem('/about', '0.8', 'monthly', 'Jun 25');
          $this->sitemap->addItem('/contact', '0.6', 'yearly', '14-12-2009');
          $this->sitemap->addItem('/otherpage');
          //debug($this->sitemap->getPath() . $this->sitemap->getFilename());die;
         */
        $this->sitemap->createSitemapIndex(Router::fullBaseUrl().'/', 'Today');
        $this->Flash->success('Generated in' . WWW_ROOT);
        $this->redirect($this->referer());
    }

}
