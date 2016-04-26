<?php
App::uses('AppController', 'Controller');
//Controller::
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionsController
 *
 * @author Alejandro
 */
class QuestionsController extends AppController {
    //put your code here
    var $scaffold;
    public function json($id = null) {
        $this->layout ='json';
        if (!$id) {
            throw new NotFoundException(__('Catogoria inválido'));
        }
        $questions = $this->Question->find('all', array(
        'conditions' => array('Question.categories_id' => $id)
    ));
        if (!$questions) {
            throw new NotFoundException(__('Categoria invalida'));
        }
        $this->set('questions', $questions);
    }
    public function validateAnswer($usrid=null,$questionid=null,$answer=null){
        parent::loadModel('User',NULL);
        $this->layout ='json';
        $response=false;
        if (!$usrid) {
            throw new NotFoundException(__('Usuario inválido'));
        }
        if (!$questionid) {
            throw new NotFoundException(__('Pregunta inválida'));
        }
        if (!$answer) {
            throw new NotFoundException(__('Respuesta inválida'));
        }
        $question = $this->Question->findById($questionid);
        if (!$question) {
            throw new NotFoundException(__('Pregunta invalida'));
        }
        if($question['Question']['correct']==$answer){
           
            $usuario=$this->User->findById($usrid);
            if (!$usuario) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        $savedata=  array('User'=>array(
            'id'=>$usrid,
            'score'=>$usuario['User']['score']+1
        ));

          
            $this->User->save($savedata);
            $response=true;
        }
        $this->set('response', $response);
    }
   
}
