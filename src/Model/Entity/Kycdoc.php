<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Kycdoc Entity
 *
 * @property int $id
 * @property int $kyc_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $display
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $name
 * @property string $path
 *
 * @property \App\Model\Entity\Kyc $kyc
 */
class Kycdoc extends Entity
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
        'kyc_id' => true,
        'created' => true,
        'display' => true,
        'modified' => true,
        'name' => true,
        'path' => true,
        'kyc' => true,
    ];
}
