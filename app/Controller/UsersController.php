<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class UsersController extends AppController {

	public $helpers = array('Html', 'Form');
	
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
				debug($this->request->data);
                $this->Session->setFlash(__('L\'utilisateur a été sauvegardé'));
                return $this->redirect('/');
            } else {
                $this->Session->setFlash(__('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
    }

    public function edit($id = null) {
    	
    	$some_sql = "Select libelle from competences";
    	$db = ConnectionManager::getDataSource('default');
    	$result = $db->query($some_sql);
    	
    	$type = array();
    	foreach ($result as $row) {
    		$type[$row['competences']['libelle']] = $row['competences']['libelle'];
    	}
    	$this->set('type', $type);
    	
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Utilisateur Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'utilisateur a été édité'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'utilisateur n\'a pas été édité. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
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
            $this->Session->setFlash(__('Utilisateur supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'utilisateur n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }
	
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl("/"));
	        } else {
	            $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayez"));
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
			$this->Session->setFlash(__('L\'utilisateur a déjà bénéficié de l\'offre de bienvenue !'));
			return $this->redirect('/users/');
		}	
		// mettre à jour le crédit temps et verrouiller l'offre de bienvenue
		$credit_temps = $array['User']['credit_temps'];
		$credit_temps += 3;
		$this->User->id = $array['User']['id'];
		var_dump($credit_temps);
		$this->User->saveField('credit_temps', $credit_temps);
		$this->User->saveField('offre_de_bienvenue', "oui");
		$this->Session->setFlash(__('Le compte de l\'utilisateur a été crédité de 3 heures.'));
		return $this->redirect('/users/');
	}
}
?>