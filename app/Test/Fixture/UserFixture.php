<?php

class UserFixture extends CakeTestFixture
{
	public $useDbConfig = 'test';

public $import ='User';
	public $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary'),
			'username' => array('type' => 'string', 'length' => '50'),
			'password' => array('type' => 'string', 'length' => '255'),
			'nom' => array('type' => 'string', 'length' => '100'),
			'prenom' => array('type' => 'string', 'length' => '100'),
			'date_naissance' => array('type' => 'string', 'length' => '100'),
			'credit_temps' => array('type' => 'integer', 'length' => '11'),
			'offre_de_bienvenue' => array('type' => 'string', 'length' => '3'),

			'mail' => array('type' => 'string', 'length' => '100'),
			'adresse' => array('type' => 'string', 'length' => '100'),
			'code_postal' => array('type' => 'integer', 'length' => '5'),
			'ville' => array('type' => 'string', 'length' => '100'),
			'telephone' => array('type' => 'integer', 'length' => '10'),
			'avatar' => array('type' => 'string', 'length' => '255'),
			'identite' => array('type' => 'string', 'length' => '255'),
			'presentation' => array('type' => 'string', 'length' => '140'),
			'question_secrete' => array('type' => 'string', 'length' => '500'),
			'reponse_secrete' => array('type' => 'string', 'length' => '100'),
			'role' => array('type' => 'string', 'length' => '10'),
			'created' => array('type' => 'date'),
			'evaluation_id' => array('type' => 'integer', 'length' => '11'),
			'bloquer' => array('type' => 'intege', 'length' => '1'),
			'favoriteType' => array('type' => 'integer', 'length' => '3'),
			'lastPost' => array('type' => 'integer', 'length' => '1'),
	);
	
	public $records = array(
			array('id' => 7,
				'username' => 'Georges',
				'password' => 'Georges',
				'nom' => 'Georges',
				'prenom' => 'Georges',
				'date_naissance' => '00-00-0000',
				'credit_temps' => 3,
				'offre_de_bienvenue' => 'oui',

				'mail' => 'oui',
				'adresse' => 'oui',
				'code_postal' => 'oui',
				'ville' => 'oui',
				'telephone' => 'oui',
				'avatar' => 'oui',
				'identite' => 'oui',
				'presentation' => 'oui',
				'question_secrete' => 'oui',
				'reponse_secrete' => 'oui',
				'role' => 'oui',
				'created' => 'oui',
				'evaluation_id' => 'oui',
				'bloquer' => 'oui',
				'favoriteType' => 'oui',
				'lastPost' => 'oui'),
	);
}