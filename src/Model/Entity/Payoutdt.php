<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payoutdt Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $period_from
 * @property \Cake\I18n\FrozenDate $period_to
 * @property \Cake\I18n\FrozenTime|null $process_on
 * @property int $total_self_bv
 * @property int $match_bv
 * @property float $mbonus
 * @property float $total_rrp_bonus
 * @property int $self_bv
 * @property float $total
 * @property float $tds
 * @property float $surcharge
 * @property float $net_pay
 *
 * @property \App\Model\Entity\Payout[] $payout
 */
class Payoutdt extends Entity
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
        'period_from' => true,
        'period_to' => true,
        'process_on' => true,
        'total_self_bv' => true,
        'match_bv' => true,
        'mbonus' => true,
        'total_rrp_bonus' => true,
        'self_bv' => true,
        'total' => true,
        'tds' => true,
        'surcharge' => true,
        'net_pay' => true,
        'payout' => true,
    ];
}
