<?php
class AnnoncesController extends AppController {
    
 	public $helpers = array('Html', 'Form');

    public function index() {
         $this->set('annonces', $this->Annonce->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid annonce'));
        }

        $annonce = $this->Annonce->findById($id);
        if (!$annonce) {
            throw new NotFoundException(__('Invalid annonce'));
        }
        $this->set('annonce', $annonce);
    }
    
    public function add() {
    	if ($this->request->is('post')) {
    		$this->Annonce->create();
    		if ($this->Annonce->save($this->request->data)) {
    			$this->Session->setFlash(__('Your post has been saved.'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Unable to add your post.'));
    	}
    }
    
    public function edit($id = null) {
    	if (!$id) {
    		throw new NotFoundException(__('Invalid annonce'));
    	}
    
    	$annonce = $this->Annonce->findById($id);
    	if (!$annonce) {
    		throw new NotFoundException(__('Invalid annonce'));
    	}
    
    	if ($this->request->is(array('post', 'put'))) {
    		$this->Annonce->id = $id;
    		if ($this->Annonce->save($this->request->data)) {
    			$this->Session->setFlash(__('Your post has been updated.'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Unable to update your post.'));
    	}
    
    	if (!$this->request->data) {
    		$this->request->data = $annonce;
    	}
    }
    
    public function delete($id) {
    	if ($this->request->is('get')) {
    		throw new MethodNotAllowedException();
    	}
    	if ($this->Annonce->delete($id)) {
    		$this->Session->setFlash(
    				__('Le post avec id : %s a été supprimé.', h($id))
    		);
    		return $this->redirect(array('action' => 'index'));
    	}
    }
}
?>