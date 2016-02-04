<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
	
    public function beforeFilter() {
	    parent::beforeFilter();
	    // Permet aux utilisateurs de s'enregistrer, de se déconnecter et de reset le mot de passe
	    $this->Auth->allow('add', 'logout');
        $this->Auth->allow('add', 'reset');
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
        //S'il n'y a pas d'avatar supprimer sinon ajouter le nouvel avatar
		$this->User->validator()->remove('avatar');
        if ($this->request->is('post')) {

			// Envoi fichier avatar
			if(!empty($this->data['User']['avatar']['name']))
        	{
        		$file=$this->data['User']['avatar'];
        		$ary_ext=array('png','jpg','jpeg','gif'); //array of allowed extensions
        		$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
        		if(in_array($ext, $ary_ext))
        		{
        			move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img'. DS . 'uploads' .DS . time().$file['name']);
        			$this->request->data['User']['avatar'] = time().$file['name'];
        		}
        	}else{
				$this->request->data['User']['avatar'] = WWW_ROOT . 'img'. DS . 'uploads' .DS . 'avatar.png';
			}
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('L\'utilisateur a été sauvegardé, le compte va être prochainement validé par un administrateur','default', array('class' => 'alert alert-success'));

				$this->User->send($this->request->data['User'], '', 'Un nouveau utilisateur s\'est inscrit sur La Marmite', 'contact');

                return $this->redirect('/');
            } else {
				$this->Session->setFlash('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.','default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function edit($id) {
		$this->User->validator()->remove('avatar');
		// Envoi fichier avatar
		/*if(!empty($this->data['User']['avatar']['name']))
		{
			$file=$this->data['User']['avatar'];
			$ary_ext=array('png','jpg','jpeg','gif'); //array of allowed extensions
			$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
			if(in_array($ext, $ary_ext))
			{
				move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img'. DS . 'uploads' .DS . time().$file['name']);
				$this->request->data['User']['avatar'] = time().$file['name'];
			}
		}else{
			$this->request->data['User']['avatar'] = WWW_ROOT . 'img'. DS . 'uploads' .DS . 'avatar.png';
		}*/

    	//######### AJOUTER UNE COMPETENCE ##########//
    	/*$some_sql = "Select libelle from competences";
    	$db = ConnectionManager::getDataSource('default');
    	$result = $db->query($some_sql);
    	
    	$type = array();
    	foreach ($result as $row) {
    		$type[$row['competences']['libelle']] = $row['competences']['libelle'];
    	}
    	$this->set('type', $type);*/
    	
        //$this->User->id = $id;

        if (! $user = $this->User->findById($id)) {
            throw new NotFoundException(__('Utilisateur Invalide'));
        }
        if ( $this->request->is('put')) {

            if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('L\'utilisateur a été édité','default', array('class' => 'alert alert-success'));
             if($this->Auth->user('id') == $id)  $this->Auth->login($this->request->data['User']);
                return $this->redirect(array('action' => 'index'));
            } else {
				$this->Session->setFlash('L\'utilisateur n\'a pas été édité. Merci de réessayer.','default', array('class' => 'alert alert-danger'));
            }
        } else {
            $this->request->data = $user;
            unset($this->request->data['User']['password']);
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
			$this->Session->setFlash('Utilisateur supprimé','default', array('class' => 'alert alert-warning'));
            return $this->redirect(array('action' => 'index'));
        }
		$this->Session->setFlash('L\'utilisateur n\'a pas été supprimé','default', array('class' => 'alert alert-danger'));
        return $this->redirect(array('action' => 'index'));
    }
	
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl("/"));
	        } else {
				$d = $this->User->find('first', array('conditions' => array('username' => $this->request->data['User']['username'])));
                App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

                $passwordHasher = new SimplePasswordHasher();
                $passwordHasher= $passwordHasher->hash($this->request->data['User']['password']);

				if($d['User']['offre_de_bienvenue'] == 'non' && $d['User']['password'] == $passwordHasher){
					$this->Session->setFlash("Votre compte n'a pas encore été validé",'default', array('class' => 'alert alert-warning'));
				}else{
					$this->Session->setFlash("Nom d'utilisateur ou mot de passe invalide, merci de réessayez",'default', array('class' => 'alert alert-danger'));
				}
	        }
	    }
	}
	
	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
	
	public function credit_temps() {
      	$this->set('users',  $this->User->find('all', array(
    			'conditions' => array('User.id' => AuthComponent::user('id'))
    	)));
	}
	
	public function isAuthorized($user) {
		// Tous les users inscrits peuvent ajouter les posts
		if ($this->action === 'add') {
			return true;
		}
	
		// L'utilisateur peut éditer son profil
		if (in_array($this->action, array('edit'))) {
			$userId = (int) $this->request->params['pass'][0];
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
		$array = $this->User->find('first', array('conditions' => array('User.id' => $id_utilisateur,
		'User.offre_de_bienvenue' => 'non')));
		if (count($array) == 0) {
			$this->Session->setFlash('L\'utilisateur a déjà bénéficié de l\'offre de bienvenue !','default', array('class' => 'alert alert-warning'));
			return $this->redirect('/users/');
		}	
		// mettre à jour le crédit temps et verrouiller l'offre de bienvenue
		$credit_temps = $array['User']['credit_temps'];
		$credit_temps += 3;
		$this->User->id = $array['User']['id'];
		//var_dump($credit_temps);
		$this->User->saveField('credit_temps', $credit_temps);
		$this->User->saveField('offre_de_bienvenue', "oui");
		$this->Session->setFlash('Le compte de l\'utilisateur a été crédité de 3 heures.','default', array('class' => 'alert alert-success'));

		// On récupére les informations de l'utilisateur
		$mail = $this->User->find('first', array('conditions' => array('User.id' => $id_utilisateur)));

		// Envoie du mail
		$this->User->send($mail, $mail['User']['mail'], 'Votre compte sur La Marmite a été validé', 'validation');

		return $this->redirect('/users/');
	}

	public function utilisateur_pas_valide() {

		$this->set('users', $this->User->find("all",
			array(
				'conditions' => array('User.offre_de_bienvenue' => "non")
			)));
	}

    public function reset(){
        if(!empty($this->request->params['pass'])){
            $token = $this->request->params['pass'][0];
            $token = explode("-", $token);

            $user = $this->User->find('first', array('conditions' => array('id' => $token[0],'MD5(password)' => $token[1], 'offre_de_bienvenue' => "oui")));

			if($user){
				$this->User->id = $user['User']['id'];
				$pwd = substr(md5(uniqid(rand(), true)), 2, 10);

				$this->User->saveField('password', $pwd);

				$this->User->send($pwd, $user['User']['mail'], 'Nouveau mot de passe', 'reset_pwd');

				$this->redirect("/users/login/", null, false);
				$this->Session->setFlash("Votre mot de passe à été réinisialisé, votre nouveau mot de passe vous a été envoyé par mail",'default', array('class' => 'alert alert-success'));
			}else{
                $this->Session->setFlash("Le lien n'est pas valide",'default', array('class' => 'alert alert-danger'));
            }
        }

        if($this->request->is('post')){
            $v = current($this->request->data);
            $user = $this->User->find('first', array('conditions' => array('mail' => $v['mail'], 'offre_de_bienvenue' => "oui")));
            if(empty($user)){
                $this->Session->setFlash("Aucun utilisateur ne correspond à ce mail",'default', array('class' => 'alert alert-danger'));
            }else{
                //$this->Session->setFlash("Pour continuer, merci de cliquer sur le lien qui vous a été envoyé par mail",'default', array('class' => 'alert alert-success'));
				$this->redirect("/users/reset/". $user['User']['id'] ."-". md5($user['User']['password']));
                //$this->User->send($user['User'], $v['mail'], 'Mot de passe oublié', 'reset');
            }
        }

    }
}
?>