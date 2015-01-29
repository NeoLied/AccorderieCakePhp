<?php

App::uses('User', 'Controller');

class UserControllerTest extends ControllerTestCase 
{
	public $fixtures = array('app.user');
	
	public function testIndex() 
	{
		$result = $this->testAction('/users/index');
		debug($result);
	}
}
