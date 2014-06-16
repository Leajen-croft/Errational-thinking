<?php
class SiteController extends AppController {
  public function beforeFilter() {
    parent::beforeFilter();
    // Allow  access to all function in this control.
    $this->Auth->allow();
}
   //make use of the following models
    var $uses = array('Post','Partner', 'Article','Page');
     public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
   
    public function index(){
   	$this->set('pages', $this->Page->find('all', array('conditions' => array('Page.id' => '1'))));
     $this->set('posts', $this->Post->find('all',array('order' => array('Post.created' => 'desc'),'limit'=>3)));
     $this->set('articles', $this->Article->find('all', array('conditions' => array('Article.current_issue' => 'Yes'))));
	}
	 public function about(){
   	$this->set('pages', $this->Page->find('all', array('conditions' => array('Page.id' => '2'))));
     $this->set('partners', $this->Partner->find('all'));
	}
	 public function archive(){
   	$this->set('pages', $this->Page->find('all', array('conditions' => array('Page.id' => '3'))));
     $this->set('articles', $this->Article->find('all'));
     $this->set('partners', $this->Partner->find('all'));
	}
	 public function submit(){
   	$this->set('pages', $this->Page->find('all', array('conditions' => array('Page.id' => '4'))));
     $this->set('partners', $this->Partner->find('all'));
	}
	 public function faq(){
   	$this->set('pages', $this->Page->find('all', array('conditions' => array('Page.id' => '5'))));
     $this->set('partners', $this->Partner->find('all'));
	}
}