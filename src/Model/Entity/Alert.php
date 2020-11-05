<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Alert Entity
 *
 * @property int $id
 * @property int $role_id
 * @property string $message
 * @property \Cake\I18n\FrozenTime $periodfrom
 * @property \Cake\I18n\FrozenTime $periodto
 * @property bool $active
 *
 * @property \App\Model\Entity\Role $role
 */
class Alert extends Entity
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
        'role_id' => true,
        'message' => true,
        'periodfrom' => true,
        'periodto' => true,
        'active' => true,
        'role' => true,
    ];
}
