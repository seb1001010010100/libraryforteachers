<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mediums Controller
 *
 * @property \App\Model\Table\MediumsTable $Mediums
 *
 * @method \App\Model\Entity\Medium[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MediumsController extends AppController
{


    public function getMediums() {
        $this->autoRender = false; // avoid to render view

        $mediums = $this->Mediums->find('all', [
            'contain' => ['Types'],
        ]);

        $mediumsJ = json_encode($mediums);
        $this->response->type('json');
        $this->response->body($mediumsJ);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mediums = $this->paginate($this->Mediums);

        $this->set(compact('mediums'));
        $this->set('_serialize', ['mediums']);
    }

    /**
     * View method
     *
     * @param string|null $id Medium id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medium = $this->Mediums->get($id, [
            'contain' => ['Books', 'Types']
        ]);

        $this->set('medium', $medium);
        $this->set('_serialize', ['mediums']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medium = $this->Mediums->newEntity();
        if ($this->request->is('post')) {
            $medium = $this->Mediums->patchEntity($medium, $this->request->getData());
            if ($this->Mediums->save($medium)) {
                $this->Flash->success(__('The medium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medium could not be saved. Please, try again.'));
        }
        $this->set(compact('medium'));
        $this->set('_serialize', ['mediums']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medium id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medium = $this->Mediums->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medium = $this->Mediums->patchEntity($medium, $this->request->getData());
            if ($this->Mediums->save($medium)) {
                $this->Flash->success(__('The medium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medium could not be saved. Please, try again.'));
        }
        $this->set(compact('medium'));
        $this->set('_serialize', ['mediums']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Medium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medium = $this->Mediums->get($id);
        if ($this->Mediums->delete($medium)) {
            $this->Flash->success(__('The medium has been deleted.'));
        } else {
            $this->Flash->error(__('The medium could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
