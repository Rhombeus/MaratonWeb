<?php
App::uses('AppModel', 'Model');
/**
 * Game Model
 *
 * @property User $player1
 * @property User $player2
 */
class Game extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'player1' => array(
			'className' => 'User',
			'foreignKey' => 'player1',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'player2' => array(
			'className' => 'User',
			'foreignKey' => 'player2',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
