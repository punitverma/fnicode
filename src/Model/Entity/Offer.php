<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offer Entity
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int|null $if_item_id
 * @property int|null $if_item_qty
 * @property int|null $invoice_value
 * @property int $item_id
 * @property int $qty
 * @property int $discount
 * @property int $points
 * @property bool $active
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Offerfor[] $offerfors
 * @property \App\Model\Entity\Offersitem[] $offersitems
 */
class Offer extends Entity
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
        'name' => true,
        'type' => true,
        'if_item_id' => true,
        'if_item_qty' => true,
        'invoice_value' => true,
        'item_id' => true,
        'qty' => true,
        'discount' => true,
        'points' => true,
        'active' => true,
        'item' => true,
        'invoices' => true,
        'offerfors' => true,
        'offersitems' => true,
    ];
}
