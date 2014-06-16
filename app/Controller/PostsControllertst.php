<?php
class PostsController extends AppController {
   //make use of the following models
    var $uses = array('Post','User');
    public $helpers = array('html', 'form', 'session');
	public function index(){
        // find the last three entries in the posts table by ordering them in desending order by the created field
		$this->set('posts', $this->Post->find('all',array('order' => array('Post.created' => 'desc'),'limit'=>3)));
       // find a particular username with the users table and display all that match Liam
        $this->set('users', $this->User->find('all', array('conditions' => array('User.username' => 'Liam'))));
	}
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Sorry the post can not be found'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Sorry the post can not be found'));
        }
        $this->set('post', $post);
    }
	public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }
    public function edit($id = null) {
        
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }
    $this->set('post', $post);
    if ($this->request->is(array('post', 'put'))) {
        $this->Post->id = $id;
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}
public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {
        $this->Session->setFlash(
            __('The post with id: %s has been deleted.', h($id))
        );
        return $this->redirect(array('action' => 'index'));
    }
}
}