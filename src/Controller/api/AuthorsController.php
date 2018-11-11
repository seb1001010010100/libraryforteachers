<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class AuthorsController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
/*        'fields' => [
            'id', 'surname', 'first_name'
        ],
*/        'sortWhitelist' => [
            'id', 'surname', 'first_name'
        ]
    ];

}
