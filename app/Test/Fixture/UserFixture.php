<?php

class UserFixture extends CakeTestFixture
{
	public $useDbConfig = 'test';
	
	public $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary'),
			'username' => array('type' => 'string', 'length' => '100'),
			'password' => array('type' => 'string', 'length' => '100'),
			'credit_temps' => array('type' => 'integer'),
	);
	
	public $records = array(
			array('id' => 1, 'username' => 'Tristan', 'password' => 'test', 'credit_temps' => 3),
			array('id' => 2, 'username' => 'aurelien', 'password' => 'aurelien', 'credit_temps' => 3)
	);
}