<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Game $juegos
 * @property Friend $amigos
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
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

}
