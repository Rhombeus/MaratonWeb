<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Friendship
 *
 * @author Alejandro
 */
class Friend extends AppModel {
    var $name = 'Friend';
    var $displayField = 'id';

      var $belongsTo = array(
      'UserFrom'=>array(
      'className'=>'User',
      'foreignKey'=>'user_from'
      ),
      'UserTo'=>array(
      'className'=>'User',
      'foreignKey'=>'user_to'
      )
      ); 
}
