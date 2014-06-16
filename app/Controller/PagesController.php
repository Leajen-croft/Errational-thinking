<?php
class PagesController extends AppController {
	
   public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	public function index(){
        // find the blog posts created
		$this->set('pages', $this->Page->find('all'));
	}
    public function edit($id = null) {
        
    if (!$id) {
        throw new NotFoundException(__('Invalid page'));
    }

    $page = $this->Page->findById($id);
    if (!$page) {
        throw new NotFoundException(__('Invalid page'));
    }
    $this->set('page', $page);
    if ($this->request->is(array('page', 'put'))) {
        $this->Page->id = $id;
        if ($this->Page->save($this->request->data)) {
            $this->Session->setFlash(__('Your page has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your page.'));
    }

    if (!$this->request->data) {
        $this->request->data = $page;
    }
}
}