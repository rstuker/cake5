<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Oldlogs Controller
 *
 * @property \App\Model\Table\OldlogsTable $Oldlogs
 */
class OldlogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Oldlogs->find()
            ->contain(['Users']);
        $oldlogs = $this->paginate($query);

        $this->set(compact('oldlogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Oldlog id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $oldlog = $this->Oldlogs->get($id, contain: ['Users']);
        $this->set(compact('oldlog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $oldlog = $this->Oldlogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $oldlog = $this->Oldlogs->patchEntity($oldlog, $this->request->getData());
            if ($this->Oldlogs->save($oldlog)) {
                $this->Flash->success(__('The oldlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The oldlog could not be saved. Please, try again.'));
        }
        $users = $this->Oldlogs->Users->find('list', limit: 200)->all();
        $this->set(compact('oldlog', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Oldlog id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $oldlog = $this->Oldlogs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $oldlog = $this->Oldlogs->patchEntity($oldlog, $this->request->getData());
            if ($this->Oldlogs->save($oldlog)) {
                $this->Flash->success(__('The oldlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The oldlog could not be saved. Please, try again.'));
        }
        $users = $this->Oldlogs->Users->find('list', limit: 200)->all();
        $this->set(compact('oldlog', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Oldlog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $oldlog = $this->Oldlogs->get($id);
        if ($this->Oldlogs->delete($oldlog)) {
            $this->Flash->success(__('The oldlog has been deleted.'));
        } else {
            $this->Flash->error(__('The oldlog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
