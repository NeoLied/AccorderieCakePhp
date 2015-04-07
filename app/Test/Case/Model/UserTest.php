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
	
	public function test_model_user_isOwnedBy_true()
	{
		$result = $this->User->isOwnedBy(1,1);
		$expected = true;
		$this->assertEquals($expected, $result);
	}
	
	public function test_model_user_isOwnedBy_false()
	{
		$result = $this->User->isOwnedBy(1,2);
		$expected = false;
		$this->assertEquals($expected, $result);
	}
	
	public function test_model_user_beforeSave()
	{
		$result = $this->User->beforeSave();
		$expected = true;
		$this->assertEquals($expected, $result);
	}
	
	public function test_model_user_beforeSave_password()
	{
		$this->User->data[$this->User->alias]['password'] = "test";
		$result = $this->User->beforeSave();
		$expected = true;
		$this->assertEquals($expected, $result);
	}
	
	public function test_model_user_beforeSave_reponse_secrete()
	{
		$this->User->data[$this->User->alias]['reponse_secrete'] = "test";
		$result = $this->User->beforeSave();
		$expected = true;
		$this->assertEquals($expected, $result);
	}
	
	public function test_fucntion_check()
	{
		$result = $this->User->equaltofield('test','test');
		$expected = false;
		$this->assertEquals($expected, $result);
	}
}