<?php

App::uses('AppController', 'Controller');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author Alejandro
 */
class UsersController extends AppController {

    var $scaffold;

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function json() {
        $this->layout ='json';
        $this->set('users', $this->User->find('list', array(
                    'fields' => array('User.username', 'User.email','User.id')
        )));
    }
    public function highscore() {
        $this->layout ='json';
        $this->set('highscores', $this->User->query('Select username, score from users order by score desc limit 100;')
        );
    }

}
