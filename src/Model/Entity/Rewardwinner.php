<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rewardwinner Entity
 *
 * @property int $id
 * @property int $reward_id
 * @property int $member_id
 * @property \Cake\I18n\FrozenTime $tm
 *
 * @property \App\Model\Entity\Reward $reward
 * @property \App\Model\Entity\Member $member
 */
class Rewardwinner extends Entity
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
        'reward_id' => true,
        'member_id' => true,
        'tm' => true,
        'reward' => true,
        'member' => true,
    ];
}
