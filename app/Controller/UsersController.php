<?php
class UsersController extends AppController {
	
public function beforeFilter() {
	    parent::beforeFilter();
	    // Permet aux utilisateurs de s'enregistrer et de se déconnecter
	    $this->Auth->allow('add', 'logout');
	}

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'utilisateur a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'utilisateur a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['Utilisateur']['password']);
        }
    }

    public function delete($id = null) {
        // Avant 2.5, utilisez
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Utilisateur supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'utilisateur n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }
	
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        } else {
	            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
	        }
	    }
	}
	
	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
}
?>