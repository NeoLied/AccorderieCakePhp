<?php

class UserFixture extends CakeTestFixture
{
	public $useDbConfig = 'test';
	
	public $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary'),
			'username' => array('type' => 'string', 'length' => '100'),
			'password' => array('type' => 'string', 'length' => '100'),
			'credit_temps' => array('type' => 'integer'),
			'offre_de_bienvenue' => array('type' => 'string', 'length' => '3'),
	);
	
	public $records = array(
			array('id' => 1, 'username' => 'Tristan', 'password' => 'test', 'credit_temps' => 3,'offre_de_bienvenue' => 'oui'),
			array('id' => 2, 'username' => 'aurelien', 'password' => 'aurelien', 'credit_temps' => 3,'offre_de_bienvenue' => 'non')
	);
}