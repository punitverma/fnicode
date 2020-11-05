<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payoutdt Model
 *
 * @property \App\Model\Table\PayoutTable&\Cake\ORM\Association\HasMany $Payout
 *
 * @method \App\Model\Entity\Payoutdt get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payoutdt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Payoutdt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payoutdt|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payoutdt saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payoutdt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payoutdt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payoutdt findOrCreate($search, callable $callback = null, $options = [])
 */
class PayoutdtTable extends Table
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

        $this->setTable('payoutdt');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Payout', [
            'foreignKey' => 'payoutdt_id',
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
            ->date('period_from')
            ->requirePresence('period_from', 'create')
            ->notEmptyDate('period_from');

        $validator
            ->date('period_to')
            ->requirePresence('period_to', 'create')
            ->notEmptyDate('period_to');

        $validator
            ->dateTime('process_on')
            ->allowEmptyDateTime('process_on');

        $validator
            ->requirePresence('total_self_bv', 'create')
            ->notEmptyString('total_self_bv');

        $validator
            ->requirePresence('match_bv', 'create')
            ->notEmptyString('match_bv');

        $validator
            ->numeric('mbonus')
            ->requirePresence('mbonus', 'create')
            ->notEmptyString('mbonus');

        $validator
            ->numeric('total_rrp_bonus')
            ->requirePresence('total_rrp_bonus', 'create')
            ->notEmptyString('total_rrp_bonus');

        $validator
            ->requirePresence('self_bv', 'create')
            ->notEmptyString('self_bv');

        $validator
            ->numeric('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->numeric('tds')
            ->requirePresence('tds', 'create')
            ->notEmptyString('tds');

        $validator
            ->numeric('surcharge')
            ->requirePresence('surcharge', 'create')
            ->notEmptyString('surcharge');

        $validator
            ->numeric('net_pay')
            ->requirePresence('net_pay', 'create')
            ->notEmptyString('net_pay');

        return $validator;
    }
}
