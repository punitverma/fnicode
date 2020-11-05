<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payout Model
 *
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\BelongsTo $Members
 *
 * @method \App\Model\Entity\Payout get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payout newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Payout[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payout[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payout findOrCreate($search, callable $callback = null, $options = [])
 */
class PayoutTable extends Table
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

        $this->setTable('payout');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Payoutdt', [
            'foreignKey' => 'payoutdt_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Members', [
            'foreignKey' => 'member_id',
            'joinType' => 'INNER',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('sponsor')
            ->maxLength('sponsor', 30)
            ->requirePresence('sponsor', 'create')
            ->notEmptyString('sponsor');

        $validator
            ->scalar('kyc')
            ->maxLength('kyc', 1)
            ->requirePresence('kyc', 'create')
            ->notEmptyString('kyc');

        $validator
            ->scalar('active')
            ->maxLength('active', 1)
            ->requirePresence('active', 'create')
            ->notEmptyString('active');

        $validator
            ->numeric('total_self_bv')
            ->notEmptyString('total_self_bv');

        $validator
            ->numeric('self_bv')
            ->notEmptyString('self_bv');

        $validator
            ->numeric('total_left_bv')
            ->notEmptyString('total_left_bv');

        $validator
            ->numeric('left_bv')
            ->notEmptyString('left_bv');

        $validator
            ->numeric('total_right_bv')
            ->notEmptyString('total_right_bv');

        $validator
            ->numeric('right_bv')
            ->notEmptyString('right_bv');

        $validator
            ->numeric('balance_left')
            ->notEmptyString('balance_left');

        $validator
            ->numeric('balance_right')
            ->notEmptyString('balance_right');

        $validator
            ->numeric('match_bv')
            ->notEmptyString('match_bv');

        $validator
            ->integer('mbonus')
            ->requirePresence('mbonus', 'create')
            ->notEmptyString('mbonus');

        $validator
            ->numeric('self_income')
            ->notEmptyString('self_income');

        $validator
            ->numeric('amount')
            ->notEmptyString('amount');

        $validator
            ->numeric('sponsor_income')
            ->notEmptyString('sponsor_income');

        $validator
            ->numeric('rrp_left')
            ->requirePresence('rrp_left', 'create')
            ->notEmptyString('rrp_left');

        $validator
            ->numeric('rrp_right')
            ->requirePresence('rrp_right', 'create')
            ->notEmptyString('rrp_right');

        $validator
            ->numeric('rrp_match')
            ->requirePresence('rrp_match', 'create')
            ->notEmptyString('rrp_match');

        $validator
            ->numeric('rrp_bonus')
            ->requirePresence('rrp_bonus', 'create')
            ->notEmptyString('rrp_bonus');

        $validator
            ->numeric('total')
            ->notEmptyString('total');

        $validator
            ->numeric('tds')
            ->notEmptyString('tds');

        $validator
            ->numeric('sur')
            ->notEmptyString('sur');

        $validator
            ->numeric('net_pay')
            ->notEmptyString('net_pay');

        $validator
            ->dateTime('process_on')
            ->notEmptyDateTime('process_on');

        $validator
            ->date('paid_on')
            ->allowEmptyDate('paid_on');

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
        $rules->add($rules->existsIn(['payoutdt_id'], 'Payoutdt'));
        $rules->add($rules->existsIn(['member_id'], 'Members'));

        return $rules;
    }
}
