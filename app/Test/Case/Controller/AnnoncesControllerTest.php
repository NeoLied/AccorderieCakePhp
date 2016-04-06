<?php
App::uses('AnnoncesController', 'Controller');

/**
 * AnnoncesController Test Case
 *
 */
class AnnoncesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */


public function setUp(){
	parent::setUp();



}

	public function tearDown(){
		parent::tearDown();

	}

	/**
	 * testAdd method
	 *
	 * @return void
	 */
	public function testAdd() {
		$annonceTest = array(
			'Annonce' => array(
				'id' => '148',
				'titre' => 'test',
				'description' => 'test',
				'type_id' => '17',
				'date_post' => '2016-03-31',
				'date_limite' => '2016-04-01',
				'temps_requis' => '1',
				'demande' => false,
				'libelle_categorie' => '',
				'signalee' => '0',
				'user_id' => '4',
				'id_accepteur' => '0',
				'annonceValide' => 'oui',
				'statut' => 'Expiré',
				'archive' => false
			),
			'User' => array(
				'password' => '*****',
				'id' => '4',
				'username' => 'zizou',
				'nom' => 'zazou',
				'prenom' => 'zizou',
				'date_naissance' => '2016-03-11',
				'mail' => 'zizou@yopmai.com',
				'adresse' => '',
				'code_postal' => '75000',
				'ville' => 'Paris',
				'telephone' => null,
				'avatar' => 'avatar_user_4.png',
				'identite' => '',
				'presentation' => '',
				'question_secrete' => '0',
				'reponse_secrete' => '1fc3439fcde26c36d387380f497706a85400c36f',
				'credit_temps' => '6',
				'role' => 'admin',
				'offre_de_bienvenue' => 'oui',
				'created' => '2016-03-11 09:19:42',
				'evaluation_id' => '0',
				'bloquer' => false,
				'favoriteType' => '4',
				'lastPost' => true
			),
			'Type' => array(
				'id' => '17',
				'libelle' => 'Jardinage'
			),
			'Evaluation' => array(
				'id' => null,
				'annonce_id' => null,
				'offreur_id' => null,
				'note' => null
			)
		);
		return $this->testAction("/annonces/add",array('data'=>$annonceTest,'method'=>'post'));
	}
	/**
	 * testValiderAnnonce method
	 *
	 * @return void
	 */
	public function testValiderAnnonce() {
		return $this->testAction("/annonces/valider_annonce/139");
	}

	/**
	 * testAnnoncePasValide method
	 *
	 * @return void
	 */
	public function testAnnoncePasValide() {
		return $this->testAction("/annonces/annonce_pas_valide/149");

	}
	/**
	 * testEdit method
	 *
	 * @return void
	 */
	public function testEdit() {
		return $this->testAction("/annonces/edit/140");
	}

	/**
	 * testIndex method
	 *
	 * @return void
	 */
	public function testIndex() {
		return $this->testAction("/annonces/index");
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		return $this->testAction("/annonces/view/139");
	}

	/**
	 * testOffre method
	 *
	 * @return void
	 */
	public function testOffre() {
		return $this->testAction("/annonces/offre");
	}

	/**
	 * testDemande method
	 *
	 * @return void
	 */
	public function testDemande() {
		return $this->testAction("/annonces/demande");
	}

	/**
	 * testMesAnnonces method
	 *
	 * @return void
	 */
	public function testMesAnnonces() {
		return $this->testAction("/annonces/mes_annonces");
	}

/**
 * testSignaler method
 *
 * @return void
 */
	public function testSignaler() {
		return $this->testAction("/annonces/signaler/134");
	}

