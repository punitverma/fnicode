<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reward Entity
 *
 * @property int $id
 * @property int|null $right_bv
 * @property int|null $left_bv
 * @property int|null $matching_bv
 * @property int|null $reward_point
 * @property string|null $amount
 * @property string|null $rank
 * @property string|null $gift
 *
 * @property \App\Model\Entity\Rewardwinner[] $rewardwinner
 */
class Reward extends Entity
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
        'right_bv' => true,
        'left_bv' => true,
        'matching_bv' => true,
        'reward_point' => true,
        'amount' => true,
        'rank' => true,
        'gift' => true,
        'rewardwinner' => true,
    ];
}
