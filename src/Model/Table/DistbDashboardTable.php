<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DistbDashboard Model
 *
 * @method \App\Model\Entity\DistbDashboard get($primaryKey, $options = [])
 * @method \App\Model\Entity\DistbDashboard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DistbDashboard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DistbDashboard|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DistbDashboard saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DistbDashboard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DistbDashboard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DistbDashboard findOrCreate($search, callable $callback = null, $options = [])
 */
class DistbDashboardTable extends Table
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

        $this->setTable('distb_dashboard');
        $this->setDisplayField('member_id');
        $this->setPrimaryKey('member_id');

        $this->belongsTo('Lefts', [
            'foreignKey' => 'left_id',
        ]);
        $this->belongsTo('Rights', [
            'foreignKey' => 'right_id',
        ]);
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
            ->scalar('member_id')
            ->maxLength('member_id', 15)
            ->allowEmptyString('member_id', null, 'create');

        $validator
            ->numeric('left_bv')
            ->notEmptyString('left_bv');

        $validator
            ->numeric('right_bv')
            ->notEmptyString('right_bv');

        $validator
            ->integer('left_count')
            ->requirePresence('left_count', 'create')
            ->notEmptyString('left_count');

        $validator
            ->integer('right_count')
            ->requirePresence('right_count', 'create')
            ->notEmptyString('right_count');

        $validator
            ->numeric('left_total')
            ->notEmptyString('left_total');

        $validator
            ->numeric('right_total')
            ->notEmptyString('right_total');

        $validator
            ->integer('reward_rank')
            ->notEmptyString('reward_rank');

        $validator
            ->numeric('payout_week')
            ->notEmptyString('payout_week');

        $validator
            ->numeric('payout_total')
            ->notEmptyString('payout_total');

        $validator
            ->requirePresence('bal_left_bv', 'create')
            ->notEmptyString('bal_left_bv');

        $validator
            ->requirePresence('bal_right_bv', 'create')
            ->notEmptyString('bal_right_bv');

        $validator
            ->dateTime('tm')
            ->notEmptyDateTime('tm');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['left_id'], 'Lefts'));
        $rules->add($rules->existsIn(['right_id'], 'Rights'));

        return $rules;
    }
}