/**
 * testAnnonceSignalee method
 *
 * @return void
 */
	public function testAnnonceSignalee() {
		return $this->testAction("/annonces/annonceSignalee");
	}
	/**
	 * testSetStatutAnnonce method
	 *
	 * @return void
	 */
	public function testSetStatutAnnonce($annonces=null, $annoncesExpires=null, $annoncesUrgentes=null, $annoncesNormales=null) {
		$annonces =
			array(
			array(
				'Annonce' => array(
					'id' => '148',
					'titre' => 'test',
					'description' => 'test',
					'type_id' => '17',
					'date_post' => '2016-03-31',
					'date_limite' => '2016-04-01',
					'temps_requis' => '1',
					'demande' => false,
					'libelle_categorie' => '',
					'signalee' => '0',
					'user_id' => '4',
					'id_accepteur' => '0',
					'annonceValide' => 'oui',
					'statut' => 'Expiré',
					'archive' => false
				),
				'User' => array(
					'password' => '*****',
					'id' => '4',
					'username' => 'zizou',
					'nom' => 'zazou',
					'prenom' => 'zizou',
					'date_naissance' => '2016-03-11',
					'mail' => 'zizou@yopmai.com',
					'adresse' => '',
					'code_postal' => '75000',
					'ville' => 'Paris',
					'telephone' => null,
					'avatar' => 'avatar_user_4.png',
					'identite' => '',
					'presentation' => '',
					'question_secrete' => '0',
					'reponse_secrete' => '1fc3439fcde26c36d387380f497706a85400c36f',
					'credit_temps' => '6',
					'role' => 'admin',
					'offre_de_bienvenue' => 'oui',
					'created' => '2016-03-11 09:19:42',
					'evaluation_id' => '0',
					'bloquer' => false,
					'favoriteType' => '4',
					'lastPost' => true
				),
				'Type' => array(
					'id' => '17',
					'libelle' => 'Jardinage'
				),
				'Evaluation' => array(
					'id' => null,
					'annonce_id' => null,
					'offreur_id' => null,
					'note' => null
				)
			),
			array(
				'Annonce' => array(
					'id' => '144',
					'titre' => 'Aide pour les cours',
					'description' => "Aidez moi s'il vous plaît !",
			'type_id' => '1',
			'date_post' => '2016-03-16',
			'date_limite' => '2016-03-31',
			'temps_requis' => '1',
			'demande' => false,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '3',
			'id_accepteur' => '0',
			'annonceValide' => 'oui',
			'statut' => 'Expiré',
			'archive' => false
		),
		'User' => array(
			'password' => '*****',
			'id' => '3',
			'username' => 'Georges',
			'nom' => 'Martin',
			'prenom' => 'Georges',
			'date_naissance' => '1986-03-11',
			'mail' => 'georges.martin@yopmail.com',
			'adresse' => '31 avenue de la liberté',
			'code_postal' => '35000',
			'ville' => 'Toulouse',
			'telephone' => '0607080901',
			'avatar' => 'avatar_default.png',
			'identite' => '',
			'presentation' => "Un visiteur, venu d'ailleurs. Ohhhhhhhhh",
			'question_secrete' => '3',
			'reponse_secrete' => 'e61d028edefc476d35388ea6543c1c62ad33af8f',
			'credit_temps' => '0',
			'role' => '',
			'offre_de_bienvenue' => 'oui',
			'created' => '2016-03-11 08:55:38',
			'evaluation_id' => '0',
			'bloquer' => false,
			'favoriteType' => '4',
			'lastPost' => true
		),
		'Type' => array(
			'id' => '1',
			'libelle' => 'Soutien Scolaire'
		),
		'Evaluation' => array(
			'id' => null,
			'annonce_id' => null,
			'offreur_id' => null,
			'note' => null
		)
	),
		 array(
			'Annonce' => array(
				'id' => '146',
				'titre' => "J'ai besoin d'aide !",
			'description' => "Je suis nulle en maths et j'aurais besoin d'aide s'il vous plaît ! Je suis niveau Terminale S.
		Merci !",
			'type_id' => '1',
			'date_post' => '2016-03-16',
			'date_limite' => '2016-03-27',
			'temps_requis' => '2',
			'demande' => false,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '5',
			'id_accepteur' => '0',
			'annonceValide' => 'oui',
			'statut' => 'Expiré',
			'archive' => false
		),
		'User' => array(
			'password' => '*****',
			'id' => '5',
			'username' => 'Marilyn',
			'nom' => 'Monroe',
			'prenom' => 'Marilyn',
			'date_naissance' => '1973-03-11',
			'mail' => 'marilyn.monroe@azeazeazemail.com',
			'adresse' => '29 rue des oliviers',
			'code_postal' => '31000',
			'ville' => 'Toulouse',
			'telephone' => '0102050607',
			'avatar' => 'avatar_default.png',
			'identite' => '',
			'presentation' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
			'question_secrete' => '1',
			'reponse_secrete' => '5b2b86db260d26caedc2566044beb60c8374b357',
			'credit_temps' => '-2',
			'role' => '',
			'offre_de_bienvenue' => 'oui',
			'created' => '2016-03-11 10:59:04',
			'evaluation_id' => '0',
			'bloquer' => false,
			'favoriteType' => '10',
			'lastPost' => true
		),
		'Type' => array(
			'id' => '1',
			'libelle' => 'Soutien Scolaire'
		),
		'Evaluation' => array(
			'id' => null,
			'annonce_id' => null,
			'offreur_id' => null,
			'note' => null
		)
	)
);
		$annoncesExpires=$annonces;
	//$this->testAction("/annonces/setStatutAnnonce",array('data'=>$annonces));
		for ($i = 0; $i < sizeof($annonces); $i++) {

			if (CakeTime::isPast($annonces[$i]['Annonce']['date_limite'])) {
				$annonces[$i]['Annonce']['statut'] = "Expiré";
				$annoncesExpires[$i] = $annonces[$i];
			} else if ($this->isUrgente($annonces[$i])) {
				$annonces[$i]['Annonce']['statut'] = "Urgent";
				$annoncesUrgentes[$i] = $annonces[$i];
			} else {
				$annonces[$i]['Annonce']['statut'] = "   ";
				$annoncesNormales[$i] = $annonces[$i];
			}
		}

		$this->assertEquals($annonces,$annoncesExpires);
		$this->assertEquals(null,$annoncesUrgentes);
		$this->assertEquals(null,$annoncesNormales);

	}

