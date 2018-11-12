<?php
namespace App\Test\Fixture;
use Cake\TestSuite\Fixture\TestFixture;
/**
 * BooksFixture
 *
 */
class BooksFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'book_title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'date_of_publication' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'status' => 1,
                'book_title' => 'Lorem ipsum dolor sit amet',
                'date_of_publication' => '2018-10-05',
                'created' => '2018-10-05',
                'modified' => '2018-10-05'
            ],
            [
                'id' => 2,
                'book_title' => 'Harry Potter',
                'status' => 0,
                'date_of_publication' => '2018-10-05',
                'created' => '2018-10-05',
                'modified' => '2018-10-05'
            ],
            [
                'id' => 3,
                'book_title' => 'And Then There Were None',
                'status' => 0,
                'date_of_publication' => '2018-10-05',
                'created' => '2018-10-05',
                'modified' => '2018-10-05'
            ],
            [
                'id' => 4,
                'book_title' => '1984',
                'status' => 0,
                'date_of_publication' => '2018-10-05',
                'created' => '2018-10-05',
                'modified' => '2018-10-05'
            ]
        ];
        parent::init();
    }
}
