<?php
/**
 * AnnonceFixture
 *
 */
class AnnonceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'titre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'date_post' => array('type' => 'date', 'null' => false, 'default' => null),
		'date_limite' => array('type' => 'date', 'null' => false, 'default' => null),
		'temps_requis' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 100, 'unsigned' => false),
		'demande' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'libelle_categorie' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'signalee' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'user_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
		'id_accepteur' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 100, 'unsigned' => false, 'key' => 'index'),
		'annonceValide' => array('type' => 'string', 'null' => false, 'default' => 'non', 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'statut' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'archive' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'type_id' => array('column' => 'type_id', 'unique' => 0),
			'id_accepteur' => array('column' => 'id_accepteur', 'unique' => 0),
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '132',
			'titre' => 'Garde d\'enfant',
			'description' => 'Je peux garder vos enfants pour vous laisser la soirée de libre !',
			'type_id' => '15',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-31',
			'temps_requis' => '4',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '3',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 1
		),
		array(
			'id' => '133',
			'titre' => 'Aide au ménage',
			'description' => 'Je peux faire votre ménage',
			'type_id' => '16',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-04-09',
			'temps_requis' => '2',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '3',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 1
		),
		array(
			'id' => '134',
			'titre' => 'Aide pour les cours',
			'description' => 'Je peux vous aider pour vos cours de chimie et physique jusqu\'au niveau terminale',
			'type_id' => '1',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-31',
			'temps_requis' => '2',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '274',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 0
		),
		array(
			'id' => '135',
			'titre' => 'Déménagement',
			'description' => 'Je déménage et j\'ai besoin d\'aide s\'il vous plaît !',
			'type_id' => '12',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-26',
			'temps_requis' => '5',
			'demande' => 0,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '3',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 1
		),
		array(
			'id' => '136',
			'titre' => 'Garde d\'enfant',
			'description' => 'Qui pour garder mon gamin svp ?',
			'type_id' => '15',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-19',
			'temps_requis' => '1',
			'demande' => 0,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '3',
			'id_accepteur' => '7',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 1
		),
		array(
			'id' => '137',
			'titre' => 'Donne cours de yoga',
			'description' => 'Je donne des cours de yoga',
			'type_id' => '14',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-30',
			'temps_requis' => '1',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '3',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 1
		),
		array(
			'id' => '138',
			'titre' => 'Zumba',
			'description' => 'Donne cours Zumba !',
			'type_id' => '13',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-31',
			'temps_requis' => '2',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '3',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 1
		),
		array(
			'id' => '139',
			'titre' => 'Aide pour les cours',
			'description' => 'Aide pour vos cours de primaire',
			'type_id' => '1',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-30',
			'temps_requis' => '2',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '0',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 0
		),
		array(
			'id' => '140',
			'titre' => 'Offre mon aide',
			'description' => 'je vous offre mon aide',
			'type_id' => '1',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-31',
			'temps_requis' => '3',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '0',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 0
		),
		array(
			'id' => '141',
			'titre' => 'Offre',
			'description' => 'J\'offre à nouveau mon aide !',
			'type_id' => '3',
			'date_post' => '2016-03-14',
			'date_limite' => '2016-03-30',
			'temps_requis' => '3',
			'demande' => 1,
			'libelle_categorie' => '',
			'signalee' => '0',
			'user_id' => '2',
			'id_accepteur' => '5',
			'annonceValide' => 'oui',
			'statut' => '',
			'archive' => 0
		),
	);

}
