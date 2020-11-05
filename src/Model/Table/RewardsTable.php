<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rewards Model
 *
 * @property \App\Model\Table\RewardwinnerTable&\Cake\ORM\Association\HasMany $Rewardwinner
 *
 * @method \App\Model\Entity\Reward get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reward newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reward[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reward|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reward saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reward patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reward[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reward findOrCreate($search, callable $callback = null, $options = [])
 */
class RewardsTable extends Table
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

        $this->setTable('rewards');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Rewardwinner', [
            'foreignKey' => 'reward_id',
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
            ->integer('right_bv')
            ->allowEmptyString('right_bv');

        $validator
            ->integer('left_bv')
            ->allowEmptyString('left_bv');

        $validator
            ->integer('matching_bv')
            ->allowEmptyString('matching_bv');

        $validator
            ->integer('reward_point')
            ->allowEmptyString('reward_point');

        $validator
            ->scalar('amount')
            ->maxLength('amount', 14)
            ->allowEmptyString('amount');

        $validator
            ->scalar('rank')
            ->maxLength('rank', 16)
            ->allowEmptyString('rank');

        $validator
            ->scalar('gift')
            ->maxLength('gift', 19)
            ->allowEmptyString('gift');

        return $validator;
    }
}
