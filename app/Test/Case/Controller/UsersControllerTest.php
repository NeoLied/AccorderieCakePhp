<?php

App::uses('AppController', 'Controller');

class UserControllerTest extends ControllerTestCase 
{
	public $fixtures = array('app.user','app.annonce');
	
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
	
	public function test_users_edit()
	{
		$result = $this->testAction('/users/edit/1');
		debug($result);
	}
	
	public function test_users_edit_sans_id()
	{
		try {
			$result = $this->testAction('/users/edit/null');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_users_login()
	{
		$result = $this->testAction('/users/login');
		debug($result);
	}
	
	public function test_users_view()
	{
		$result = $this->testAction('/users/view/1');
		debug($result);
	}
	
	public function test_users_view_sans_id()
	{
		try {
			$result = $this->testAction('/users/view/null');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_users_logout()
	{
		$result = $this->testAction('/users/logout');
		debug($result);
	}
	
	public function test_users_delete()
	{
		$result = $this->testAction('/users/delete/1');
		debug($result);
	}
	
	public function test_users_delete_sans_id()
	{
		try {
			$result = $this->testAction('/users/delete/null');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_users_credit_temps()
	{
		$result = $this->testAction('/users/credit_temps');
		debug($result);
	}
	
	public function test_offre_bienvenue_oui()
	{
		$result = $this->testAction('/users/offre_bienvenue/1');
		debug($result);
	}
	
	public function test_offre_bienvenue_non()
	{
		$result = $this->testAction('/users/offre_bienvenue/2');
		debug($result);
	}
	
	public function test_login() {
		$data = array(
				'User' => array(
						'username' => 'tristan',
						'password' => 'tristan',	
				)
		);
		$result = $this->testAction(
				'/users/login',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
	public function test_is_authorized() {
		$result = $this->testAction('/users/isAuthorized/1');
		debug($result);
	}
}
