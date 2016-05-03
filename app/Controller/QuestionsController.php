<?php

App::uses('AppController', 'Controller');

/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class QuestionsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Question->recursive = 0;
        $this->set('questions', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
        $this->set('question', $this->Question->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Question->create();
            if ($this->Question->save($this->request->data)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Question->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Question->save($this->request->data)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
            $this->request->data = $this->Question->find('first', $options);
        }
        $categories = $this->Question->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Question->delete()) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Question->recursive = 0;
        $this->set('questions', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
        $this->set('question', $this->Question->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Question->create();
            if ($this->Question->save($this->request->data)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Question->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Question->save($this->request->data)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
            $this->request->data = $this->Question->find('first', $options);
        }
        $categories = $this->Question->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Question->delete()) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function json($id = null) {
        $this->layout = 'json';
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

    public function validateAnswer($usrid = null, $questionid = null, $answer = null,$gameId=null) {
        parent::loadModel('User', NULL);
        $this->layout = 'json';
        $response = false;
        if (!$usrid || !$questionid ||!$answer || !gameId) {
            throw new NotFoundException(__('Missing Parameters'));
        }else{
            $question = $this->Question->findById($questionid);
            $usuario = $this->User->findById($usrid);
        }
        
        if (!$question) {
            throw new NotFoundException(__('Pregunta invalida'));
        }
        if ($question['Question']['correct'] == $answer) {

            $juego = $this->Game->findById($gameId);
            if (!$usuario) {
                throw new NotFoundException(__('Usuario invalido'));
            }
            $savedata = array('User' => array(
                    'id' => $usrid,
                    'score' => $usuario['User']['score'] + 1
            ));          
            $this->User->save($savedata);
            $response = true;
        }
        $this->set('response', $response);
    }

}
