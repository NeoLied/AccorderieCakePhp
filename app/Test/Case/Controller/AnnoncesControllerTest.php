<?php

App::uses('AppController', 'Controller');

class UserControllerTest extends ControllerTestCase 
{
	public $fixtures = array('app.annonce');
	
	public function test_annonces_add()
	{
		$result = $this->testAction('/annonces/add');
		debug($result);
	}
	
	public function test_annonces_annonce_signalee()
	{
		$result = $this->testAction('/annonces/add');
		debug($result);
	}
	
	public function test_annonces_demande()
	{
		$result = $this->testAction('/annonces/demande');
		debug($result);
	}
	
	public function test_annonces_edit()
	{
		$result = $this->testAction('/annonces/edit/1');
		debug($result);
	}
	
	public function test_annonces_edit_sans_id()
	{
		try {
			$result = $this->testAction('/annonces/edit/2');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}	
	}
	
	public function test_annonces_index() 
	{
		$result = $this->testAction('/annonces/index');
		debug($result);
	}
	
	public function test_annonces_offre()
	{
		$result = $this->testAction('/annonces/offre');
		debug($result);
	}
	
	public function test_annonces_validation()
	{
		$result = $this->testAction('/annonces/validation');
		debug($result);
	}
	
	public function test_annonces_view()
	{
		$result = $this->testAction('/annonces/view/1');
		debug($result);
	}
	
	public function test_annonces_view_sans_id()
	{
		try {
			$result = $this->testAction('/annonces/view/2');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
	
	public function test_annonces_view_null()
	{
		try {
			$result = $this->testAction('/annonces/view/null');
			debug($result);
		}
		catch (NOTFOUNDEXCEPTION $e)
		{
			assert(true);
		}
	}
}
