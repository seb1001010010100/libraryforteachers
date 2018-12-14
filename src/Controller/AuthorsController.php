<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Authors Controller
 *
 * @property \App\Model\Table\AuthorsTable $Authors
 *
 * @method \App\Model\Entity\Author[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthorsController extends AppController
{

  public function initialize()
      {
          parent::initialize();
          $this->loadComponent('RequestHandler');
      }

      public function all()
      {
          $authors = $this->Authors->find('all');
          $this->set([
              'authors' => $authors,
              '_serialize' => ['authors']
          ]);
      }

      public function view($id)
      {
          $author = $this->Authors->get($id);
          $this->set([
              'author' => $author,
              '_serialize' => ['author']
          ]);
      }

      public function add()
      {
          $author = $this->Authors->newEntity($this->request->getData());
          if ($this->Authors->save($author)) {
              $message = 'Saved';
          } else {
              $message = 'Error';
          }
          $this->set([
              'message' => $message,
              'author' => $author,
              '_serialize' => ['message', 'author']
          ]);
      }

      public function edit($id)
      {
          $author = $this->Authors->get($id);
          if ($this->request->is(['post', 'put','PATCH'])) {
              $author = $this->Authors->patchEntity($author, $this->request->getData());
              if ($this->Authors->save($author)) {
                  $message = 'Saved';
              } else {
                  $message = 'Error';
              }
          }
          $this->set([
              'message' => $message,
              '_serialize' => ['message']
          ]);
      }

      public function delete($id)
      {
          $author = $this->Authors->get($id);
          $message = 'Deleted';
          if (!$this->Authors->delete($author)) {
              $message = 'Error';
          }
          $this->set([
              'message' => $message,
              '_serialize' => ['message']
          ]);
      }
}
