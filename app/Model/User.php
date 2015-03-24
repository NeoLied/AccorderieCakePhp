<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('FrValidation', 'Localized.Validation');
App::uses('Folder', 'Utility');

class User extends AppModel {	
	public $name = 'User';
    public $validate = array(
    	'username' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Un nom d\'utilisateur est requis'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 4, 100),
    			'message' => 'Le nom d\'utilisateur doit faire entre 4 et 100 caractères'
    		)
    	),
    	// Password lors de l'ajout
    	'password' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Un mot de passe est requis'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 6, 100),
    			'message' => 'Le mot de passe doit faire entre 6 et 100 caractères'
    		)
    	),
    	'passwordconfirm' => array(
    			'rule' => array('equaltofield','password'),
    			'message' => 'Les mots de passe ne sont pas identiques',
    	),
    	// Password lors de l'édition
    	'passwordnew' => array(
    		'required' => false,
    		'allowEmpty' => true,
    		'rule' => array('lengthBetween', 6, 100),
    		'message' => 'Le mot de passe doit faire entre 6 et 100 caractères'
    	),
    	'passwordnewconfirm' => array(
    			'required' => false,
    			'allowEmpty' => true,
    			'rule' => array('equaltofield','passwordnew'),
    			'message' => 'Les mots de passe ne sont pas identiques',
    	),    	
    	'nom' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Un nom est requis'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 2, 100),
    			'message' => 'Le nom doit faire entre 2 et 100 caractères'
    		)
    	),
    	'prenom' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Un prénom est requis'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 2, 100),
    			'message' => 'Le prénom doit faire entre 2 et 100 caractères'
    		)
    	),
    	'date_naissance' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Une date de naissance est requise'
    		)
    	),
    	'mail' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Un mail valide est requis'
    		),
    		'mailVerif' => array(
    			'rule' => 'email',
    			'message' => 'Mail invalide'
    		)
    	),
    	'telephone' => array(
    		'required' => array(
    			'rule' => array('phone', null, 'fr'),
    			'message' => 'Un numéro de téléphone valide est requis'
    		)
    	),
    	'adresse' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Un adresse valide est requise'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 2, 100),
    			'message' => 'L\'adresse doit faire entre 2 et 100 caractères'
    		)
    	),
    	'code_postal' => array(
    		'required' => array(
    			'rule' => array('postal', null, 'fr'),
    			'message' => 'Un code postal valide est obligatoire'    				
    		)
    	),
    	'ville' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Une ville est requise'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 2, 100),
    			'message' => 'La ville doit faire entre 2 et 100 caractères'
    		)
    	),
    	'avatar' => array(
    		'image' => array(
        		'rule'    => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
        		'message' => 'Merci de soumettre une image valide.'
   			),
    		'poidsImage' => array(
    			'rule' => array('fileSize', '<=', '1MB'),
    			'message' => 'L\'image doit être inférieure à 1MB'
    		)
    	),
    	'presentation' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Une petite présentation est requise'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 30, 1500),
    			'message' => 'La présentation doit faire entre 30 et 1500 caractères'
    		)
    	),
    	'question_secrete' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Un choix de question secrète est obligatoire'
    		),
    	),
    	'reponse_secrete' => array(
    		'required' => array(
    			'rule' => array('notEmpty'),
    			'message' => 'Une réponse secrète est requise'
    		),
    		'CaracLongueur' => array(
    			'rule' => array('lengthBetween', 2, 100),
    			'message' => 'La réponse secrète doit faire entre 2 et 100 caractères'
    		)
    	),
    );
    
    public function isOwnedBy($userId, $userBdd) {
    	return $userId == $userBdd;
    }
    
    public function equaltofield($check,$otherfield)
    {
    	//get name of field
    	$fname = '';
    	foreach ($check as $key => $value){
    		$fname = $key;
    		break;
    	}
    	return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    }
	
	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new SimplePasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    if (isset($this->data[$this->alias]['passwordconfirm'])) {
	    	$passwordHasher = new SimplePasswordHasher();
	    	$this->data[$this->alias]['password'] = $passwordHasher->hash(
	    			$this->data[$this->alias]['passwordconfirm']
	    	);
	    }
	    if (isset($this->data[$this->alias]['reponse_secrete'])) {
	    	$passwordHasher = new SimplePasswordHasher();
	    	$this->data[$this->alias]['reponse_secrete'] = $passwordHasher->hash(
	    			$this->data[$this->alias]['reponse_secrete']
	    	);
	    }
	    // BUG LORSQUE UN MOT DE PASSE COMPRIS ENTRE 1 ET 6 CARACTERES EST RENTRE (IL REMPLACE L'ANCIEN ALORS
	    // QU'IL NE DEVRAIT PAS
	    if (isset($this->data[$this->alias]['passwordnewconfirm'])
	    		&& !empty($this->data[$this->alias]['passwordnewconfirm'])) {
	    	$passwordHasher = new SimplePasswordHasher();
	    	$this->data[$this->alias]['password'] = $passwordHasher->hash(
	    			$this->data[$this->alias]['passwordnewconfirm']
	    	);
	    }
	    return true;
	    
	}
}
?>