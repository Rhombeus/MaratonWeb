<?php
/**
 * Game Fixture
 */
class GameFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'player1' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'player2' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'p1Score' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'p2Score' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'ingoranciaScore' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'p1turn' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'player1', 'player2'), 'unique' => 1),
			'fk_Game_users1_idx' => array('column' => 'player1', 'unique' => 0),
			'fk_Game_users2_idx' => array('column' => 'player2', 'unique' => 0)
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
			'id' => 1,
			'player1' => 1,
			'player2' => 1,
			'p1Score' => 1,
			'p2Score' => 1,
			'ingoranciaScore' => 1,
			'p1turn' => 1
		),
	);

}
