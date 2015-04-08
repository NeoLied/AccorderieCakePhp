<?php
class AnnoncesController extends AppController {
    
 	public $helpers = array('Html', 'Form');

    public function index() {
         $this->set('annonces', $this->Annonce->find('all'));
    }
   
    public function offre() {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.demande' => 1, 'Annonce.annonceValide' => 'oui' )
    	)));
    }
    
    public function validation() {
    	$this->set('annonces',  $this->Annonce->find('all'));
    	}
    	 
    public function demande() {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.demande' => 0, 'Annonce.annonceValide' => 'oui'))));
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
    	
    	$some_sql = "Select libelle from competences";
    	$db = ConnectionManager::getDataSource('default');
    	$result = $db->query($some_sql);
    	
    	$type = array();
    	foreach ($result as $row) {
    		$type[$row['competences']['libelle']] = $row['competences']['libelle'];
    	}
    	
    	$this->set('type', $type);
    	
    	if ($this->request->is('post')) {
    		$this->Annonce->create();
    		if ($this->Annonce->save($this->request->data)) {
    			$this->Session->setFlash(__('L\'annonce a été ajoutée.'));
    			return $this->redirect("/");
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
    			return $this->redirect("/");
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
    		$this->Session->setFlash(__('L\'annonce avec id : %s a été supprimée.', h($id)));
    		return $this->redirect("/");
    	}
    }
    
    public function signaler($id){
    	$this->Annonce->id = $id;
    	$this->Annonce->saveField('signalee', true);
    	return $this->redirect("/");
    }
    
    public function annonceSignalee() {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.signalee' => 1)
    	)));
    }
    
	public function reservation($id_annonce,$id_personneReservante,$id_personneProprio,$temps,$demande) {
    	if( $id_personneReservante != $id_personneProprio)
    	{
    		$this->Annonce->id = $id_annonce;
    		$this->Annonce->saveField('id_accepteur', $id_personneReservante);
    		if ($demande == 1) {
    			$this->operationTemps($id_personneReservante, $temps, 'c');
    			$this->operationTemps($id_personneProprio, $temps, 'd');
    		}
   			else {
   				$this->operationTemps($id_personneProprio, $temps, 'c');
   				$this->operationTemps($id_personneReservante, $temps, 'd');
   			}
    	}
    	return $this->redirect('/annonces/view/'.$id_annonce);
    }
    
    public function mes_annonces()
    {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.user_id' => AuthComponent::user('id'))
    	)));
    }
    
	private function operationTemps ($id_personne,$temps,$debitOuCredit){
    	$this->Annonce->User->id = $id_personne;
    	$tempsFinal = 0;
    	$users = $this->Annonce->User->find('all', array(
    			'conditions' => array('User.id' => $id_personne)
    	));
    	foreach ($users as $user){
    		$tempsFinal = $user['User']['credit_temps'];
    	}
    	 if ($debitOuCredit == 'd'){
    	 	$tempsFinal -= $temps;
    	 }
    	 else {
    	 	$tempsFinal += $temps;
    	 }
    	$this->Annonce->User->saveField('credit_temps',$tempsFinal);
    	//return $this->redirect("/");
    }
    
    public function valider_annonce ($id_annonce){
    	$this->Annonce->id = $id_annonce;
    	$this->Annonce->saveField('annonceValide', 'oui');
    	return $this->redirect(array('action' => 'annonce_pas_valide'));
    }
    
    public function annonce_pas_valide (){
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.annonceValide' => 'non')
    	)));
    }
    
    public function isAuthorized($user) {
    	// Tous les users inscrits peuvent ajouter des anonces, consulter, et réserver
    	if ($this->action === 'add' || $this->action === 'demande' || $this->action === 'offre'
    		|| $this->action === 'mes_annonces' || $this->action === 'reservation' || $this->action === 'mon_historique'
    		|| $this->action === 'annonce_pas_valide' || $this->action === 'valider_annonce' ) {
    		return true;
    	}
    	// L'utilisateur peut éditer ou supprimer son annonce
    	if (in_array($this->action, array('edit', 'delete'))) {
    		$annonceId = (int) $this->request->params['pass'][0];
    		$userId = $this->Annonce->find('first', array(
    				'conditions' => array('Annonce.id' => $annonceId)));
    		$annonceUserId = $userId['Annonce']['user_id'];
    		if ($this->Annonce->isOwnedBy($annonceUserId, $user['id'])) {
    			return true;
    		}
    	}
    
    	return parent::isAuthorized($user);
    }
    
	public function mon_historique()
    {
    	//récupérer la liste de toutes les annonces
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array(
    								'OR' => array(
    									'Annonce.user_id' => AuthComponent::user('id'),
    									'Annonce.id_accepteur' => AuthComponent::user('id')
    								)
    							)
    	)));
    }
}
?>