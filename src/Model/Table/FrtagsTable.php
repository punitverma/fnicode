<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frtags Model
 *
 * @property \App\Model\Table\FrenchiesTable&\Cake\ORM\Association\BelongsTo $Frenchies
 *
 * @method \App\Model\Entity\Frtag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frtag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Frtag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frtag|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frtag saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frtag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frtag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frtag findOrCreate($search, callable $callback = null, $options = [])
 */
class FrtagsTable extends Table
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

        $this->setTable('frtags');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Frenchies', [
            'foreignKey' => 'frenchie_id',
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
            ->scalar('tagwith')
            ->maxLength('tagwith', 20)
            ->requirePresence('tagwith', 'create')
            ->notEmptyString('tagwith');

        $validator
            ->dateTime('updt')
            ->notEmptyDateTime('updt');

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
