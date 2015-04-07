<?php

class AnnonceFixture extends CakeTestFixture
{
	public $useDbConfig = 'test';
	
	public $fields = array(
			'id' => array('type' => 'integer', 'key' => 'primary'),
			'titre' => array('type' => 'string', 'length' => '50'),
			'description' => array('type' => 'string', 'length' => '1000'),
			'date_post' => array('type' => 'date'),
			'temps_requis' => array('type' => 'integer'),
			'demande' => array('type' => 'integer'),
			'signalee' => array('type' => 'integer'),
			'user_id' => array('type' => 'integer'),
			'id_accepteur' => array('type' => 'integer'),
			'annonceValide' => array('type' => 'string', 'length' => '3'),
	);
	
	public $records = array(
			array(
				'id' => 1,
				'titre' => 'test_annonce',
				'description' => 'test_desc_annonce',
				'date_post' => '22/01/2015',
				'temps_requis' => 1,
				'demande' => 1,
				'signalee' => 0,
				'user_id' => 2,
				'id_accepteur' => 3,
				'annonceValide' => 'oui',
			),
			array(
					'id' => 2,
					'titre' => 'test_annonce_2',
					'description' => 'test_desc_annonce',
					'date_post' => '22/01/2015',
					'temps_requis' => 2,
					'demande' => 1,
					'signalee' => 0,
					'user_id' => 1,
					'id_accepteur' => 0,
					'annonceValide' => 'non',
			),
	);
}