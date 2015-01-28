<?php

class UtilisateurFixture extends CakeTestFixture
{
	public $useDbConfig = 'test';
	
	public $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary'),
			'login' => array('type' => 'string', 'length' => '100'),
			'mdp' => array('type' => 'string', 'length' => '100'),
	);
	
	public $records = array(
			array('id' => 1, 'login' => 'Tristan', 'mdp' => 'test')
	);
}