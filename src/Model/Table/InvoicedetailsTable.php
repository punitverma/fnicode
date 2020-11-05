<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoicedetails Model
 *
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\BelongsTo $Invoices
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\Invoicedetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Invoicedetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Invoicedetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoicedetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoicedetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoicedetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Invoicedetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoicedetail findOrCreate($search, callable $callback = null, $options = [])
 */
class InvoicedetailsTable extends Table
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

        $this->setTable('invoicedetails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
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
            ->scalar('offer')
            ->maxLength('offer', 1)
            ->notEmptyString('offer');

        $validator
            ->scalar('itemname')
            ->maxLength('itemname', 100)
            ->requirePresence('itemname', 'create')
            ->notEmptyString('itemname');

        $validator
            ->scalar('hsn')
            ->maxLength('hsn', 30)
            ->requirePresence('hsn', 'create')
            ->notEmptyString('hsn');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->numeric('discount')
            ->notEmptyString('discount');

        $validator
            ->integer('points')
            ->requirePresence('points', 'create')
            ->notEmptyString('points');

        $validator
            ->integer('qty')
            ->requirePresence('qty', 'create')
            ->notEmptyString('qty');

        $validator
            ->numeric('amount')
            ->notEmptyString('amount');

        $validator
            ->numeric('cgst_a')
            ->notEmptyString('cgst_a');

        $validator
            ->integer('cgst_p')
            ->notEmptyString('cgst_p');

        $validator
            ->numeric('igst_a')
            ->notEmptyString('igst_a');

        $validator
            ->integer('igst_p')
            ->notEmptyString('igst_p');

        $validator
            ->scalar('itemcat')
            ->maxLength('itemcat', 100)
            ->requirePresence('itemcat', 'create')
            ->notEmptyString('itemcat');

        $validator
            ->numeric('sgst_a')
            ->notEmptyString('sgst_a');

        $validator
            ->integer('sgst_p')
            ->notEmptyString('sgst_p');

        $validator
            ->date('dt_manf')
            ->allowEmptyDate('dt_manf');

        $validator
            ->scalar('batch_no')
            ->maxLength('batch_no', 20)
            ->allowEmptyString('batch_no');

        $validator
            ->date('dt_exp')
            ->allowEmptyDate('dt_exp');

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
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
