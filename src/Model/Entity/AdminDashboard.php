<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admindashboard Entity
 *
 * @property int $id
 * @property int $total_reg
 * @property int $total_reg_active
 * @property int $week_reg
 * @property int $week_reg_act
 * @property int $last_week_bv
 * @property int $week_bv
 * @property int $left_bv
 * @property int $right_bv
 * @property int $total_bv
 * @property int $week_sale_inv
 * @property float $week_sale_inv_amount
 * @property int $total_sale_inv
 * @property float $total_sale_inv_amount
 * @property float $week_match_payout
 * @property float $total_match_payout
 * @property float $week_sponsor_payout
 * @property float $total_sponsor_payout
 * @property float $week_self_payout
 * @property float $total_self_payout
 * @property int $f_sale
 * @property int $f_district
 * @property int $f_city
 * @property int $f_home
 * @property \Cake\I18n\FrozenTime $updateon
 */
class Admindashboard extends Entity
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
        'total_reg' => true,
        'total_reg_active' => true,
        'week_reg' => true,
        'week_reg_act' => true,
        'last_week_bv' => true,
        'week_bv' => true,
        'left_bv' => true,
        'right_bv' => true,
        'total_bv' => true,
        'week_sale_inv' => true,
        'week_sale_inv_amount' => true,
        'total_sale_inv' => true,
        'total_sale_inv_amount' => true,
        'week_match_payout' => true,
        'total_match_payout' => true,
        'week_sponsor_payout' => true,
        'total_sponsor_payout' => true,
        'week_self_payout' => true,
        'total_self_payout' => true,
        'f_sale' => true,
        'f_district' => true,
        'f_city' => true,
        'f_home' => true,
        'updateon' => true,
    ];
}
