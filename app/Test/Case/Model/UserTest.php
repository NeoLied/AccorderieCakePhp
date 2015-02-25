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
	
	public function model_user_isOwnedBy_true()
	{
		$result = $this->User->isOwnedBy(1,1);
		$expected = true;
		$this->assertEquals($expected, $result);
	}
	
	public function model_user_isOwnedBy_false()
	{
		$result = $this->User->isOwnedBy(1,2);
		$expected = false;
		$this->assertEquals($expected, $result);
	}
}