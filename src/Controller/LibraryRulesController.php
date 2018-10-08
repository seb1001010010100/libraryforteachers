<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LibraryRules Controller
 *
 * @property \App\Model\Table\LibraryRulesTable $LibraryRules
 *
 * @method \App\Model\Entity\LibraryRule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LibraryRulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $libraryRules = $this->paginate($this->LibraryRules);

        $this->set(compact('libraryRules'));
    }

    /**
     * View method
     *
     * @param string|null $id Library Rule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $libraryRule = $this->LibraryRules->get($id, [
            'contain' => []
        ]);

        $this->set('libraryRule', $libraryRule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $libraryRule = $this->LibraryRules->newEntity();
        if ($this->request->is('post')) {
            $libraryRule = $this->LibraryRules->patchEntity($libraryRule, $this->request->getData());
            if ($this->LibraryRules->save($libraryRule)) {
                $this->Flash->success(__('The library rule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The library rule could not be saved. Please, try again.'));
        }
        $this->set(compact('libraryRule'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Library Rule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $libraryRule = $this->LibraryRules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $libraryRule = $this->LibraryRules->patchEntity($libraryRule, $this->request->getData());
            if ($this->LibraryRules->save($libraryRule)) {
                $this->Flash->success(__('The library rule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The library rule could not be saved. Please, try again.'));
        }
        $this->set(compact('libraryRule'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Library Rule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $libraryRule = $this->LibraryRules->get($id);
        if ($this->LibraryRules->delete($libraryRule)) {
            $this->Flash->success(__('The library rule has been deleted.'));
        } else {
            $this->Flash->error(__('The library rule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