/**
 * testReservation method
 *
 * @return void
 */
	public function testReservation($id_annonce=146,$id_personneReservante=2,$id_personneProprio=4) {
		$this->testAction("/annonces/reservation/$id_annonce/$id_personneReservante/$id_personneProprio");
	}

	/**
	 * testCloturerAnnonce method
	 *
	 * @return void
	 */
	public function testCloturerAnnonce() {
		$annonceTest = array(
			'Annonce' => array(
				'id' => '148',
				'titre' => 'test',
				'description' => 'test',
				'type_id' => '17',
				'date_post' => '2016-03-31',
				'date_limite' => '2016-04-01',
				'temps_requis' => '1',
				'demande' => false,
				'libelle_categorie' => '',
				'signalee' => '0',
				'user_id' => '4',
				'id_accepteur' => '0',
				'annonceValide' => 'oui',
				'statut' => 'Expiré',
				'archive' => false
			),
			'User' => array(
				'password' => '*****',
				'id' => '4',
				'username' => 'zizou',
				'nom' => 'zazou',
				'prenom' => 'zizou',
				'date_naissance' => '2016-03-11',
				'mail' => 'zizou@yopmai.com',
				'adresse' => '',
				'code_postal' => '75000',
				'ville' => 'Paris',
				'telephone' => null,
				'avatar' => 'avatar_user_4.png',
				'identite' => '',
				'presentation' => '',
				'question_secrete' => '0',
				'reponse_secrete' => '1fc3439fcde26c36d387380f497706a85400c36f',
				'credit_temps' => '6',
				'role' => 'admin',
				'offre_de_bienvenue' => 'oui',
				'created' => '2016-03-11 09:19:42',
				'evaluation_id' => '0',
				'bloquer' => false,
				'favoriteType' => '4',
				'lastPost' => true
			),
			'Type' => array(
				'id' => '17',
				'libelle' => 'Jardinage'
			),
			'Evaluation' => array(
				'id' => null,
				'annonce_id' => null,
				'offreur_id' => null,
				'note' => null
			)
		);
		$this->testAction("/annonces/cloturer_annonce",array('data' => $annonceTest,'method' =>'post'));
	}

	/**
	 * testValiderService method
	 *
	 * @return void
	 */
	public function testValiderService($id=139) {
		$this->testAction("/annonces/valider_service/$id");
	}
	/**
	 * testDesisterAnnonce method
	 *
	 * @return void
	 */
	public function testDesisterAnnonce($id=139) {
		$result = $this->testAction("/annonces/desisterAnnonce/$id");

	}

	/**
	 * testRefuserOffre method
	 *
	 * @return void
	 */
	public function testRefuserOffre($id=139) {
		$this->testAction("/annonces/desisterAnnonce/$id");
	}


/**
 * testMonHistorique method
 *
 * @return void
 */
	public function testMonHistorique() {
		$this->testAction("/annonces/mon_historique");
	}

/**
 * testIsUrgente method
 *
 * @return void
 */
	public function testIsUrgente() {
		$annonce = array(
			'Annonce' => array(
				'id' => '148',
				'titre' => 'test',
				'description' => 'test',
				'type_id' => '17',
				'date_post' => '2016-03-31',
				'date_limite' => '2016-04-01',
				'temps_requis' => '1',
				'demande' => false,
				'libelle_categorie' => '',
				'signalee' => '0',
				'user_id' => '4',
				'id_accepteur' => '0',
				'annonceValide' => 'oui',
				'statut' => 'Expiré',
				'archive' => false
			),
			'User' => array(
				'password' => '*****',
				'id' => '4',
				'username' => 'zizou',
				'nom' => 'zazou',
				'prenom' => 'zizou',
				'date_naissance' => '2016-03-11',
				'mail' => 'zizou@yopmai.com',
				'adresse' => '',
				'code_postal' => '75000',
				'ville' => 'Paris',
				'telephone' => null,
				'avatar' => 'avatar_user_4.png',
				'identite' => '',
				'presentation' => '',
				'question_secrete' => '0',
				'reponse_secrete' => '1fc3439fcde26c36d387380f497706a85400c36f',
				'credit_temps' => '6',
				'role' => 'admin',
				'offre_de_bienvenue' => 'oui',
				'created' => '2016-03-11 09:19:42',
				'evaluation_id' => '0',
				'bloquer' => false,
				'favoriteType' => '4',
				'lastPost' => true
			),
			'Type' => array(
				'id' => '17',
				'libelle' => 'Jardinage'
			),
			'Evaluation' => array(
				'id' => null,
				'annonce_id' => null,
				'offreur_id' => null,
				'note' => null
			)
		);
		return (date_diff(new DateTime($annonce['Annonce']['date_limite']), new DateTime('now'))->format("%a") < 4 )? true : false;
	}

	/**
	 * testManage method
	 *
	 * @return void
	 */
	public function testManage() {
		$this->testAction("/annonces/manage");
	}

	/**
	 * testDelete method
	 *
	 * @return void
	 */
	public function testDelete($id=148) {
$this->testAction("/annonces/delete/$id");
	}

}
