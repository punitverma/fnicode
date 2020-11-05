<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frenchietypes Model
 *
 * @property \App\Model\Table\FrenchiesTable&\Cake\ORM\Association\HasMany $Frenchies
 *
 * @method \App\Model\Entity\Frenchietype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frenchietype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Frenchietype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frenchietype|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frenchietype saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frenchietype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frenchietype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frenchietype findOrCreate($search, callable $callback = null, $options = [])
 */
class FrenchietypesTable extends Table
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

        $this->setTable('frenchietypes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Frenchies', [
            'foreignKey' => 'frenchietype_id',
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
            ->scalar('name')
            ->maxLength('name', 40)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->numeric('commission')
            ->allowEmptyString('commission');

        $validator
            ->requirePresence('scope', 'create')
            ->notEmptyString('scope');

        $validator
            ->scalar('active')
            ->maxLength('active', 1)
            ->notEmptyString('active');

        $validator
            ->dateTime('dttm')
            ->notEmptyDateTime('dttm');

        return $validator;
    }
}
