<?php
App::uses('Utilisateur', 'Model');

class UtilisateurTestCase extends CakeTestCase
{
	public $fixtures = array('app.utilisateur');
	
	public function setUp()
	{
		parent::setUp();
		$this->Utilisateur = ClassRegistry::init('Utilisateur');
	}
	
	public function testPHPUNIT()
	{
		return true;
	}
}