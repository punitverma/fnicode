<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bank Entity
 *
 * @property string|null $BANK
 * @property string|null $IFSC
 * @property string|null $BRANCH
 * @property string|null $ADDRESS
 * @property string|null $CONTACT
 * @property string|null $CITY
 * @property string|null $DISTRICT
 * @property string|null $STATE
 */
class Bank extends Entity
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
        'BANK' => true,
        'IFSC' => true,
        'BRANCH' => true,
        'ADDRESS' => true,
        'CONTACT' => true,
        'CITY' => true,
        'DISTRICT' => true,
        'STATE' => true,
    ];
}
