<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthorsBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthorsBooksTable Test Case
 */
class AuthorsBooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthorsBooksTable
     */
    public $AuthorsBooks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.authors_books',
        'app.authors',
        'app.books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AuthorsBooks') ? [] : ['className' => AuthorsBooksTable::class];
        $this->AuthorsBooks = TableRegistry::getTableLocator()->get('AuthorsBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthorsBooks);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
