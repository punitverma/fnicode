<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property string $id
 * @property int $membertype_id
 * @property string $sponsor
 * @property string $parent
 * @property string $placement
 * @property int $count
 * @property string $name
 * @property string $gender
 * @property string $adddetails
 * @property string $mobile
 * @property string|null $email
 * @property string|null $father_name
 * @property \Cake\I18n\FrozenDate|null $dob
 * @property string|null $marital_status
 * @property string|null $professional
 * @property string|null $nominee_name
 * @property int|null $nominee_age
 * @property string|null $nominee_relation
 * @property int $address_id
 * @property string|null $block
 * @property string $kyc
 * @property string $active
 * @property string $left_activate
 * @property string $right_activate
 * @property \Cake\I18n\FrozenTime|null $dt_activate
 * @property string|null $leftid
 * @property string|null $rightid
 * @property float $week_points
 * @property float $total_points
 * @property float $self_week_points
 * @property float $self_total_points
 * @property \Cake\I18n\FrozenTime $cr_tm
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $mod_user
 *
 * @property \App\Model\Entity\Membertype $membertype
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\DistbDashboard[] $distb_dashboard
 * @property \App\Model\Entity\Kyc[] $kycs
 * @property \App\Model\Entity\Ledger[] $ledgers
 * @property \App\Model\Entity\Payout[] $payout
 * @property \App\Model\Entity\PayoutMock[] $payout_mock
 * @property \App\Model\Entity\Rewardwinner[] $rewardwinner
 * @property \App\Model\Entity\Transcation[] $transcations
 */
class Member extends Entity
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
        'membertype_id' => true,
        'sponsor' => true,
        'parent' => true,
        'placement' => true,
        'count' => true,
        'name' => true,
        'gender' => true,
        'adddetails' => true,
        'mobile' => true,
        'email' => true,
        'father_name' => true,
        'dob' => true,
        'marital_status' => true,
        'professional' => true,
        'nominee_name' => true,
        'nominee_age' => true,
        'nominee_relation' => true,
        'address_id' => true,
        'block' => true,
        'kyc' => true,
        'active' => true,
        'left_activate' => true,
        'right_activate' => true,
        'dt_activate' => true,
        'leftid' => true,
        'rightid' => true,
        'week_points' => true,
        'total_points' => true,
        'self_week_points' => true,
        'self_total_points' => true,
        'cr_tm' => true,
        'created' => true,
        'modified' => true,
        'mod_user' => true,
        'membertype' => true,
        'address' => true,
        'distb_dashboard' => true,
        'kycs' => true,
        'ledgers' => true,
        'payout' => true,
        'payout_mock' => true,
        'rewardwinner' => true,
        'transcations' => true,
    ];
}
