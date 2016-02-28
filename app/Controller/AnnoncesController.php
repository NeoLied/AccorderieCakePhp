<?php
class AnnoncesController extends AppController
{

	public $helpers = array('Html', 'Form');

	/*
     * Fonctions refactorées
     */


	public function desisterAnnonce($idAnnonce){
		$this->Annonce->id = $idAnnonce;
		$this->Annonce->saveField('id_accepteur', '0');
		$this->Session->setFlash('Vous avez bien été désisté de cette annonce','default', array('class' => 'alert alert-warning'));
		return $this->redirect("/");
	}
    public function refuserOffre($idAnnonce){
        $this->loadModel('User');
        $this->Annonce->id = $idAnnonce;
        $annonce =$this->Annonce->findById($idAnnonce);
        $offreur = $this->User->findById($annonce['Annonce']['id_accepteur']);
        $this->Annonce->saveField('id_accepteur', '0');

        $this->User->send($annonce, $offreur['User']['mail'], 'Votre offre de service a été refusé', 'refuserOffre');

        $this->Session->setFlash('La proposition de service a été refusée','default', array('class' => 'alert alert-warning'));


        return $this->redirect("/");
    }


    public function cloturer_annonce()
	{
		$this->loadModel('User');

        if($this->request->is("post")){
            $annonce = $this->Annonce->findById($this->request->data['Annonce']['id']);
            $this->Annonce->id = $annonce['Annonce']['id'];

            //debug($annonce);
            $offreur = $this->Annonce->User->findById( $annonce['Annonce']['id_accepteur']);

            $this->User->id = $annonce['Annonce']['id_accepteur'];
            if($this->Annonce->saveAll($this->request->data)){

                $this->Session->setFlash('La demande a bien été cloturer','default', array('class' => 'alert alert-success'));
                $this->retourPageAccueil();
            }else{
                $this->Session->setFlash('Une erreur s\' est produite, la demande n\'a pas été cloturer','default', array('class' => 'alert alert-success'));
            }
        }
/*
		if($this->Annonce->saveField('archive',1)){

			$this->Session->setFlash('La demande a bien été cloturer','default', array('class' => 'alert alert-success'));
			$this->retourPageAccueil();
		}else{
			$this->Session->setFlash('Une erreur s\' est produite, la demande n\'a pas été cloturer','default', array('class' => 'alert alert-success'));
		}
*/



	}
	public function valider_service($id) {
		$this->loadModel('User');
		$annonce =  $this->Annonce->findById($id);
		$this->set('annonce',$annonce);
		$this->set('offreur',$this->User->findById($annonce['Annonce']['id_accepteur']));

	}

    public function index() {
         $this->set('annonces', $this->selectAllAnnonces());
    }
   
    private function selectAllAnnonces($type = null) {
    	if($type == null) {
    		return $this->Annonce->find('all');
    	} else {
    		return $this->Annonce->find('all',
    				array('conditions' => array('Annonce.demande' => $type, 'Annonce.annonceValide' => 'oui' )
    				));
    	}
    }
    	 
    public function offre() {

		$this->loadModel('Type');
		App::uses('CakeTime', 'Utility');
		$annonces = null;
		$annoncesUrgentes=null;
		$annoncesExpires=null;
		$annoncesNormales=null;

		if($this->request->is('post')) {
			if (($this->request->data['Annonce']['type_id']) > 0) {
				$annonces = $this->Annonce->find('all', array(
					//tableau de conditions
					'conditions' => array('Annonce.demande' => 1,
						'Annonce.annonceValide' => 'oui',
						'Annonce.type_id' => $this->request->data['Annonce']['type_id'])
				));
			} else {
				$annonces = $this->Annonce->find('all', array(
					//tableau de conditions
					'conditions' => array('Annonce.demande' => 1,
						'Annonce.annonceValide' => 'oui'
					)));
			}

			list($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales) = $this->setStatutAnnonce($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales);

		}else{
			$annonces = $this->Annonce->find('all', array(
				//tableau de conditions
				'conditions' => array('Annonce.demande' => 1,
					'Annonce.annonceValide' => 'oui'
				)));

			list($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales) = $this->setStatutAnnonce($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales);
		}

		$this->set('annonces', $annonces);
		$this->set('annoncesUrgentes', $annoncesUrgentes);
		$this->set('annoncesExpires', $annoncesExpires);
		$this->set('annoncesNormales', $annoncesNormales);

		$this->set('types', $this->Type->find('list',array(
			'fields' => 'Type.libelle'
		)));

    //	$this->set('annonces', $this->selectAllAnnonces(1));
    }
    
