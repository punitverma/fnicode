<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banks Model
 *
 * @method \App\Model\Entity\Bank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bank findOrCreate($search, callable $callback = null, $options = [])
 */
class BanksTable extends Table
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

        $this->setTable('banks');
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
            ->scalar('BANK')
            ->maxLength('BANK', 100)
            ->allowEmptyString('BANK');

        $validator
            ->scalar('IFSC')
            ->maxLength('IFSC', 30)
            ->allowEmptyString('IFSC')
            ->add('IFSC', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('BRANCH')
            ->maxLength('BRANCH', 100)
            ->allowEmptyString('BRANCH');

        $validator
            ->scalar('ADDRESS')
            ->maxLength('ADDRESS', 100)
            ->allowEmptyString('ADDRESS');

        $validator
            ->scalar('CONTACT')
            ->maxLength('CONTACT', 20)
            ->allowEmptyString('CONTACT');

        $validator
            ->scalar('CITY')
            ->maxLength('CITY', 60)
            ->allowEmptyString('CITY');

        $validator
            ->scalar('DISTRICT')
            ->maxLength('DISTRICT', 60)
            ->allowEmptyString('DISTRICT');

        $validator
            ->scalar('STATE')
            ->maxLength('STATE', 60)
            ->allowEmptyString('STATE');

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
        $rules->add($rules->isUnique(['IFSC']));

        return $rules;
    }
}
