<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offerfor Entity
 *
 * @property int $id
 * @property int $offer_id
 * @property string $member_id
 * @property \Cake\I18n\FrozenTime|null $usedt
 *
 * @property \App\Model\Entity\Offer $offer
 * @property \App\Model\Entity\Member $member
 */
class Offerfor extends Entity
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
        'offer_id' => true,
        'member_id' => true,
        'usedt' => true,
        'offer' => true,
        'member' => true,
    ];
}
