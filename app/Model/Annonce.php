<?php

class Annonce extends AppModel

{
	public $name = 'Annonce';
	public $hasOne = array('Type'=>
			array(
			'className' => 'Type',
			'foreignKey' =>'id'

	));
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