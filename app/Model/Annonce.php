<?php

class Annonce extends AppModel

{
	public $name = 'Annonce';

	public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			),
			'Type'=>
					array(
							'className' => 'Type',
							'foreignKey' =>'type_id'
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

	public function beforeSave($options = array()){
		if($this->data[$this->alias]['id_accepteur'] == '0'){
			$this->data[$this->alias]['id_accepteur'] = '0';
		}

		return true;
	}
}
?>