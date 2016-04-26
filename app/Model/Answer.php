<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Answer
 *
 * @author Alejandro
 */
class Answer extends AppModel{
   public $belongsTo = array(
        'Question' => array(
            'className' => 'Question',
            'conditions' => '',
            'order' => '',
            'foreignKey' => 'questions_id'
        )
    );
}
