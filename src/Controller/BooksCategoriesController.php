<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BooksCategories Controller
 *
 * @property \App\Model\Table\BooksCategoriesTable $BooksCategories
 *
 * @method \App\Model\Entity\BooksCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Books', 'Categories']
        ];
        $booksCategories = $this->paginate($this->BooksCategories);

        $this->set(compact('booksCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Books Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booksCategory = $this->BooksCategories->get($id, [
            'contain' => ['Books', 'Categories']
        ]);

        $this->set('booksCategory', $booksCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booksCategory = $this->BooksCategories->newEntity();
        if ($this->request->is('post')) {
            $booksCategory = $this->BooksCategories->patchEntity($booksCategory, $this->request->getData());
            if ($this->BooksCategories->save($booksCategory)) {
                $this->Flash->success(__('The books category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books category could not be saved. Please, try again.'));
        }
        $books = $this->BooksCategories->Books->find('list', ['limit' => 200]);
        $categories = $this->BooksCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('booksCategory', 'books', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Books Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booksCategory = $this->BooksCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booksCategory = $this->BooksCategories->patchEntity($booksCategory, $this->request->getData());
            if ($this->BooksCategories->save($booksCategory)) {
                $this->Flash->success(__('The books category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books category could not be saved. Please, try again.'));
        }
        $books = $this->BooksCategories->Books->find('list', ['limit' => 200]);
        $categories = $this->BooksCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('booksCategory', 'books', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Books Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booksCategory = $this->BooksCategories->get($id);
        if ($this->BooksCategories->delete($booksCategory)) {
            $this->Flash->success(__('The books category has been deleted.'));
        } else {
            $this->Flash->error(__('The books category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
