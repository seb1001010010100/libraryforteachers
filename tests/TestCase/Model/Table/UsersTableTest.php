<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.teachers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

  public function testSaving() {
      $data = ['username' => 'test', 'email' => '', 'password' => 'test', 'type' => 'teacher'];
      $email = $this->Users->newEntity($data);
      $resultingError = $this->Users->validator()->errors($data);
      $expectedError = [
        'email' => [
          '_empty' => 'Ce champ ne peu pas être laissé vide'
        ]
      ];
      $this->assertEquals($expectedError, $resultingError);
    }
    public function testAddXss(){

      $data = ['username' => 'asd', 'email' => 'asd@hotmail.com', 'password' => 'test', 'type' => '<script>alert("hi")</script>'];
      $user = $this->Users->newEntity($data);
      $this->Users->save($user);
      $newTotal = $this->Users->find()->count();
      $this->assertEquals(2, $newTotal);

      $result = $this->Users->find()->where(['id' => 2])->first();
      $this->assertEquals('&lt;script&gt;alert(&quot;hi&quot;)&lt;/script&gt;', $result->type);

    }
}
