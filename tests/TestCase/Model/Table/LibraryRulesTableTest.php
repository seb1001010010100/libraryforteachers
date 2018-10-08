<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LibraryRulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LibraryRulesTable Test Case
 */
class LibraryRulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LibraryRulesTable
     */
    public $LibraryRules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.library_rules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LibraryRules') ? [] : ['className' => LibraryRulesTable::class];
        $this->LibraryRules = TableRegistry::getTableLocator()->get('LibraryRules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LibraryRules);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
