<?php
class AnnoncesController extends AppController {
    
 	public $helpers = array('Html', 'Form');

    public function index() {
         $this->set('annonces', $this->Annonce->find('all'));
    }
   
    public function offre() {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.demande' => 1)
    	)));
    }
    
    public function validation() {
    	$this->set('annonces',  $this->Annonce->find('all'));
    	}
    	 
    public function demande() {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.demande' => 0))));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Annonce invalide'));
        }

        $annonce = $this->Annonce->findById($id);
        if (!$annonce) {
            throw new NotFoundException(__('Annonce invalide'));
        }
        $this->set('annonce', $annonce);
    }
    
    public function add() {
    	if ($this->request->is('post')) {
    		$this->Annonce->create();
    		if ($this->Annonce->save($this->request->data)) {
    			$this->Session->setFlash(__('L\'annonce a été ajoutée.'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Impossible d\'ajouter votre annonce.'));
    	}
    }
    
    public function edit($id = null) {
    	if (!$id) {
    		throw new NotFoundException(__('Annonce invalide'));
    	}
    
    	$annonce = $this->Annonce->findById($id);
    	if (!$annonce) {
    		throw new NotFoundException(__('Annonce invalide'));
    	}
    
    	if ($this->request->is(array('post', 'put'))) {
    		$this->Annonce->id = $id;
    		if ($this->Annonce->save($this->request->data)) {
    			$this->Session->setFlash(__('Votre annonce a été éditée'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Impossible de modifier l\'annonce.'));
    	}
    
    	if (!$this->request->data) {
    		$this->request->data = $annonce;
    	}
    }
    
    public function delete($id,$nameRedirect) 
    {
    	if ($this->request->is('get')) 
    	{
    		throw new MethodNotAllowedException();
    	}
    	if ($this->Annonce->delete($id)) 
    	{
    		$this->Session->setFlash(__('L\annonce avec id : %s a été supprimée.', h($id)));
    		return $this->redirect(array('action' => $nameRedirect));
    	}
    }
    
    public function signaler($id){
    	$this->Annonce->id = $id;
    	$this->Annonce->saveField('signalee', true);
    	return $this->redirect(array('action' => 'index'));
    }
    
    public function annonceSignalee() {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.signalee' => 1)
    	)));
    }
    
    public function reservation($id_annonce,$id_personneReservante,$id_personneProprio) {
    	if( $id_personneReservante != $id_personneProprio)
    	{
    		$this->Annonce->id = $id_annonce;
    		$this->Annonce->saveField('id_accepteur', $id_personne);
    	}
    	return $this->redirect(array('action' => 'index'));
    }
}
?>