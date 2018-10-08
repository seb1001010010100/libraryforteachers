<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
      parent::initialize();
      $this->Auth->allow(['logout', 'confirm']);
    }
    public function logout()
    {
      $this->Flash->success('Vous avez été déconnecté.');
      return $this->redirect($this->Auth->logout());
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
      /*
        $user = $this->Users->get($id, [
            'contain' => ['Teachers']
        ]);

        $this->set('user', $user);
      */
      $usersTable = TableRegistry::get('Teachers');
      $user = $usersTable->findByUser_id($id)->first();
      $this->redirect(array("controller" => "teachers", "action" => "view", $user->id));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Your username or password is incorrect.'));
        }
    }

    public function confirm(){

        $user = $this->Users->findByConfirmation_code($this->request->getParam('pass.0'))->first();
        if($user){

          $user->active = true;
          if($this->Users->save($user)){

            if($this->request->session()->read('Auth.User')){

                $this->request->session()->write('Auth.User', $user);

            }
            $this->Flash->success(__('The user has been activated.'));
            return $this->redirect(['controller' => 'books', 'action' => 'index']);
          }

        }
        $this->Flash->error(__('The user could not be activated. Please try again.'));
        return $this->redirect(['controller' => 'books', 'action' => 'index']);



    }

    public function resendConfirm($id = null){

      if($id){

        $user = $this->Users->findById($id)->first();
        $email = new Email('default');
        $confirmation_code = Text::uuid();
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/" . $confirmation_code;
        $email->to($user['email'])->subject('Email de confirmation')->send('Veuillez verifier votre compte a l\'addresse suivante : ' . $confirmation_link );
        $user->confirmation_code = $confirmation_code;
        if($this->Users->save($user)){

          $this->Flash->success(__('The confirmation mail was resent.'));
          return $this->redirect(['controller' => 'books', 'action' => 'index']);

        }

      }
      $this->Flash->error(__('The confirmation mail could not be resent.'));
      return $this->redirect(['controller' => 'books', 'action' => 'index']);

    }

    public function isAuthorized($user)
    {

      $action = $this->request->getParam('action');
      switch($user['type']){

        case 'teacher':
          if(in_array($action, ['view'])){

            return true;
          }
          if(!$user['active']){

            if(in_array($action, ['resendConfirm'])){
              $slug = $this->request->getParam('pass.0');
              if (!$slug) {
                  return false;
              }
              if($user['id'] == $slug){
                return true;
              }
              return false;
            }

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
