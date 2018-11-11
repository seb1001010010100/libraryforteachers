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

  public $paginate = [
      'page' => 1,
      'limit' => 10,
      'maxLimit' => 100,
      'fields' => [
          'id', 'surname', 'first_name'
      ],
      'sortWhitelist' => [
          'id', 'surname', 'first_name'
      ]
  ];
}