    public function demande() {
		$this->loadModel('Type');
		App::uses('CakeTime', 'Utility');
		$annonces = null;
		$annoncesUrgentes=null;
		$annoncesExpires=null;
		$annoncesNormales=null;

		if($this->request->is('post')) {
			if (($this->request->data['Annonce']['type_id']) > 0) {
				$annonces = $this->Annonce->find('all', array(
					//tableau de conditions
					'conditions' => array('Annonce.demande' => 0,
						'Annonce.annonceValide' => 'oui',
						'Annonce.archive' => false,
						'Annonce.type_id' => $this->request->data['Annonce']['type_id']),
                    'order' =>  'Annonce.date_post DESC'

				));
			} else {
				$annonces = $this->Annonce->find('all', array(
					//tableau de conditions
					'conditions' => array('Annonce.demande' => 0,
						'Annonce.annonceValide' => 'oui',
						'Annonce.archive' => false
					),
                    'order' =>  'Annonce.date_post DESC'
                    ));
			}

			list($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales) = $this->setStatutAnnonce($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales);

		}else{
			$annonces = $this->Annonce->find('all', array(
				//tableau de conditions
				'conditions' => array('Annonce.demande' => 0,
					'Annonce.annonceValide' => 'oui',
					'Annonce.archive' => false
				),
                'order' => 'Annonce.date_post DESC'
            ));

			list($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales) = $this->setStatutAnnonce($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales);
		}

    	$this->set('annonces', $annonces);

    	$this->set('annoncesUrgentes', $annoncesUrgentes);

    	$this->set('annoncesExpires', $annoncesExpires);

    	$this->set('annoncesNormales', $annoncesNormales);

		$this->set('types', $this->Type->find('list',array(
				'fields' => 'Type.libelle'
		)));
    }
    
    /*
     * Fonctions à refactorer
     */
    
    public function view($id = null) {
    	$this->testerExistenceAnnonceParID($id);
    	$annonce = $this->Annonce->findById($id);
    	$this->testerExistenceAnnonceParObjet($annonce);
    	$this->set('annonce', $annonce);
    }
    
    private function testerExistenceAnnonceParID($id) {
    	if (!$id) {
    		throw new NotFoundException(__('Annonce invalide'));
    	}
    }
    
    private function testerExistenceAnnonceParObjet($annonce) {
    	if (!$annonce) {
            throw new NotFoundException(__('Annonce invalide'));
        }
    }
    
    public function add() {
		$this->loadModel('Type');
		$this->set('type',$this->Type->find('list',array(
			'fields' => 'Type.libelle'
		)));

    	if ($this->request->is('post')) {
    		$this->Annonce->create();
    		if ($this->Annonce->save($this->request->data)) {
				$this->Session->setFlash('L\'annonce a été ajoutée.','default', array('class' => 'alert alert-success'));

				$this->retourPageAccueil();
    		}
			$this->Session->setFlash('Impossible d\'ajouter votre annonce.','default', array('class' => 'alert alert-danger'));
		}
    }
    
    private function retourPageAccueil() {
    	return $this->redirect("/");
    }
    
    public function edit($id) {
    	//$this->testerExistenceAnnonce($id);
		//$this->testerExistenceAnnonceParObjet($annonce);

		$this->loadModel('Type');
		//$requete = "Select libelle from types";
		//$result = $this->injecterRequete($requete);


    	$annonce = $this->Annonce->findById($id);
		$this->set('type',$this->Type->find('list',array(
				'fields' => 'Type.libelle'
		)));
    	if ($this->request->is( 'put')) {
			if ($this->Annonce->save($this->request->data)) {
				$this->Session->setFlash('Votre annonce a été éditée','default', array('class' => 'alert alert-success'));
				$this->retourPageAccueil();
			}
			$this->Session->setFlash('Impossible de modifier l\'annonce.','default', array('class' => 'alert alert-warning'));
		}
    	if (!$this->request->data) {
    		$this->request->data = $annonce;
    	}
    }
    
    public function delete($id)
    {
    	if ($this->request->is('get'))
    	{
    		throw new MethodNotAllowedException();
    	}
    	if ($this->Annonce->delete($id))
    	{
    		$this->Session->setFlash(__('L\'annonce avec id : %s a été supprimée.', h($id)), 'default', array('class' => 'alert alert-warning'));
    		$this->retourPageAccueil();
    	}
    }
    
