<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $book_title
 * @property \Cake\I18n\FrozenDate $date_of_publication
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property string $image
 * @property int $status
 * @property int $medium_id
 * @property int $type_id
 * @property string $Tag
 *
 * @property \App\Model\Entity\BooksBookTitleTranslation $book_title_translation
 * @property \App\Model\Entity\I18n[] $_i18n
 * @property \App\Model\Entity\Medium[] $mediums
 * @property \App\Model\Entity\Type[] $types
 * @property \App\Model\Entity\Loan[] $loans
 * @property \App\Model\Entity\Author[] $authors
 * @property \App\Model\Entity\Category[] $categories
 */
class Book extends Entity
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
        'book_title' => true,
        'date_of_publication' => true,
        'created' => true,
        'modified' => true,
        'image' => true,
        'status' => true,
        'medium_id' => true,
        'type_id' => true,
        'Tag' => true,
        'book_title_translation' => true,
        '_i18n' => true,
        'mediums' => true,
        'types' => true,
        'loans' => true,
        'authors' => true,
        'categories' => true
    ];
}
