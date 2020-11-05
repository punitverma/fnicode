<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int $state_id
 * @property int $district_id
 * @property string $address
 * @property string $pincode
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Frenchy[] $frenchies
 * @property \App\Model\Entity\Member[] $members
 */
class Address extends Entity
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
        'state_id' => true,
        'district_id' => true,
        'address' => true,
        'pincode' => true,
        'state' => true,
        'district' => true,
        'companies' => true,
        'frenchies' => true,
        'members' => true,
    ];
}
