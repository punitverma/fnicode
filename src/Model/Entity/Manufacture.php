<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manufacture Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $state_id
 * @property string $contact
 * @property string $active
 *
 * @property \App\Model\Entity\State $state
 */
class Manufacture extends Entity
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
        'name' => true,
        'address' => true,
        'state_id' => true,
        'contact' => true,
        'active' => true,
        'state' => true,
    ];
}
