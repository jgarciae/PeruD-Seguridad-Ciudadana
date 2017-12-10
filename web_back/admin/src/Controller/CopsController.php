<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cops Controller
 *
 * @property \App\Model\Table\CopsTable $Cops
 */
class CopsController extends AppController
{

    /*public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login', 'logout']);
    }*/

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stations']
        ];
        $cops = $this->paginate($this->Cops);

        $this->set(compact('cops'));
        $this->set('_serialize', ['cops']);
    }

    /**
     * View method
     *
     * @param string|null $id Cop id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cop = $this->Cops->get($id, [
            'contain' => ['Stations']
        ]);

        $this->set('cop', $cop);
        $this->set('_serialize', ['cop']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cop = $this->Cops->newEntity();
        if ($this->request->is('post')) {
            $cop = $this->Cops->patchEntity($cop, $this->request->data);
            if ($this->Cops->save($cop)) {
                $this->Flash->success(__('The cop has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cop could not be saved. Please, try again.'));
        }
        $stations = $this->Cops->Stations->find('list', ['limit' => 200]);
        $this->set(compact('cop', 'stations'));
        $this->set('_serialize', ['cop']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cop id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cop = $this->Cops->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cop = $this->Cops->patchEntity($cop, $this->request->data);
            if ($this->Cops->save($cop)) {
                $this->Flash->success(__('The cop has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cop could not be saved. Please, try again.'));
        }
        $stations = $this->Cops->Stations->find('list', ['limit' => 200]);
        $this->set(compact('cop', 'stations'));
        $this->set('_serialize', ['cop']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cop id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cop = $this->Cops->get($id);
        if ($this->Cops->delete($cop)) {
            $this->Flash->success(__('The cop has been deleted.'));
        } else {
            $this->Flash->error(__('The cop could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Cops', 'action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            /*debug($user);
            exit();*/
            if($user){
                $this->Auth->setUser($user);
                $this->Flash->auth(__('Usuario o Contraseña incorrectas'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            
        }
    }

    public function logout()
    {
        return  $this->redirect($this->Auth->logout());
    }

}
