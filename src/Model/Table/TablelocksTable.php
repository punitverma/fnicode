<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tablelocks Model
 *
 * @method \App\Model\Entity\Tablelock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tablelock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tablelock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tablelock|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tablelock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tablelock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tablelock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tablelock findOrCreate($search, callable $callback = null, $options = [])
 */
class TablelocksTable extends Table
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

        $this->setTable('tablelocks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('name');
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name', null, 'create');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->notEmptyString('status');

        return $validator;
    }
}
