<?php
App::uses('File', 'Utility');
class PartnerController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	
	/**
	 * Main index action
	 */
	public function index() {
		$this->set('partners', $this->Partner->find('all'));
		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Partner->create();

			// attempt to save
			if ($this->Partner->save($this->request->data)) {
				$this->Session->setFlash('Your message has been submitted');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	public function delete($id) {
		//gets the file name to be deleted from the current database based on the id passsed through.
		$fileName= $this->Partner->field('image',$id);
		//create and new file varalbe to be used by the file utility for deletion
		$file = new File(WWW_ROOT . $fileName, false, 0777);
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
    //deleted the field then run the record delection from the database
   if($this->Partner->delete($id)) {
		$file->delete();
		 return $this->redirect(array('action' => 'index'));
       
    }
}
}