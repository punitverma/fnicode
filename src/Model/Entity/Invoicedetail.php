<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoicedetail Entity
 *
 * @property int $id
 * @property int $invoice_id
 * @property string $offer
 * @property int $item_id
 * @property string $itemname
 * @property string $hsn
 * @property float $price
 * @property float $discount
 * @property int $points
 * @property int $qty
 * @property float $amount
 * @property float $cgst_a
 * @property int $cgst_p
 * @property float $igst_a
 * @property int $igst_p
 * @property string $itemcat
 * @property float $sgst_a
 * @property int $sgst_p
 * @property \Cake\I18n\FrozenDate|null $dt_manf
 * @property string|null $batch_no
 * @property \Cake\I18n\FrozenDate|null $dt_exp
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\Item $item
 */
class Invoicedetail extends Entity
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
        'invoice_id' => true,
        'offer' => true,
        'item_id' => true,
        'itemname' => true,
        'hsn' => true,
        'price' => true,
        'discount' => true,
        'points' => true,
        'qty' => true,
        'amount' => true,
        'cgst_a' => true,
        'cgst_p' => true,
        'igst_a' => true,
        'igst_p' => true,
        'itemcat' => true,
        'sgst_a' => true,
        'sgst_p' => true,
        'dt_manf' => true,
        'batch_no' => true,
        'dt_exp' => true,
        'invoice' => true,
        'item' => true,
    ];
}
