<?php

class AnnonceFixture extends CakeTestFixture
{
	public $useDbConfig = 'test';
   // public $import ='Annonce';

	public $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary'),
			'type_id' => array('type' => 'integer', 'key' => 'index'),
			'titre' => array('type' => 'string', 'length' => '50'),
			'description' => array('type' => 'string', 'length' => '1000'),
			'date_post' => array('type' => 'date'),
			'date_limite' => array('type' => 'date'),
			'temps_requis' => array('type' => 'integer', 'length' => '100'),
			'demande' => array('type' => 'integer'),
			'signalee' => array('type' => 'integer','length' => '4'),
			'user_id' => array('type' => 'integer','key' => 'index'),
			'id_accepteur' => array('type' => 'integer','key' => 'index'),
			'annonceValide' => array('type' => 'string', 'length' => '3'),
			'statut' => array('type' => 'string', 'length' => '25'),
			'archive' => array('type' => 'integer', 'length' => '1'),
	);
	
	public $records = array(
			array(
				'id' => 1,
				'titre' => 'test_annonce',
				'description' => 'test_desc_annonce',
				'date_post' => '22/01/2016',
				'date_limite' => '22/06/2016',
				'temps_requis' => 1,
				'demande' => 0,
				'signalee' => 0,
				'user_id' => 2,
				'id_accepteur' => 3,
				'annonceValide' => 'oui',
				'archive' => '0',
				'type_id' => '5'
			),
			array(
					'id' => 2,
					'titre' => 'test_annonce_2',
					'description' => 'test_desc_annonce',
					'date_post' => '22/01/2015',
					'date_limite' => '22/06/2016',
					'temps_requis' => 2,
					'demande' => 0,
					'signalee' => 0,
					'user_id' => 29,
					'id_accepteur' => 0,
					'annonceValide' => 'non',
					'archive' => '0',
					'type_id' => '3'
			),
	);
}