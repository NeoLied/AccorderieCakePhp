<?php

class Annonce extends AppModel
{
	public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
     public $validate = array(
        'titre' => array(
            'rule' => 'notEmpty'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        ),
     	'temps_requis' => array(
     		'rule' => 'notEmpty'
     	)
    );
     
    public function isOwnedBy($annonce, $user) {
    	return $annonce == $user;
    }
}

?>