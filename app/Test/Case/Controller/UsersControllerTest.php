<?php
App::uses('UsersController', 'Controller');

/**
 * UsersController Test Case
 *
 */

class UsersControllerTest extends ControllerTestCase
{

	protected $userController;
	public function setUp(){
		parent::setUp();
		$userController = new UsersController();
	}
	public function testIndex()
	{
		$result = $this->testAction('/users/index');
		//debug($result);
	}
	/**
	 * testAdd method
	 *
	 * @return void
	 */
	public function testAdd() {
		$user = array(
			'User' => array(
				'id' => '282',
				'username' => 'fredo',
				'password' => '123456',
				'nom' => 'francois',
				'prenom' => 'frederick',
				'date_naissance' => '1966-06-01',
				'mail' => 'info@exmple.org',
				'adresse' => '',
				'code_postal' => '31000',
				'ville' => 'Toulouse',
				'telephone' => '0100000000',
				'avatar' => 'avatar_default.png',
				'identite' => '',
				'presentation' => 'Compte test unitaire',
				'question_secrete' => '0',
				'reponse_secrete' => 'f887019040975579ec12578d5eb586981fc910ef',
				'credit_temps' => '3',
				'role' => 'admin',
				'offre_de_bienvenue' => 'oui',
				'created' => '2016-03-11 15:28:18',
				'evaluation_id' => '0',
				'bloquer' => false,
				'favoriteType' => '2',
				'lastPost' => true
			)
		);
		$result = $this->testAction('/users/add',array('data'=>$user,'method'=>'post'));
		//debug($result);
	}
	/**
	 * testUtilisateurPasValide method
	 *
	 * @return void
	 */
	public function testUtilisateurPasValide() {

		$result = $this->testAction('/users/utilisateur_pas_valide');
	}

	/**
	 * testGetOffreBienvenue method
	 *
	 * @return void
	 */
	public function testGetOffreBienvenue($user=null)
	{
		$user = array(
			'User' => array(
				'id' => '282',
				'username' => 'fredo',
				'password' => '123456',
				'nom' => 'francois',
				'prenom' => 'frederick',
				'date_naissance' => '1966-06-01',
				'mail' => 'info@exmple.org',
				'adresse' => '',
				'code_postal' => '31000',
				'ville' => 'Toulouse',
				'telephone' => '0100000000',
				'avatar' => 'avatar_default.png',
				'identite' => '',
				'presentation' => 'Compte test unitaire',
				'question_secrete' => '0',
				'reponse_secrete' => 'f887019040975579ec12578d5eb586981fc910ef',
				'credit_temps' => '3',
				'role' => 'admin',
				'offre_de_bienvenue' => 'oui',
				'created' => '2016-03-11 15:28:18',
				'evaluation_id' => '0',
				'bloquer' => false,
				'favoriteType' => '2',
				'lastPost' => true
			)
		);
		return ($user['User']['offre_de_bienvenue'] == "oui") ? 3 : 0;
	}
	/**
	 * testLogin method
	 *
	 * @return void
	 */
	public function testLogin() {
		$this->testAction('/users/login');	}
	/**
	 * testEdit method
	 *
	 * @return void
	 */
	public function testEdit($id=276) {
			$result = $this->testAction('/users/edit/'.$id);
			//debug($result);

	}
	/**
	 * testView method
	 *
	 * @return void
	 */
	public function testView($id=4) {
		$this->testAction("/users/view/$id");
	}
	/**
	 * testReset method
	 *
	 * @return void
	 */
	public function testReset() {
		$this->testAction("/users/reset");
	}

	/**
	 * testUpdate method
	 *
	 * @return void
	 */
	public function testUpdate($id=276) {
		$this->testAction('/users/update/276');
	}
	/**
	 * testDynamic method
	 *
	 * @return void
	 */
	public function testDynamic($id=276) {
		$this->testAction('/users/dynamic/276');	}

	/**
	 * testPrefs method
	 *
	 * @return void
	 */
	public function testPrefs($id = 276, $params1 = 1, $params2 = 1) {
		$this->testAction('/users/update/276');
	}

	/**
	 * testGetTempsDemande method
	 *
	 * @expectedException PRIVATEACTIONEXCEPTION
	 */
	public function testGetTempsDemande() {
		$this->testAction("/users/getTempsDemande");
	}

	/**
	 * testGetTempsOffre method
	 *
	 * @expectedException PRIVATEACTIONEXCEPTION
	 */
	public function testGetTempsOffre() {
		$this->testAction('/users/getTempsOffre');
	}

	/**
	 * testGetCredit method
	 *
	 * @return void
	 */
	public function testGetCredit($id=276,$retour=false) {
		$this->testAction("/users/getCredit/$id");
	}

	/**
	 * testOffreBienvenue method
	 *
	 * @return void
	 */
	public function testOffreBienvenue($id=276) {
		$this->testAction("/users/offre_bienvenue/$id");
	}

	/**
 * testBloquer method
 *
 * @return void
 */
	public function testBloquer($id=276) {
		$this->testAction("/users/bloquer/$id");
	}

	/**
 * testDebloquer method
 *
 * @return void
 */
	public function testDebloquer($id=276) {
		$this->testAction("/users/bloquer/$id");	}

	/**
	 * testLogout method
	 *
	 * @return void
	 */
	public function testLogout() {
		$this->testAction('/users/logout');
	}
	/**
	 * testDelete method
	 *
	 * @expectedException NOTFOUNDEXCEPTION
	 */
	public function testDelete($id=null) {
		$this->testAction("/users/delete/$id");
	}
	/**
	 * testSaveAvatar method
	 *
	 * @expectedException PRIVATEACTIONEXCEPTION
	 */
	public function testSaveAvatar() {
		$this->testAction('/users/saveAvatar');
	}

}