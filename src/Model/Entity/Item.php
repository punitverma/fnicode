<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property int $itemcat_id
 * @property string $code
 * @property string $name
 * @property string $unit
 * @property string $hsn
 * @property string $description
 * @property float|null $mrp
 * @property float|null $saleprice
 * @property float|null $purchaseprice
 * @property int $points
 * @property int $tax
 * @property float $dp
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Itemcat $itemcat
 * @property \App\Model\Entity\Invoicedetail[] $invoicedetails
 * @property \App\Model\Entity\Stock[] $stocks
 */
class Item extends Entity
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
        'itemcat_id' => true,
        'code' => true,
        'name' => true,
        'unit' => true,
        'hsn' => true,
        'description' => true,
        'mrp' => true,
        'saleprice' => true,
        'purchaseprice' => true,
        'points' => true,
        'tax' => true,
        'dp' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'itemcat' => true,
        'invoicedetails' => true,
        'stocks' => true,
    ];
}
