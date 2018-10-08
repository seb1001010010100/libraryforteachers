<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BooksCategoriesTable Test Case
 */
class BooksCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksCategoriesTable
     */
    public $BooksCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.books_categories',
        'app.books',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BooksCategories') ? [] : ['className' => BooksCategoriesTable::class];
        $this->BooksCategories = TableRegistry::getTableLocator()->get('BooksCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BooksCategories);

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
