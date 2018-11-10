<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{

    public function initialize()
    {
      parent::initialize();
      $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $books = $this->paginate($this->Books);

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Authors', 'Categories', 'Loans']
        ]);

        $this->set('book', $book);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEntity();
        $uploadData = '';
        if ($this->request->is('post')) {
          if(!empty($this->request->data['file']['name'])){
              $fileName = $this->request->data['file']['name'];
              $uploadPath = 'img/';
              $uploadFile = $uploadPath.$fileName;
              if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){

                $book = $this->Books->patchEntity($book, $this->request->getData());
                $book->image = $fileName;
                if ($this->Books->save($book)) {
                    $this->Flash->success(__('The book has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The book could not be saved. Please, try again.'));
              }
              $this->Flash->error(__('The image could not be saved. Please, try again.'));
          }else{

            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                if($book->author_ids){

                  return $this->redirect(['action' => 'add']);

                }
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));

          }

        }
        $authors = $this->Books->Authors->find('list', ['limit' => 200]);
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $this->set(compact('book', 'authors', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uploadData = '';
        $book = $this->Books->get($id, [
            'contain' => ['Authors', 'Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'img/';
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){

                  $book = $this->Books->patchEntity($book, $this->request->getData());
                  $book->image = $fileName;
                  if ($this->Books->save($book)) {
                      $this->Flash->success(__('The book has been saved.'));

                      return $this->redirect(['action' => 'index']);
                  }
                  $this->Flash->error(__('The book could not be saved. Please, try again.'));
                }
                $this->Flash->error(__('The image could not be saved. Please, try again.'));
            }else{

              $book = $this->Books->patchEntity($book, $this->request->getData());
              if ($this->Books->save($book)) {
                  $this->Flash->success(__('The book has been saved.'));

                  return $this->redirect(['action' => 'index']);
              }
              $this->Flash->error(__('The book could not be saved. Please, try again.'));

            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $authors = $this->Books->Authors->find('list', ['limit' => 200]);
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $this->set(compact('book', 'authors', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function rent($id = null){

      $book = $this->Books->get($id, [
          'contain' => ['Authors', 'Categories', 'Loans']
      ]);

      $this->set('book', $book);
      $loansTable = TableRegistry::get('Loans');
      $loan = $loansTable->newEntity();
      if ($this->request->is(['patch', 'post', 'put'])) {
        //find the teacher from the current user
        $teachersTable = TableRegistry::get('Teachers');
        $teacher = $teachersTable->findByUser_id($this->request->session()->read('Auth.User.id'))->first();
        $bookId = $book->id;
        $loan->teacher_id = $teacher->id;
        $loan->book_id = $bookId;
        $loan->date_issued = date("Y-m-d");
        $loan->date_due_for_return = date("Y-m-d", strtotime("+1 month"));
        if ($loansTable->save($loan)) {

            $book->status = false;
            if ($this->Books->save($book)) {

              $this->Flash->success(__('The loan has been saved.'));

              return $this->redirect(['controller' => 'books', 'action' => 'index']);

            }

        }
        $this->Flash->error(__('The loan could not be saved. Please, try again.'));
      }
    }

    public function findTitles() {

      if ($this->request->is('ajax')) {

          $this->autoRender = false;
          $name = $this->request->query['term'];
          $results = $this->Books->find('all', array(
              'conditions' => array('Books.book_title LIKE ' => '%' . $name . '%')
          ));

          $resultArr = array();
          foreach ($results as $result) {
              $resultArr[] = array('label' => $result['book_title'], 'value' => $result['book_title']);
          }
          echo json_encode($resultArr);
      }
    }

    public function isAuthorized($user)
    {

      $action = $this->request->getParam('action');
      switch($user['type']){

        case 'teacher':
          if(in_array($action, ['index', 'view'])){

            return true;
          }
          if(in_array($action, ['rent'])){
            $slug = $this->request->getParam('pass.0');
            if (!$slug) {
                return false;
            }
            if($user['active']){

              $book = $this->Books->findById($slug)->first();
              if($book->status){

                return true;
              }

            }
            $this->Flash->error(__('You must be an active user in order to rent book.'));
            return false;

          }
          return false;
          break;

        case 'admin':
          return true;
          break;

        default:
          return false;
          break;


      }

    }
}
