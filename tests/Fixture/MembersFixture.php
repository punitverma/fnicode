<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembersFixture
 */
class MembersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'membertype_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sponsor' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'parent' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'placement' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'count' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'gender' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'adddetails' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'mobile' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'email' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'father_name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'dob' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'marital_status' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'professional' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'nominee_name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'nominee_age' => ['type' => 'smallinteger', 'length' => 6, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'nominee_relation' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'address_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'block' => ['type' => 'string', 'length' => 1, 'null' => true, 'default' => 'N', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'kyc' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'active' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'left_activate' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => 'N', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'right_activate' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => 'N', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'dt_activate' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'leftid' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'rightid' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'week_points' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'total_points' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'self_week_points' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'self_total_points' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'cr_tm' => ['type' => 'timestamp', 'length' => null, 'precision' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'mod_user' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'sponsor' => ['type' => 'index', 'columns' => ['sponsor'], 'length' => []],
            'membertype_id' => ['type' => 'index', 'columns' => ['membertype_id'], 'length' => []],
            'placement' => ['type' => 'index', 'columns' => ['placement'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'parent' => ['type' => 'unique', 'columns' => ['parent', 'placement'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'ea46002f-82d1-48b9-952c-49ff1ace7e7f',
                'membertype_id' => 1,
                'sponsor' => 'Lorem ipsum d',
                'parent' => 'Lorem ipsum d',
                'placement' => 'L',
                'count' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'gender' => 'L',
                'adddetails' => 'Lorem ipsum dolor sit amet',
                'mobile' => 'Lorem ip',
                'email' => 'Lorem ipsum dolor sit amet',
                'father_name' => 'Lorem ipsum dolor sit amet',
                'dob' => '2020-08-12',
                'marital_status' => 'Lorem ipsum dolor ',
                'professional' => 'Lorem ipsum dolor sit amet',
                'nominee_name' => 'Lorem ipsum dolor sit amet',
                'nominee_age' => 1,
                'nominee_relation' => 'Lorem ipsum dolor sit amet',
                'address_id' => 1,
                'block' => 'L',
                'kyc' => 'L',
                'active' => 'L',
                'left_activate' => 'L',
                'right_activate' => 'L',
                'dt_activate' => '2020-08-12 15:08:03',
                'leftid' => 'Lorem ipsum d',
                'rightid' => 'Lorem ipsum d',
                'week_points' => 1,
                'total_points' => 1,
                'self_week_points' => 1,
                'self_total_points' => 1,
                'cr_tm' => 1597225083,
                'created' => '2020-08-12 15:08:03',
                'modified' => '2020-08-12 15:08:03',
                'mod_user' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
