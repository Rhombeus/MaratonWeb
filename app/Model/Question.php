<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Categories $Categories
 * @property Answer $respuestas
 */
class Question extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'question_text';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'categories_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'respuestas' => array(
			'className' => 'Answer',
			'foreignKey' => 'questions_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
