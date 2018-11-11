<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MediumsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediumsTable Test Case
 */
class MediumsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MediumsTable
     */
    public $Mediums;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mediums',
        'app.books',
        'app.types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Mediums') ? [] : ['className' => MediumsTable::class];
        $this->Mediums = TableRegistry::getTableLocator()->get('Mediums', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mediums);

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
