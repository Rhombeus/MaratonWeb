<?php
App::uses('AppModel', 'Model');
/**
 * Friend Model
 *
 * @property User $user_from
 * @property User $user_to
 */
class Friend extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_to';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'user_from' => array(
			'className' => 'User',
			'foreignKey' => 'user_from',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'user_to' => array(
			'className' => 'User',
			'foreignKey' => 'user_to',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
