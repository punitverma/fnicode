<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\ItemcatsTable&\Cake\ORM\Association\BelongsTo $Itemcats
 * @property \App\Model\Table\InvoicedetailsTable&\Cake\ORM\Association\HasMany $Invoicedetails
 * @property \App\Model\Table\StocksTable&\Cake\ORM\Association\HasMany $Stocks
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Itemcats', [
            'foreignKey' => 'itemcat_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Invoicedetails', [
            'foreignKey' => 'item_id',
        ]);
        $this->hasMany('Offersitem', [
            'foreignKey' => 'item_id',
        ]);
        $this->hasMany('Stocks', [
            'foreignKey' => 'item_id',
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
            ->scalar('code')
            ->maxLength('code', 10)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 30)
            ->requirePresence('unit', 'create')
            ->notEmptyString('unit');

        $validator
            ->scalar('hsn')
            ->maxLength('hsn', 30)
            ->requirePresence('hsn', 'create')
            ->notEmptyString('hsn');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->numeric('mrp')
            ->allowEmptyString('mrp');

        $validator
            ->numeric('saleprice')
            ->allowEmptyString('saleprice');

        $validator
            ->numeric('purchaseprice')
            ->allowEmptyString('purchaseprice');

        $validator
            ->integer('points')
            ->requirePresence('points', 'create')
            ->notEmptyString('points');

        $validator
            ->integer('tax')
            ->requirePresence('tax', 'create')
            ->notEmptyString('tax');

        $validator
            ->numeric('dp')
            ->requirePresence('dp', 'create')
            ->notEmptyString('dp');

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
        $rules->add($rules->existsIn(['itemcat_id'], 'Itemcats'));

        return $rules;
    }
}
