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
class AproposController extends AppController
{

  public function initialize()
  {
    parent::initialize();
    $this->Auth->allow(['index']);
  }

  public function index(){


  }

}
