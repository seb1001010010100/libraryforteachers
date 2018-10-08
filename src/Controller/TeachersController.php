<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Teachers Controller
 *
 * @property \App\Model\Table\TeachersTable $Teachers
 *
 * @method \App\Model\Entity\Teacher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeachersController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        // Ajoute l'action 'add' à la liste des actions autorisées.
        $this->Auth->allow(['logout', 'add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $teachers = $this->paginate($this->Teachers);

        $this->set(compact('teachers'));
    }

    /**
     * View method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => ['Users', 'Loans']
        ]);
        $this->set('books', TableRegistry::get('Books')->find('all'));
        $this->set('teacher', $teacher);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teacher = $this->Teachers->newEntity();
        //create the empty user entity
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->newEntity();
        if ($this->request->is('post')) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
            //set the data for the user
            $user->set('username', $this->request->getData('username'));
            $user->set('email', $this->request->getData('email'));
            $user->set('password', $this->request->getData('password'));
            //save the user
            if($usersTable->save($user)){
              //find the user id and insert in teacher
              $queryCreatedUser = $usersTable->findByEmail($this->request->getData('email'));
              $user = $queryCreatedUser->first();
              $teacher->set('user_id', $user->id);
              if ($this->Teachers->save($teacher)) {

                  $email = new Email('default');
                  $confirmation_code = Text::uuid();
                  $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/" . $confirmation_code;
                  $email->to($this->request->getData('email'))->subject('Email de confirmation')->send('Veuillez verifier votre compte a l\'addresse suivante : ' . $confirmation_link );
                  $user->confirmation_code = $confirmation_code;
                  if($usersTable->save($user)){

                    $this->Auth->setUser($user);
                    $this->Flash->success(__('The teacher has been registered. An email was sent in order to activate it.'));
                    return $this->redirect(['controller' => 'books', 'action' => 'index']);

                  }


              }
              $this->Flash->error(__('The teacher could not be saved. Please, try again.'));

            }

        }
        $users = $this->Teachers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teacher', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
        }
        $users = $this->Teachers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teacher', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teacher = $this->Teachers->get($id);
        if ($this->Teachers->delete($teacher)) {
            $this->Flash->success(__('The teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The teacher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {

      $action = $this->request->getParam('action');
      switch($user['type']){

        case 'teacher':
          if(in_array($action, ['view'])){
            $slug = $this->request->getParam('pass.0');
            if (!$slug) {
                return false;
            }
            $teacher = $this->Teachers->findById($slug)->first();
            if($teacher != null){

              return $user['id'] == $teacher->user_id;

            }
            if(in_array($action, ['add'])){

              return false;

            }
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
