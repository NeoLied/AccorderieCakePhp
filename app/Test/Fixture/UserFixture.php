<?php

class UserFixture extends CakeTestFixture
{
	public $useDbConfig = 'test';
	
	public $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary'),
			'username' => array('type' => 'string', 'length' => '100'),
			'password' => array('type' => 'string', 'length' => '100'),
	);
	
	public $records = array(
			array('id' => 1, 'username' => 'Tristan', 'password' => 'test')
	);
}