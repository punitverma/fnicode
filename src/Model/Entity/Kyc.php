<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Kyc Entity
 *
 * @property int $id
 * @property string $member_id
 * @property string $pan
 * @property string $bank
 * @property string $branch
 * @property string $ifsc
 * @property string|null $name
 * @property string $accno
 * @property string|null $approveby
 * @property \Cake\I18n\FrozenTime|null $approveon
 * @property string|null $remarks
 *
 * @property \App\Model\Entity\Member $member
 * @property \App\Model\Entity\Kycdoc[] $kycdocs
 */
class Kyc extends Entity
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
        'member_id' => true,
        'pan' => true,
        'bank' => true,
        'branch' => true,
        'ifsc' => true,
        'name' => true,
        'accno' => true,
        'approveby' => true,
        'approveon' => true,
        'remarks' => true,
        'member' => true,
        'kycdocs' => true,
    ];
}
