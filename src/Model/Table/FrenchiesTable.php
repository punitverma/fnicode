<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frenchies Model
 *
 * @property \App\Model\Table\FrenchietypesTable&\Cake\ORM\Association\BelongsTo $Frenchietypes
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\DistrictsTable&\Cake\ORM\Association\BelongsTo $Districts
 *
 * @method \App\Model\Entity\Frenchy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frenchy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Frenchy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frenchy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frenchy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frenchy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frenchy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frenchy findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FrenchiesTable extends Table
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

        $this->setTable('frenchies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Frenchietypes', [
            'foreignKey' => 'frenchietype_id',
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
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
            ->scalar('id')
            ->maxLength('id', 15)
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('sponsor')
            ->maxLength('sponsor', 15)
            ->allowEmptyString('sponsor');

        $validator
            ->scalar('name')
            ->maxLength('name', 120)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('ownername')
            ->maxLength('ownername', 100)
            ->requirePresence('ownername', 'create')
            ->notEmptyString('ownername');

        $validator
            ->scalar('pan')
            ->maxLength('pan', 10)
            ->requirePresence('pan', 'create')
            ->notEmptyString('pan');

        $validator
            ->scalar('registered')
            ->maxLength('registered', 1)
            ->notEmptyString('registered');

        $validator
            ->scalar('gst')
            ->maxLength('gst', 15)
            ->allowEmptyString('gst');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 10)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 200)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('pincode')
            ->maxLength('pincode', 6)
            ->requirePresence('pincode', 'create')
            ->notEmptyString('pincode');

        $validator
            ->numeric('cr_amount')
            ->notEmptyString('cr_amount');

        $validator
            ->numeric('dr_amount')
            ->notEmptyString('dr_amount');

        $validator
            ->scalar('bank')
            ->maxLength('bank', 100)
            ->allowEmptyString('bank');

        $validator
            ->scalar('branch')
            ->maxLength('branch', 100)
            ->allowEmptyString('branch');

        $validator
            ->scalar('ifsc')
            ->maxLength('ifsc', 50)
            ->allowEmptyString('ifsc');

        $validator
            ->scalar('accountno')
            ->maxLength('accountno', 20)
            ->allowEmptyString('accountno');

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
        $rules->add($rules->existsIn(['frenchietype_id'], 'Frenchietypes'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['district_id'], 'Districts'));

        return $rules;
    }
}
