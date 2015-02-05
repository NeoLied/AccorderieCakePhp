<?php
App::uses('User', 'Model');

class UserTestCase extends CakeTestCase
{
	public $fixtures = array('app.user');
	
	public function setUp()
	{
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}
	
	public function testPHPUNIT()
	{
		return true;
	}
}