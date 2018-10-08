<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loan Entity
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $book_id
 * @property \Cake\I18n\FrozenDate $date_issued
 * @property \Cake\I18n\FrozenDate $date_due_for_return
 * @property \Cake\I18n\FrozenDate $date_returned
 * @property int $amount_of_fine
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Teacher $teacher
 * @property \App\Model\Entity\Book $book
 */
class Loan extends Entity
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
        'teacher_id' => true,
        'book_id' => true,
        'date_issued' => true,
        'date_due_for_return' => true,
        'date_returned' => true,
        'amount_of_fine' => true,
        'created' => true,
        'modified' => true,
        'teacher' => true,
        'book' => true
    ];
}
