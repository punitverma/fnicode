<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offers Model
 *
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\OfferforsTable&\Cake\ORM\Association\HasMany $Offerfors
 * @property \App\Model\Table\OffersitemsTable&\Cake\ORM\Association\HasMany $Offersitems
 *
 * @method \App\Model\Entity\Offer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Offer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Offer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Offer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Offer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Offer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Offer findOrCreate($search, callable $callback = null, $options = [])
 */
class OffersTable extends Table
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

        $this->setTable('offers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('IfItems', [
            'foreignKey' => 'if_item_id',
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'offer_id',
        ]);
        $this->hasMany('Offerfors', [
            'foreignKey' => 'offer_id',
        ]);
        $this->hasMany('Offersitems', [
            'foreignKey' => 'offer_id',
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('type')
            ->maxLength('type', 1)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->integer('if_item_qty')
            ->allowEmptyString('if_item_qty');

        $validator
            ->integer('invoice_value')
            ->allowEmptyString('invoice_value');

        $validator
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

        $validator
            ->integer('discount')
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->integer('points')
            ->notEmptyString('points');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmptyString('active');

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
//        $rules->add($rules->existsIn(['if_item_id'], 'IfItems'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
