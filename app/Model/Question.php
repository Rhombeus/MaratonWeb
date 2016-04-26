<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author Alejandro
 */
class Question extends AppModel {

    var $name = 'Question';
    var $displayField = 'question_text';
    
    var $belongsTo = array('Category' =>
        array('className' => 'Category',
            'conditions' => '',
            'order' => '',
            'foreignKey' => 'categories_id'
        )
    );
    public $hasMany = array(
        'Answer' => array(
            'className' => 'Answer',
            'conditions' => '',
            'order' => '',
            'foreignKey' => 'questions_id'
        )
    );

}
