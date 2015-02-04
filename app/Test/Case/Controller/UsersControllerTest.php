<?php

App::uses('AppController', 'Controller');

class UserControllerTest extends ControllerTestCase 
{
	public $fixtures = array('app.user');
	
	public function test_users_index() 
	{
		$result = $this->testAction('/users/index');
		debug($result);
	}
	
	public function test_users_add()
	{
		$result = $this->testAction('/users/add');
		debug($result);
	}
	
	public function test_users_demande()
	{
		$result = $this->testAction('/users/demande');
		debug($result);
	}
	
	public function test_users_edit()
	{
		$result = $this->testAction('/users/edit/1');
		debug($result);
	}
	
	public function test_users_offre()
	{
		$result = $this->testAction('/users/offre');
		debug($result);
	}
}
