<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frenchiecomms Model
 *
 * @property \App\Model\Table\FrenchiesTable&\Cake\ORM\Association\BelongsTo $Frenchies
 *
 * @method \App\Model\Entity\Frenchiecomm get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frenchiecomm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Frenchiecomm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frenchiecomm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frenchiecomm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frenchiecomm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frenchiecomm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frenchiecomm findOrCreate($search, callable $callback = null, $options = [])
 */
class FrenchiecommsTable extends Table
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

        $this->setTable('frenchiecomms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Frenchies', [
            'foreignKey' => 'frenchie_id',
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
            ->scalar('fid')
            ->maxLength('fid', 15)
            ->requirePresence('fid', 'create')
            ->notEmptyString('fid');

        $validator
            ->scalar('invoiceno')
            ->maxLength('invoiceno', 30)
            ->requirePresence('invoiceno', 'create')
            ->notEmptyString('invoiceno');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->numeric('percent')
            ->requirePresence('percent', 'create')
            ->notEmptyString('percent');

        $validator
            ->numeric('commision')
            ->requirePresence('commision', 'create')
            ->notEmptyString('commision');

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
        $rules->add($rules->existsIn(['frenchie_id'], 'Frenchies'));

        return $rules;
    }
}
