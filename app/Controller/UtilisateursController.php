<?php

class UtilisateursController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() 
	{
        $this->set('utilisateurs', $this->Utilisateur->find('all'));
    }
    
    public function view($id = null) 
    {
    	if (!$id) {
    		throw new NotFoundException(__('L\'utilisateur n\'existe pas ! '));
    	}
    
    	$utilisateur = $this->Utilisateur->findById($id);
    	if (!$utilisateur) {
    		throw new NotFoundException(__('L\'utilisateur n\'existe pas ! '));
    	}
    	$this->set('utilisateur', $utilisateur);
    }
    
    public function add()
    {
    if ($this->request->is('post')) {
            $this->Utilisateur->create();
            if ($this->Utilisateur->save($this->request->data)) {
                $this->Session->setFlash(__('Votre utilisateur a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Impossible '));
        }
    }
}
?>