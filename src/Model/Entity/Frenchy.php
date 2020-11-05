<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Frenchy Entity
 *
 * @property string $id
 * @property int|null $frenchietype_id
 * @property string|null $sponsor
 * @property string $name
 * @property string $ownername
 * @property string $pan
 * @property string $registered
 * @property string|null $gst
 * @property string $mobile
 * @property string|null $email
 * @property string $address
 * @property int $state_id
 * @property int $district_id
 * @property string $pincode
 * @property float $cr_amount
 * @property float $dr_amount
 * @property string|null $bank
 * @property string|null $branch
 * @property string|null $ifsc
 * @property string|null $accountno
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Frenchietype $frenchietype
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\District $district
 */
class Frenchy extends Entity
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
        'frenchietype_id' => true,
        'sponsor' => true,
        'name' => true,
        'ownername' => true,
        'pan' => true,
        'registered' => true,
        'gst' => true,
        'mobile' => true,
        'email' => true,
        'address' => true,
        'state_id' => true,
        'district_id' => true,
        'pincode' => true,
        'cr_amount' => true,
        'dr_amount' => true,
        'bank' => true,
        'branch' => true,
        'ifsc' => true,
        'accountno' => true,
        'created' => true,
        'modified' => true,
        'frenchietype' => true,
        'state' => true,
        'district' => true,
    ];
}
