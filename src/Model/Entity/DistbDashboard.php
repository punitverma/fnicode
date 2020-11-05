<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DistbDashboard Entity
 *
 * @property string $member_id
 * @property string|null $left_id
 * @property string|null $right_id
 * @property float $left_bv
 * @property float $right_bv
 * @property int $left_count
 * @property int $right_count
 * @property float $left_total
 * @property float $right_total
 * @property int $reward_rank
 * @property float $payout_week
 * @property float $payout_total
 * @property int $bal_left_bv
 * @property int $bal_right_bv
 * @property \Cake\I18n\FrozenTime $tm
 */
class DistbDashboard extends Entity
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
        'left_id' => true,
        'right_id' => true,
        'left_bv' => true,
        'right_bv' => true,
        'left_count' => true,
        'right_count' => true,
        'left_total' => true,
        'right_total' => true,
        'reward_rank' => true,
        'payout_week' => true,
        'payout_total' => true,
        'bal_left_bv' => true,
        'bal_right_bv' => true,
        'tm' => true,
    ];
}
