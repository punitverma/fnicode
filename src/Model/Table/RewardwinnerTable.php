<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rewardwinner Model
 *
 * @property \App\Model\Table\RewardsTable&\Cake\ORM\Association\BelongsTo $Rewards
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\BelongsTo $Members
 *
 * @method \App\Model\Entity\Rewardwinner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rewardwinner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rewardwinner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rewardwinner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rewardwinner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rewardwinner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rewardwinner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rewardwinner findOrCreate($search, callable $callback = null, $options = [])
 */
class RewardwinnerTable extends Table
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

        $this->setTable('rewardwinner');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rewards', [
            'foreignKey' => 'reward_id',
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
        $rules->add($rules->existsIn(['reward_id'], 'Rewards'));
        $rules->add($rules->existsIn(['member_id'], 'Members'));

        return $rules;
    }
}
