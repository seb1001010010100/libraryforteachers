<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AuthorsBook Entity
 *
 * @property int $author_id
 * @property int $book_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\Book $book
 */
class AuthorsBook extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'author_id' => true,
        'book_id' => true,
        'created' => true,
        'modified' => true,
        'author' => true,
        'book' => true
    ];
}
