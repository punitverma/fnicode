<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $id
 * @property string $frenchie_id
 * @property int $item_id
 * @property int $qty
 * @property \Cake\I18n\FrozenTime $tm
 *
 * @property \App\Model\Entity\Frenchy $frenchy
 * @property \App\Model\Entity\Item $item
 */
class Stock extends Entity
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
        'frenchie_id' => true,
        'item_id' => true,
        'qty' => true,
        'tm' => true,
        'frenchy' => true,
        'item' => true,
    ];
}
