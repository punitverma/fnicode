<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admindashboard Model
 *
 * @method \App\Model\Entity\Admindashboard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admindashboard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Admindashboard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admindashboard|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admindashboard saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admindashboard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admindashboard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admindashboard findOrCreate($search, callable $callback = null, $options = [])
 */
class AdmindashboardTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('admin_dashboard');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->requirePresence('total_reg', 'create')
            ->notEmptyString('total_reg');

        $validator
            ->requirePresence('total_reg_active', 'create')
            ->notEmptyString('total_reg_active');

        $validator
            ->integer('week_reg')
            ->requirePresence('week_reg', 'create')
            ->notEmptyString('week_reg');

        $validator
            ->integer('week_reg_act')
            ->requirePresence('week_reg_act', 'create')
            ->notEmptyString('week_reg_act');

        $validator
            ->requirePresence('last_week_bv', 'create')
            ->notEmptyString('last_week_bv');

        $validator
            ->requirePresence('week_bv', 'create')
            ->notEmptyString('week_bv');

        $validator
            ->requirePresence('left_bv', 'create')
            ->notEmptyString('left_bv');

        $validator
            ->requirePresence('right_bv', 'create')
            ->notEmptyString('right_bv');

        $validator
            ->notEmptyString('total_bv');

        $validator
            ->requirePresence('week_sale_inv', 'create')
            ->notEmptyString('week_sale_inv');

        $validator
            ->numeric('week_sale_inv_amount')
            ->requirePresence('week_sale_inv_amount', 'create')
            ->notEmptyString('week_sale_inv_amount');

        $validator
            ->requirePresence('total_sale_inv', 'create')
            ->notEmptyString('total_sale_inv');

        $validator
            ->numeric('total_sale_inv_amount')
            ->requirePresence('total_sale_inv_amount', 'create')
            ->notEmptyString('total_sale_inv_amount');

        $validator
            ->numeric('week_match_payout')
            ->requirePresence('week_match_payout', 'create')
            ->notEmptyString('week_match_payout');

        $validator
            ->numeric('total_match_payout')
            ->requirePresence('total_match_payout', 'create')
            ->notEmptyString('total_match_payout');

        $validator
            ->numeric('week_sponsor_payout')
            ->requirePresence('week_sponsor_payout', 'create')
            ->notEmptyString('week_sponsor_payout');

        $validator
            ->numeric('total_sponsor_payout')
            ->requirePresence('total_sponsor_payout', 'create')
            ->notEmptyString('total_sponsor_payout');

        $validator
            ->numeric('week_self_payout')
            ->notEmptyString('week_self_payout');

        $validator
            ->numeric('total_self_payout')
            ->notEmptyString('total_self_payout');

        $validator
            ->integer('f_sale')
            ->notEmptyString('f_sale');

        $validator
            ->integer('f_district')
            ->notEmptyString('f_district');

        $validator
            ->integer('f_city')
            ->notEmptyString('f_city');

        $validator
            ->integer('f_home')
            ->notEmptyString('f_home');

        $validator
            ->dateTime('updateon')
            ->notEmptyDateTime('updateon');

        return $validator;
    }
}
