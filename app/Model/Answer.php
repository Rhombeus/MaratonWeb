<?php
App::uses('AppModel', 'Model');
/**
 * Answer Model
 *
 * @property Questions $Questions
 */
class Answer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'answer_text';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'questions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
