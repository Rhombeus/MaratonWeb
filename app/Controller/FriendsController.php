<?php

App::uses('AppController', 'Controller');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FriendshipsController
 *
 * @author Alejandro
 */
class FriendsController extends AppController {

    var $scaffold;
     public function json($id = null) {
        $this->layout ='json';
        if (!$id) {
            throw new NotFoundException(__('Amigo inválido'));
        }
        $questions = $this->Friend->query("Select users.id,users.username, users.score,users.email from users inner join friends on users.id=friends.user_to  where friends.user_from='" . $id . "'" );
        
        if (!$questions) {
            throw new NotFoundException(__('Amigo inválido'));
        }
        $this->set('questions', $questions);
        $this->set('query',"Select users.id,users.username, users.score,users.email from users inner join friends on users.id=friends.user_to where friends.user_from='" . $id . "'" );
    }


    
   }