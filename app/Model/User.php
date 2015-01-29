<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $name = 'User';
	
	public $validate = array(
			'login' => array(
            	'alphaNumeric' => array(
                	'rule'     => 'alphaNumeric',
                	'required' => true,
                	'message'  => 'Chiffres et lettres uniquement !'
            	),
            	'between' => array(
                	'rule'    => array('lengthBetween', 5, 30),
                	'message' => 'Entre 5 et 30 caractères'
            	)
        	),
			
			'mdp' => array(
            	'alphaNumeric' => array(
                	'rule'     => 'alphaNumeric',
                	'required' => true,
                	'message'  => 'Chiffres et lettres uniquement !'
            	),
            	'between' => array(
                	'rule'    => array('lengthBetween', 5, 30),
                	'message' => 'Entre 5 et 30 caractères'
            	)
        	),
			
			'mail' => array(
            	'rule'    => array('emailUnique'),
            	'message' => 'Cet user existe déjà'
       	 	),
	);
	
	public function emailUnique($check)
	{
		// $check aura comme valeur : array('mail' => 'une valeur')
		$compteur = $this->find('count', array(
				'conditions' => $check,
				'recursive' => -1
		));
		return $compteur == 0;
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['mdp'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['mdp'] = $passwordHasher->hash(
					$this->data[$this->alias]['mdp']
			);
		}
		return true;
	}
}