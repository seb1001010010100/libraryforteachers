<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 *
 * @method \App\Model\Entity\Type[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesController extends AppController
{

  public function getByMedium() {
    $medium_id = $this->request->query('medium_id');

    $types = $this->Types->find('all', [
        'conditions' => ['Types.medium_id' => $medium_id],
    ]);
    $this->set('types',$types);
    $this->set('_serialize', ['types']);
}

    public function getTypesSortedByMediums() {
    $mediums = $this->Types->Mediums->find('all', [
        'contain' => ['Types'],
    ]);
    $this->set('mediums',$mediums);
    $this->set('_serialize', ['mediums']);
}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Media']
        ];
        $types = $this->paginate($this->Types);

        $this->set(compact('types'));
        $this->set('_serialize', ['types']);
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => ['Media', 'Books']
        ]);

        $this->set('type', $type);
        $this->set('_serialize', ['types']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $type = $this->Types->newEntity();
        if ($this->request->is('post')) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $media = $this->Types->Media->find('list', ['limit' => 200]);
        $this->set(compact('type', 'media'));
        $this->set('_serialize', ['types']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type could not be saved. Please, try again.'));
        }
        $media = $this->Types->Media->find('list', ['limit' => 200]);
        $this->set(compact('type', 'media'));
        $this->set('_serialize', ['types']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Types->get($id);
        if ($this->Types->delete($type)) {
            $this->Flash->success(__('The type has been deleted.'));
        } else {
            $this->Flash->error(__('The type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getByMedium() {
        $medium_id = $this->request->query('medium_id');

        $types = $this->Types->find('all', [
            'conditions' => ['types.medium_id' => $medium_id],
        ]);
        $this->set('types', $types);
        $this->set('_serialize', ['types']);
    }
}
