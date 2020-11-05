<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payout Entity
 *
 * @property int $id
 * @property int $payoutdt_id
 * @property string $member_id
 * @property string $sponsor
 * @property string $kyc
 * @property string $active
 * @property float $total_self_bv
 * @property float $self_bv
 * @property float $total_left_bv
 * @property float $left_bv
 * @property float $total_right_bv
 * @property float $right_bv
 * @property float $balance_left
 * @property float $balance_right
 * @property float $match_bv
 * @property int $mbonus
 * @property float $self_income
 * @property float $amount
 * @property float $sponsor_income
 * @property float $rrp_left
 * @property float $rrp_right
 * @property float $rrp_match
 * @property float $rrp_bonus
 * @property float $total
 * @property float $tds
 * @property float $sur
 * @property float $net_pay
 * @property \Cake\I18n\FrozenTime $process_on
 * @property \Cake\I18n\FrozenDate|null $paid_on
 *
 * @property \App\Model\Entity\Payoutdt $payoutdt
 * @property \App\Model\Entity\Member $member
 */
class Payout extends Entity
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
        'payoutdt_id' => true,
        'member_id' => true,
        'sponsor' => true,
        'kyc' => true,
        'active' => true,
        'total_self_bv' => true,
        'self_bv' => true,
        'total_left_bv' => true,
        'left_bv' => true,
        'total_right_bv' => true,
        'right_bv' => true,
        'balance_left' => true,
        'balance_right' => true,
        'match_bv' => true,
        'mbonus' => true,
        'self_income' => true,
        'amount' => true,
        'sponsor_income' => true,
        'rrp_left' => true,
        'rrp_right' => true,
        'rrp_match' => true,
        'rrp_bonus' => true,
        'total' => true,
        'tds' => true,
        'sur' => true,
        'net_pay' => true,
        'process_on' => true,
        'paid_on' => true,
        'payoutdt' => true,
        'member' => true,
    ];
}
