<?php

class Utilisateur extends AppModel
{
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
            	'message' => 'Cet utilisateur existe déjà'
       	 )
	);
	
	public function emailUnique($check)
	{
		// $check aura comme valeur : array('mail' => 'une valeur')
		$compteur = $this->find('count', array(
				'conditions' => $check,
				'recursive' => -1
		));
		return $compteurCodeActuel < $limit;
	}
}