<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

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
    			'rule' => 'notEmpty',
    			'message' => 'Un numéro de téléphone valide est requis'
    		),
    		'telLongueur' => array(
    			'rule'    => array('lengthBetween', 10, 10),
    			'message' => '10 Chiffres uniquement',
    		),
    		'telNombre' => array(
    			'rule'    => 'numeric',
    			'message' => '10 Chiffres uniquement',
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
    			'rule' => 'notEmpty',
    			'message' => 'Un code postal est obligatoire'    				
    		),
    		'cpLongueur' => array(
    			'rule'    => array('lengthBetween', 5, 5),
    			'message' => '5 Chiffres uniquement',
    		),
    		'cpNombre' => array(
    			'rule'    => 'numeric',
    			'message' => '5 Chiffres uniquement',
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
    	'identite' => array(
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
	
	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new SimplePasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    if (isset($this->data[$this->alias]['reponse_secrete'])) {
	    	$passwordHasher = new SimplePasswordHasher();
	    	$this->data[$this->alias]['reponse_secrete'] = $passwordHasher->hash(
	    			$this->data[$this->alias]['reponse_secrete']
	    	);
	    }
	    return true;
	    
	}
}
?>