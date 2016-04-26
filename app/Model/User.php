<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Alejandro
 */
class User extends AppModel {

    var $hasMany = array(
        'FriendFrom' => array(
            'className' => 'Friend',
            'foreignKey' => 'user_from'
        ),
        'FriendTo' => array(
            'className' => 'Friend',
            'foreignKey' => 'user_to'
        ),
        'GameFrom' => array(
            'className' => 'Game',
            'foreignKey' => 'player1'
        ),
        'GameTo' => array(
            'className' => 'Game',
            'foreignKey' => 'player1'
        )
    );
    var $hasAndBelongsToMany = array(
        'UserFriendship' => array(
            'className' => 'User',
            'joinTable' => 'friends',
            'foreignKey' => 'user_from',
            'associationForeignKey' => 'user_to'
        ),
        'UserGame' => array(
            'className' => 'User',
            'joinTable' => 'games',
            'foreignKey' => 'player1',
            'associationForeignKey' => 'player2'
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
            );
        }
        return true;
    }

}
