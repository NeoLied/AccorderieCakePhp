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
	
	public function test_users_reservation()
	{
		$result = $this->testAction('/users/reservation/1');
		debug($result);
	}
}
