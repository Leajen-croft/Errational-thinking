<?php
App::uses('File', 'Utility');
class ArticleController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
    
	
	/**
	 * Main index action
	 */
	public function index() {
		$this->set('articles', $this->Article->find('all'));
		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Article->create();

			// attempt to save
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash('Your message has been submitted');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	public function edit($id = null) {
        
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $article = $this->Article->findById($id);
    if (!$article) {
        throw new NotFoundException(__('Invalid post'));
    }
    $this->set('post', $article);
    if ($this->request->is(array('post', 'put'))) {
        $this->Article->id = $id;
        if ($this->Article->save($this->request->data)) {
            $this->Session->setFlash(__('the issue has been updated has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your selected issue.'));
    }

    if (!$this->request->data) {
        $this->request->data = $article;
    }
}
	public function delete($id) {
		//gets the file name to be deleted from the current database based on the id passsed through.
		$fileName_image= $this->Article->field('filename_image',$id);
		$fileName_magazine= $this->Article->field('filename_magazine',$id);
		//create and new file varalbe to be used by the file utility for deletion
		$file1 = new File(WWW_ROOT . $fileName_image, false, 0777);
		$file2 = new File(WWW_ROOT . $fileName_magazine, false, 0777);
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    //deleted the field then run the record delection from the database
   if($this->Article->delete($id) ){
    	$file2->delete();
    	$file1->delete();
		 return $this->redirect(array('action' => 'index'));
    }
}
}