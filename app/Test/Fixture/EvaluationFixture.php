<?php
/**
 * EvaluationFixture
 *
 */
class EvaluationFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('connection' => 'test');

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'annonce_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
		'offreur_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'note' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'annonce_id' => array('column' => 'annonce_id', 'unique' => 1),
			'user_id' => array('column' => 'annonce_id', 'unique' => 0),
			'offreur_id' => array('column' => 'offreur_id', 'unique' => 0),
			'annonce_id_2' => array('column' => 'annonce_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '9',
			'annonce_id' => '106',
			'offreur_id' => '136',
			'note' => '7'
		),
		array(
			'id' => '10',
			'annonce_id' => '110',
			'offreur_id' => '137',
			'note' => '9'
		),
		array(
			'id' => '11',
			'annonce_id' => '111',
			'offreur_id' => '137',
			'note' => '8'
		),
		array(
			'id' => '12',
			'annonce_id' => '119',
			'offreur_id' => '136',
			'note' => '8'
		),
		array(
			'id' => '13',
			'annonce_id' => '115',
			'offreur_id' => '138',
			'note' => '9'
		),
		array(
			'id' => '14',
			'annonce_id' => '131',
			'offreur_id' => '136',
			'note' => '10'
		),
		array(
			'id' => '15',
			'annonce_id' => '132',
			'offreur_id' => '3',
			'note' => '8'
		),
		array(
			'id' => '16',
			'annonce_id' => '133',
			'offreur_id' => '3',
			'note' => '10'
		),
		array(
			'id' => '17',
			'annonce_id' => '135',
			'offreur_id' => '3',
			'note' => '6'
		),
		array(
			'id' => '18',
			'annonce_id' => '137',
			'offreur_id' => '3',
			'note' => '10'
		),
	);

}
