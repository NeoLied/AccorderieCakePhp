<?php
App::import('Controller', 'App');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('CakeEmail', 'Network/Email');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class UsersController extends AppController
{

	public function beforeFilter()
	{
		parent::beforeFilter();
		// Permet aux utilisateurs de s'enregistrer, de se déconnecter et de reset le mot de passe
		$this->Auth->allow('add', 'logout');
		$this->Auth->allow('add', 'reset');
		$this->Auth->allow('add', 'add');


	}

	public function afterFilter()
	{
		parent::afterFilter();
		// Permet aux utilisateurs de s'enregistrer, de se déconnecter et de reset le mot de passe


	}


	public function index()
	{
		$this->User->recursive = 0;
		//$this->set('users', $this->paginate());
		$users =$this->User->find('all');
		$this->set('users', $users);
	}

	public function bloquer($id)
	{
		$this->User->id = $id;
		$this->User->saveField('bloquer', true);
		$this->Session->setFlash('Vous avez bien bloqué cette utilisateur', 'default', array('class' => 'alert alert-warning'));
		return $this->redirect("/");
	}

	public function debloquer($id)
	{
		$this->User->id = $id;
		$this->User->saveField('bloquer', false);
		$this->Session->setFlash('Vous avez bien debloqué cette utilisateur', 'default', array('class' => 'alert alert-warning'));
		return $this->redirect("/");
	}

	public function view($id = null)
	{
		$this->loadModel('Type');
		$this->loadModel('Evaluation');

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Utilisateur invalide'));
		}else{
			$this->set('user', $this->User->Read(null, $id));

		}
		if($evaluations = $this->Evaluation->find('all', array(
			'conditions' => array('offreur_id' => $id)
		))){
			$this->set('evaluations', $evaluations);
		}

		$user = $this->User->findById($id);
	if(	$favT = $this->Type->findById($user['User']['favoriteType'])){
		$this->set('favType', $favT['Type']);
	}else{
		$this->set('favType', "Aucun");
	}



	}

	public function add()
	{
		$this->loadModel('Type');
		$this->set('types', $this->Type->find('all', array('fields' => array('libelle'))));

		//S'il n'y a pas d'avatar supprimer sinon ajouter le nouvel avatar

		if ($this->request->is('post')) {
			$this->User->create();

			$this->request->data['User']['avatar']= $this->saveAvatar($this->request->data,null);
			if ($this->User->save($this->request->data)) {

				$this->Session->setFlash('L\'utilisateur a été sauvegardé, le compte va être prochainement validé par un administrateur', 'default', array('class' => 'alert alert-success'));

				$this->User->send($this->request->data['User'], 'accorderie31@gmail.com', 'Un nouveau utilisateur s\'est inscrit sur La Marmite', 'notification_nouvel_utilisateur');

				return $this->redirect('/');
			} else {
				$this->Session->setFlash('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.', 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	public function edit($id){
		$this->loadModel('Type');
		$this->set('types', $this->Type->find('all', array('fields' => array('libelle'))));
		if (!$user = $this->User->findById($id)) {
			throw new NotFoundException(__('Utilisateur Invalide'));
		}
		if ($this->request->is('put')) {
			$this->request->data['User']['avatar']= $this->saveAvatar($this->request->data,$user['User']['avatar']);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('L\'utilisateur a été édité', 'default', array('class' => 'alert alert-success'));
				if ($this->Auth->user('id') == $id)
					$this->Auth->login($this->request->data['User']);
				$this->redirect(array('action' => 'view',$id));
				//return $this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash('L\'utilisateur n\'a pas été édité. Merci de réessayer.', 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$this->request->data = $user;
			unset($this->request->data['User']['password']);
		}
		$this->set('user',$user);
}

	public function delete($id = null)
	{
		// Avant 2.5, utilisez
		// $this->request->onlyAllow('post');

		$this->request->allowMethod('post');

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Utilisateur invalide'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash('Utilisateur supprimé', 'default', array('class' => 'alert alert-warning'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('L\'utilisateur n\'a pas été supprimé', 'default', array('class' => 'alert alert-danger'));
		return $this->redirect(array('action' => 'index'));
	}

	public function login()
	{
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl("/"));
			} else {
				if(!empty($this->request->data) && isset($this->request->data)){
                    $d = $this->User->find('first', array('conditions' => array('username' => $this->request->data['User']['username'])));


                    $passwordHasher = new SimplePasswordHasher();
                    $passwordHasher = $passwordHasher->hash($this->request->data['User']['password']);

					if($d['User']['password'] != $passwordHasher || $d['User']['username']!= $this->request->data['User']['username']){
						$this->Session->setFlash("Nom d'utilisateur ou mot de passe invalide, merci de réessayez",'default', array('class' => 'alert alert-danger'));
					}
                    else if($d['User']['offre_de_bienvenue'] == 'non'){
                        $this->Session->setFlash("Votre compte n'a pas encore été validé",'default', array('class' => 'alert alert-warning'));
                    }
                    else if($d['User']['bloquer'] == '1' && $d['User']['password'] == $passwordHasher) {
                        $this->Session->setFlash("Votre compte a été bloqué", 'default', array('class' => 'alert alert-warning'));
                    }

				}
			}
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function getOffreBienvenue($user)
	{
		return ($user['User']['offre_de_bienvenue'] == "oui") ? 3 : 0;
	}

	private function getTempsDemande($user)
	{

		$this->loadModel('Annonce');
		$temps_demandes = 0;

		$user_demandes = $this->Annonce->findAllByDemandeAndUserId(
			0,
			$user['User']['id']
		);
		foreach ($user_demandes as $demande) {
			$temps_demandes += $demande['Annonce']['temps_requis'];
		}

		$user_demandes = $this->Annonce->findAllByDemandeAndArchiveAndIdAccepteur(
			1,
			1,
			$user['User']['id']
		);
		foreach ($user_demandes as $demande) {
			$temps_demandes += $demande['Annonce']['temps_requis'];
		}
//debug
		return $temps_demandes;

	}

	private function getTempsOffre($user)
	{
		$this->loadModel('Annonce');
		$temps_offres = 0;

		$user_offres = $this->Annonce->findAllByDemandeAndArchiveAndIdAccepteur(
			0,
			1,
			$user['User']['id']
		);
		foreach ($user_offres as $offre) {
			$temps_offres += $offre['Annonce']['temps_requis'];
		}
		$user_offres = $this->Annonce->findAllByDemandeAndArchiveAndUserId(
			1,
			1,
			$user['User']['id']
		);
		foreach ($user_offres as $offre) {
			$temps_offres += $offre['Annonce']['temps_requis'];
		}
		//debug($user_offres);
		return $temps_offres;
	}


	public function getCredit($id_user = null, $retour = false)
	{
		$this->loadModel('Parametres');
		$limit = $this->Parametres->find('first');

		$maxHeures = $limit['Parametres']['limiteTemp'];

		if ($id_user != null) {
			$this->User->id = $id_user;
			$user = $this->User->findById($id_user);

			$user['User']['credit_temps'] = ($this->getOffreBienvenue($user) + abs($this->getTempsOffre($user))) - abs($this->getTempsDemande($user));

			if ($user['User']['credit_temps'] > $maxHeures) {
				$user['User']['credit_temps'] = $maxHeures;
				if ($retour == false) {
					$this->Session->setFlash('Vous avez atteint le seuil maximal d\'heures.', 'default', array('class' => 'alert alert-warning'));
				}
			}

			if ($this->User->saveField('credit_temps', $user['User']['credit_temps'])) {
				if ($user['User']['credit_temps'] < $maxHeures) {
					if ($retour == false) {
						$this->Session->setFlash('Votre crédit a été actualisé.', 'default', array('class' => 'alert alert-success'));
					}
				}

			}
// Variable pour debuger GetCredit en utilisant sa vue
			$this->set('offre_bienvenue', $this->getOffreBienvenue($user));
			$this->set('temps_offre', $this->getTempsOffre($user));
			$this->set('temps_demande', $this->getTempsDemande($user));
			$this->set('temps_total', $user['User']['credit_temps']);
			$this->set('limit', $maxHeures);

			if ($retour == true) {
				return $user['User']['credit_temps'];
			}


			//$this->redirect('/users/getCredit/'. $id_user);
			//$this->redirect($this->referer());
		} else {
			if ($retour == false) {
				$this->redirect('/');
			}
		}
	}

	public function isAuthorized($user)
	{
		// Tous les users inscrits peuvent ajouter les posts
		if ($this->action === 'add') {
			return true;
		}

		// L'utilisateur peut éditer son profil
		if (in_array($this->action, array('edit'))) {
			$userId = (int)$this->request->params['pass'][0];
			if ($this->User->isOwnedBy($userId, $user['id'])) {
				return true;
			}
		}

		// Pas besoin de vérifier pour le crédit temps
		if (in_array($this->action, array('credit_temps'))) {
			return true;
		}

		return parent::isAuthorized($user);
	}

	public function offre_bienvenue($id_utilisateur)
	{
		// vérifier si l'utilisateur n'a pas déjà bénéficié de l'offre de bienvenue
		// sinon le renvoyer sur l'accueil 
		$this->User->id = $id_utilisateur;

		$user = $this->User->findById($id_utilisateur);

		if(!empty($user) && isset($user)){
			if ($user['User']['offre_de_bienvenue'] == "oui") {
				$this->Session->setFlash('L\'utilisateur a déjà bénéficié de l\'offre de bienvenue !', 'default', array('class' => 'alert alert-warning'));
				return $this->redirect('/users/');
			}
			// mettre à jour le crédit temps et verrouiller l'offre de bienvenue
			$user['User']['credit_temps'] += 3;

			//$this->User->saveField('credit_temps', $credit_temps);
			$this->User->saveField('offre_de_bienvenue', "oui");
			//$this->getCredit($id_utilisateur);
			$this->Session->setFlash('Le compte de l\'utilisateur a été crédité de 3 heures.', 'default', array('class' => 'alert alert-success'));

			// Envoie du mail
			$this->User->send($user, $user['User']['mail'], 'Votre compte sur La Marmite a été validé', 'validation');
		}

		return $this->redirect('/users/');
	}

	public function utilisateur_pas_valide()
	{

		$this->set('users', $this->User->find("all",
			array(
				'conditions' => array('User.offre_de_bienvenue' => "non")
			)));
	}

	public function reset()
	{
		if (!empty($this->request->params['pass'])) {
			$token = $this->request->params['pass'][0];
			$token = explode("-", $token);

			$user = $this->User->find('first', array('conditions' => array('id' => $token[0], 'MD5(password)' => $token[1], 'offre_de_bienvenue' => "oui")));

			if ($user) {
				$this->User->id = $user['User']['id'];
				$pwd = substr(md5(uniqid(rand(), true)), 2, 10);

				$this->User->saveField('password', $pwd);

				$this->User->send($pwd, $user['User']['mail'], 'Nouveau mot de passe', 'reset_pwd');

				$this->redirect("/users/login/", null, false);
				$this->Session->setFlash("Votre mot de passe à été réinisialisé, votre nouveau mot de passe vous a été envoyé par mail", 'default', array('class' => 'alert alert-success'));
			} else {
				$this->Session->setFlash("Le lien n'est pas valide", 'default', array('class' => 'alert alert-danger'));
			}
		}

		if ($this->request->is('post')) {
			$v = current($this->request->data);
			$user = $this->User->find('first', array('conditions' => array('mail' => $v['mail'], 'offre_de_bienvenue' => "oui")));
			if (empty($user)) {
				$this->Session->setFlash("Aucun utilisateur ne correspond à ce mail", 'default', array('class' => 'alert alert-danger'));
			} else {
				//$this->Session->setFlash("Pour continuer, merci de cliquer sur le lien qui vous a été envoyé par mail",'default', array('class' => 'alert alert-success'));
				$this->redirect("/users/reset/" . $user['User']['id'] . "-" . md5($user['User']['password']));
				//$this->User->send($user['User'], $v['mail'], 'Mot de passe oublié', 'reset');
			}
			}
		}

	public function update($id)
	{
		if($id == null)
			throw new NotFoundException;
			$user =$this->User->findAllById($id);
		$user['User']['credit_temps'] = $this->getCredit($id,true);
			$this->set('utilisateur', $user);

	}

	public function dynamic($id = null)
	{
		$this->set('user', null);

		if ($id != null) {

            $verifPref = $this->User->query(
                "SELECT lastPost, favoriteType, libelle
                FROM users u, types t
                WHERE u.id = ". $id ."
                AND u.favoriteType = t.id"
            );

            if(!empty($verifPref)){
                $this->set('prefs', $this->User->query(
                    "SELECT lastPost, favoriteType, libelle
                FROM users u, types t
                WHERE u.id = ". $id ."
                AND u.favoriteType = t.id"
                ));
            }else{
                $this->set('prefs', $this->User->query(
                    "SELECT lastPost, favoriteType
                FROM users u
                WHERE u.id = ". $id
                ));
            }

			$prefs = $this->User->query(
				"SELECT favoriteType
                FROM users u
                WHERE u.id = ". $id
			);

			$this->set('user', $id);

			$this->loadModel('Annonce');
			/*$this->set('annonces', $this->Annonce->find('all',array(
                'conditions' => array(
                    'annonceValide' => "oui",
                    'archive' => "0",
                    'id_accepteur' => 0,
                    'order' => array('date_post DESC'),
                    'limit' => "5")));*/

			$this->set('annonces', $this->Annonce->query(
				"SELECT *
                FROM annonces a, types t, users u
                WHERE a.type_id=t.id
                AND a.user_id=u.id
	                AND annonceValide = \"oui\"
                AND archive = '0'
                AND id_accepteur IN ('0', \"NULL\")
                ORDER BY date_post DESC
                LIMIT 5"
			));

			if($prefs[0]['u']['favoriteType'] != NULL){
				$this->set('annoncesType', $this->Annonce->query(
					"SELECT *
                FROM annonces a, types t, users u
                WHERE a.type_id=t.id
                AND a.user_id=u.id
                AND annonceValide = \"oui\"
                AND archive = '0'
                AND type_id = " . $prefs[0]['u']['favoriteType'] . "
                AND id_accepteur IN ('0', \"NULL\")
                ORDER BY date_post DESC
                LIMIT 5"
				));
			}

			$this->loadModel('Type');
			$this->set('types', $this->Type->find('all'));
		}
	}

	public function prefs($id = NULL, $params1 = NULL, $params2 = NULL)
	{
		if ($id != NULL && $params1 != NULL && $params2 != NULL) {
			$userId = $this->User->find('first', array('conditions' => array('id' => $id)));

			$this->User->query(
			"UPDATE users
            SET lastPost = " . $params1 . ", favoriteType = " . $params2 . "
            WHERE id = " . $id
			);

			//$this->redirect($this->Html->url("/", true));
		}
	}

	/**
	 * @param $id
	 * @param $tableau_debug
	 */
	private function saveAvatar($data,$oldAvatar)
	{
		// Sauvegarde de l' avatar
		//On définit le chemin et le nom de l'avatar
		$chemin_avatar ='img' . DS . 'avatars' . DS .'avatar_default';
		$ext='.png';
		// nom de l'avatar par defaut
		$file_name='avatar_default';

		if(isset($data['User']['avatar']['tmp_name']) && !empty(isset($data['User']['avatar']['tmp_name']))){
			if ($oldAvatar!= null && file_exists('img' . DS . 'avatars' . DS .$oldAvatar)) {
				unlink('img' . DS . 'avatars' . DS .$oldAvatar);
			}
				$file = $data['User']['avatar']['name'];

				/*On récupere l'extension de l'image*/
				$ary_ext = array('png', 'jpg', 'jpeg', 'gif'); //array of allowed extensions
				$ext = strtolower(strrchr($file, ".")); //get the extension

				if (in_array(substr($ext, 1), $ary_ext)) {
					if(isset($data['User']['id'])){
						$file_name = 'avatar_user_' . $data['User']['id'];
					}else{
						$file_name = 'avatar_user_' .time();
					}

					$chemin_avatar = 'img' . DS . 'avatars' . DS . $file_name;
				}else{
					//TODO : Retourner une exception pour prévenir que l extension de fichier est incorrect
					return false;
				}

			move_uploaded_file($data['User']['avatar']['tmp_name'], $chemin_avatar.$ext);
		}else{

			$file_name='avatar_default';
		}


		return $file_name.$ext;
	}
}