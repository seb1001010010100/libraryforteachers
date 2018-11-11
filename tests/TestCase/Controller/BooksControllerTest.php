<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\BooksController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BooksController Test Case
 */
class BooksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.books',
        'app.loans',
        'app.authors',
        'app.categories',
        'app.authors_books',
        'app.books_categories'
    ];

    /**
     * Test index method
     *
     * @return void
     */

    public function testIndex()
    {

      $this->get('/Books');

      $this->assertResponseOk();

    }


    /**
     * Test view method
     *
     * @return void
     */
    public function testViewAuthenticated()
    {
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 1,
                'type' => 'admin'
                // autres clés.
            ]
        ]
      ]);
      $this->get('/Books/view/1');

      $this->assertResponseOk();
    }

    public function testViewUnauthenticated(){

        $this->get('/Books/view/1');
        $this->assertRedirect('/login?redirect=%2FBooks%2Fview%2F1');

    }


    /**
     * Test add method
     *
     * @return void
     */
    public function testAddAuthenticated()
    {
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 1,
                'type' => 'admin'
                // autres clés.
            ]
        ]
      ]);
      $this->get('/Books/add');

      $this->assertResponseOk();
    }

    public function testAddUnauthenticated(){

        $this->get('/Books/add');
        $this->assertRedirect('/login?redirect=%2FBooks%2Fadd');

    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditAuthenticated()
    {
      $this->session([
        'Auth' => [
            'User' => [
                'id' => 1,
                'type' => 'admin'
                // autres clés.
            ]
        ]
      ]);
      $this->get('/Books/edit/1');

      $this->assertResponseOk();
    }

    public function testEditUnauthenticated()
    {

      $this->get('/Books/edit/1');
      $this->assertRedirect('/login?redirect=%2FBooks%2Fedit%2F1');

    }

    /**
     * Test delete method
     *
     * @return void
     */


    public function testDeleteUnauthenticated()
    {

      $this->get('/Books/delete/1');
      $this->assertRedirect('/login?redirect=%2FBooks%2Fdelete%2F1');

    }


}
