<?php
App::uses('AppController', 'Controller');
/**
 * Friends Controller
 *
 * @property Friend $Friend
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FriendsController extends AppController {

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
		$this->Friend->recursive = 0;
		$this->set('friends', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
		$this->set('friend', $this->Friend->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Friend->create();
			if ($this->Friend->save($this->request->data)) {
				$this->Flash->success(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The friend could not be saved. Please, try again.'));
			}
		}
		$userFroms = $this->Friend->UserFrom->find('list');
		$userTos = $this->Friend->UserTo->find('list');
		$this->set(compact('userFroms', 'userTos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Friend->save($this->request->data)) {
				$this->Flash->success(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The friend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
			$this->request->data = $this->Friend->find('first', $options);
		}
		$userFroms = $this->Friend->UserFrom->find('list');
		$userTos = $this->Friend->UserTo->find('list');
		$this->set(compact('userFroms', 'userTos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Friend->id = $id;
		if (!$this->Friend->exists()) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Friend->delete()) {
			$this->Flash->success(__('The friend has been deleted.'));
		} else {
			$this->Flash->error(__('The friend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Friend->recursive = 0;
		$this->set('friends', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
		$this->set('friend', $this->Friend->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Friend->create();
			if ($this->Friend->save($this->request->data)) {
				$this->Flash->success(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The friend could not be saved. Please, try again.'));
			}
		}
		$userFroms = $this->Friend->UserFrom->find('list');
		$userTos = $this->Friend->UserTo->find('list');
		$this->set(compact('userFroms', 'userTos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Friend->save($this->request->data)) {
				$this->Flash->success(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The friend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
			$this->request->data = $this->Friend->find('first', $options);
		}
		$userFroms = $this->Friend->UserFrom->find('list');
		$userTos = $this->Friend->UserTo->find('list');
		$this->set(compact('userFroms', 'userTos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Friend->id = $id;
		if (!$this->Friend->exists()) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Friend->delete()) {
			$this->Flash->success(__('The friend has been deleted.'));
		} else {
			$this->Flash->error(__('The friend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
