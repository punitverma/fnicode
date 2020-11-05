<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property string $trtype
 * @property string $type
 * @property string $receipt
 * @property \Cake\I18n\FrozenDate $date
 * @property string|null $ref
 * @property string $fromid
 * @property string $fromname
 * @property int $fromstate
 * @property string|null $fromgst
 * @property string $toid
 * @property string $toname
 * @property int $tostate
 * @property string|null $togst
 * @property int $qty
 * @property float $igst
 * @property float $cgst
 * @property float $sgst
 * @property float $discount
 * @property float $amount
 * @property int|null $points
 * @property string $payment_mode
 * @property string $payment_reference
 * @property int|null $offer_id
 * @property \Cake\I18n\FrozenTime $dt_tm
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Offer $offer
 * @property \App\Model\Entity\Frenchietranscation[] $frenchietranscations
 * @property \App\Model\Entity\Invoicedetail[] $invoicedetails
 * @property \App\Model\Entity\Transcation[] $transcations
 */
class Invoice extends Entity
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
        'trtype' => true,
        'type' => true,
        'receipt' => true,
        'date' => true,
        'ref' => true,
        'fromid' => true,
        'fromname' => true,
        'fromstate' => true,
        'fromgst' => true,
        'toid' => true,
        'toname' => true,
        'tostate' => true,
        'togst' => true,
        'qty' => true,
        'igst' => true,
        'cgst' => true,
        'sgst' => true,
        'discount' => true,
        'amount' => true,
        'points' => true,
        'payment_mode' => true,
        'payment_reference' => true,
        'offer_id' => true,
        'dt_tm' => true,
        'created' => true,
        'modified' => true,
        'offer' => true,
        'frenchietranscations' => true,
        'invoicedetails' => true,
        'transcations' => true,
    ];
}
