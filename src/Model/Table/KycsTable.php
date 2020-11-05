<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kycs Model
 *
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\BelongsTo $Members
 * @property \App\Model\Table\KycdocsTable&\Cake\ORM\Association\HasMany $Kycdocs
 *
 * @method \App\Model\Entity\Kyc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kyc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Kyc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kyc|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kyc saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kyc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kyc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kyc findOrCreate($search, callable $callback = null, $options = [])
 */
class KycsTable extends Table
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

        $this->setTable('kycs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Members', [
            'foreignKey' => 'member_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Kycdocs', [
            'foreignKey' => 'kyc_id',
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
            ->scalar('pan')
            ->maxLength('pan', 10)
            ->requirePresence('pan', 'create')
            ->notEmptyString('pan');

        $validator
            ->scalar('bank')
            ->maxLength('bank', 50)
            ->requirePresence('bank', 'create')
            ->notEmptyString('bank');

        $validator
            ->scalar('branch')
            ->maxLength('branch', 80)
            ->requirePresence('branch', 'create')
            ->notEmptyString('branch');

        $validator
            ->scalar('ifsc')
            ->maxLength('ifsc', 20)
            ->requirePresence('ifsc', 'create')
            ->notEmptyString('ifsc');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->allowEmptyString('name');

        $validator
            ->scalar('accno')
            ->maxLength('accno', 30)
            ->requirePresence('accno', 'create')
            ->notEmptyString('accno');

        $validator
            ->scalar('approveby')
            ->maxLength('approveby', 15)
            ->allowEmptyString('approveby');

        $validator
            ->dateTime('approveon')
            ->allowEmptyDateTime('approveon');

        $validator
            ->scalar('remarks')
            ->maxLength('remarks', 100)
            ->allowEmptyString('remarks');

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
        $rules->add($rules->existsIn(['member_id'], 'Members'));

        return $rules;
    }
}
