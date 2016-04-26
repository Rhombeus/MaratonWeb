<?php

App::uses('AppController', 'Controller');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriesController
 *
 * @author Alejandro
 */
class CategoriesController extends AppController {

    var $scaffold;

    public function json($id = null) {
        $this->layout ='json';
        if (!$id) {
            throw new NotFoundException(__('Taller inválido'));
        }
        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Categoria invalida'));
        }
        $this->set('category', $category);
    }

}
