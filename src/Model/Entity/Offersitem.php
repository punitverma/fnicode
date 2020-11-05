<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offersitem Entity
 *
 * @property int $id
 * @property int $offer_id
 * @property int $item_id
 * @property float $sale_price
 * @property float $discount
 *
 * @property \App\Model\Entity\Offer $offer
 * @property \App\Model\Entity\Item $item
 */
class Offersitem extends Entity
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
        'item_id' => true,
        'sale_price' => true,
        'discount' => true,
        'offer' => true,
        'item' => true,
    ];
}
