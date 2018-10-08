<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AuthorsBooks Controller
 *
 * @property \App\Model\Table\AuthorsBooksTable $AuthorsBooks
 *
 * @method \App\Model\Entity\AuthorsBook[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthorsBooksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Authors', 'Books']
        ];
        $authorsBooks = $this->paginate($this->AuthorsBooks);

        $this->set(compact('authorsBooks'));
    }

    /**
     * View method
     *
     * @param string|null $id Authors Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $authorsBook = $this->AuthorsBooks->get($id, [
            'contain' => ['Authors', 'Books']
        ]);

        $this->set('authorsBook', $authorsBook);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authorsBook = $this->AuthorsBooks->newEntity();
        if ($this->request->is('post')) {
            $authorsBook = $this->AuthorsBooks->patchEntity($authorsBook, $this->request->getData());
            if ($this->AuthorsBooks->save($authorsBook)) {
                $this->Flash->success(__('The authors book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authors book could not be saved. Please, try again.'));
        }
        $authors = $this->AuthorsBooks->Authors->find('list', ['limit' => 200]);
        $books = $this->AuthorsBooks->Books->find('list', ['limit' => 200]);
        $this->set(compact('authorsBook', 'authors', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Authors Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authorsBook = $this->AuthorsBooks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authorsBook = $this->AuthorsBooks->patchEntity($authorsBook, $this->request->getData());
            if ($this->AuthorsBooks->save($authorsBook)) {
                $this->Flash->success(__('The authors book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authors book could not be saved. Please, try again.'));
        }
        $authors = $this->AuthorsBooks->Authors->find('list', ['limit' => 200]);
        $books = $this->AuthorsBooks->Books->find('list', ['limit' => 200]);
        $this->set(compact('authorsBook', 'authors', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Authors Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authorsBook = $this->AuthorsBooks->get($id);
        if ($this->AuthorsBooks->delete($authorsBook)) {
            $this->Flash->success(__('The authors book has been deleted.'));
        } else {
            $this->Flash->error(__('The authors book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
