<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property int $phone_number
 * @property string $email
 * @property string $other_details
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Loan[] $loans
 */
class Teacher extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'address' => true,
        'phone_number' => true,
        'email' => true,
        'other_details' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'user' => true,
        'loans' => true
    ];
}
