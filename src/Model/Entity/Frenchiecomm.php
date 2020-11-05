<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Frenchiecomm Entity
 *
 * @property int $id
 * @property string $fid
 * @property string $invoiceno
 * @property float $amount
 * @property float $percent
 * @property float $commision
 * @property string $frenchie_id
 * @property \Cake\I18n\FrozenTime $tm
 *
 * @property \App\Model\Entity\Frenchy $frenchy
 */
class Frenchiecomm extends Entity
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
        'fid' => true,
        'invoiceno' => true,
        'amount' => true,
        'percent' => true,
        'commision' => true,
        'frenchie_id' => true,
        'tm' => true,
        'frenchy' => true,
    ];
}
