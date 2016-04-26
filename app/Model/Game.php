<?php

App::uses('AppModel', 'Model');

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
class Game extends AppModel {

    var $name = 'Game';
    var $displayField = 'id';

      var $belongsTo = array(
      'UserFrom'=>array(
      'className'=>'User',
      'foreignKey'=>'player1'
      ),
      'UserTo'=>array(
      'className'=>'User',
      'foreignKey'=>'player2'
      )
      ); 

}