    public function signaler($id){
    	$this->Annonce->id = $id;
    	$this->Annonce->saveField('signalee', true);
    	$this->retourPageAccueil();
    }
    
    public function annonceSignalee() {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.signalee' => 1)
    	)));
    }
    
	public function reservation($id_annonce,$id_personneReservante,$id_personneProprio,$temps,$demande) {
        $this->loadModel('User');
    	if( $id_personneReservante != $id_personneProprio)
    	{
    		$this->Annonce->id = $id_annonce;
    		$this->Annonce->saveField('id_accepteur', $id_personneReservante);

    	}

		$infoP = $this->User->findById( $id_personneReservante);
		$info = $this->User->findById($id_personneProprio);
		$info = $this->User->findById($id_personneProprio);

		$this->User->send($infoP, $info['User']['mail'], 'Un utilisateur vous à fait une demande de réservation sur La Marmite', 'reservation');

    	return $this->redirect('/annonces/view/'.$id_annonce);
    }

	/**
	 * @param $annonces
	 * @param $annoncesExpires
	 * @param $annoncesUrgentes
	 * @param $annoncesNormales
	 * @return array
	 */
	public function setStatutAnnonce($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales)
	{
		for ($i = 0; $i < sizeof($annonces); $i++) {

			if (CakeTime::isPast($annonces[$i]['Annonce']['date_limite'])) {
				$annonces[$i]['Annonce']['statut'] = "Expiré";
				$annoncesExpires[$i] = $annonces[$i];
			} else if ($this->isUrgente($annonces[$i])) {
				$annonces[$i]['Annonce']['statut'] = "Urgent";
				$annoncesUrgentes[$i] = $annonces[$i];
			} else {
				$annonces[$i]['Annonce']['statut'] = "   ";
				$annoncesNormales[$i] = $annonces[$i];
			}
		}
		return array($annonces, $annoncesExpires, $annoncesUrgentes, $annoncesNormales);
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
    }
    
    public function mes_annonces()
    {
    	$this->set('annonces',  $this->Annonce->find('all', array(
    			'conditions' => array('Annonce.user_id' => AuthComponent::user('id'))
    	)));
    }
    
    /*
     * Fonctions privées réutilisables
     */


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
    	// Tous les users inscrits peuvent ajouter des annonces, consulter, et réserver
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

		$this->set('demandes',  $this->Annonce->find('all', array(
			'conditions' => array(
                'Annonce.demande' => 0,
					'Annonce.user_id' => AuthComponent::user('id')

			)
		)));
        $this->set('offres',  $this->Annonce->find('all', array(
			'conditions' => array(
                'Annonce.demande' => 1,
					'Annonce.user_id' => AuthComponent::user('id')
			)
		)));

   	 	$requete = "Select offre_de_bienvenue from users where id = ".AuthComponent::user('id');
    	$result = $this->injecterRequete($requete);

    	$offre = $result[0];
    	$this->set('offre_bienvenue',$result);

    }

    private function injecterRequete($requete) {
    	$db = ConnectionManager::getDataSource('default');
    	return $db->query($requete);
    }

	public function manage() {
		$this->loadModel('Type');
		$this->set('types',$this->Type->find('all'));


		if($this->request->is('post')){
			$type = $this->request->data;

			if(!isset($this->request->data['Parametres']['limiteTemps'])){

				if ($this->Type->save($this->request->data)) {
					$this->Session->setFlash(__('Le type de service %s a bien été crée', $type['Type']['libelle']), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array("action" => "manage"));
				}else{
					$this->Session->setFlash('Impossible de créer le type de service', 'default', array('class' => 'alert alert-danger'));
				}
			}else{
				$this->loadModel('Parametres');
				$this->set('parametres',$this->Parametres->find('first'));
				$this->Parametres->id = 1;

				if($this->Parametres->saveField('limiteTemp', $this->request->data['Parametres']['limiteTemps'])){
					$this->Session->setFlash('Limite crédit temps modifié.','default', array('class' => 'alert alert-success'));
				}else{
					$this->Session->setFlash('Echec de l\'enregistrement.','default', array('class' => 'alert alert-danger'));
				}
			}

		}
	}
	public function isUrgente($annonce){

		 return (date_diff(new DateTime($annonce['Annonce']['date_limite']), new DateTime('now'))->format("%a") < 4 )? true : false;

		}

}
?>