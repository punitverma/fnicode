<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 *
 * @property \App\Model\Table\OffersTable&\Cake\ORM\Association\BelongsTo $Offers
 * @property \App\Model\Table\FrenchietranscationsTable&\Cake\ORM\Association\HasMany $Frenchietranscations
 * @property \App\Model\Table\InvoicedetailsTable&\Cake\ORM\Association\HasMany $Invoicedetails
 * @property \App\Model\Table\TranscationsTable&\Cake\ORM\Association\HasMany $Transcations
 *
 * @method \App\Model\Entity\Invoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Invoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Invoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InvoicesTable extends Table
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

        $this->setTable('invoices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Offers', [
            'foreignKey' => 'offer_id',
        ]);
        $this->hasMany('Frenchietranscations', [
            'foreignKey' => 'invoice_id',
        ]);
        $this->hasMany('Invoicedetails', [
            'foreignKey' => 'invoice_id',
        ]);
        $this->hasMany('Transcations', [
            'foreignKey' => 'invoice_id',
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
            ->scalar('trtype')
            ->maxLength('trtype', 1)
            ->notEmptyString('trtype');

        $validator
            ->scalar('type')
            ->maxLength('type', 1)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('receipt')
            ->maxLength('receipt', 25)
            ->requirePresence('receipt', 'create')
            ->notEmptyString('receipt');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('ref')
            ->maxLength('ref', 25)
            ->allowEmptyString('ref');

        $validator
            ->scalar('fromid')
            ->maxLength('fromid', 15)
            ->requirePresence('fromid', 'create')
            ->notEmptyString('fromid');

        $validator
            ->scalar('fromname')
            ->maxLength('fromname', 35)
            ->requirePresence('fromname', 'create')
            ->notEmptyString('fromname');

        $validator
            ->requirePresence('fromstate', 'create')
            ->notEmptyString('fromstate');

        $validator
            ->scalar('fromgst')
            ->maxLength('fromgst', 20)
            ->allowEmptyString('fromgst');

        $validator
            ->scalar('toid')
            ->maxLength('toid', 15)
            ->requirePresence('toid', 'create')
            ->notEmptyString('toid');

        $validator
            ->scalar('toname')
            ->maxLength('toname', 35)
            ->requirePresence('toname', 'create')
            ->notEmptyString('toname');

        $validator
            ->requirePresence('tostate', 'create')
            ->notEmptyString('tostate');

        $validator
            ->scalar('togst')
            ->maxLength('togst', 20)
            ->allowEmptyString('togst');

        $validator
            ->integer('qty')
            ->notEmptyString('qty');

        $validator
            ->numeric('igst')
            ->notEmptyString('igst');

        $validator
            ->numeric('cgst')
            ->notEmptyString('cgst');

        $validator
            ->numeric('sgst')
            ->notEmptyString('sgst');

        $validator
            ->numeric('discount')
            ->notEmptyString('discount');

        $validator
            ->numeric('amount')
            ->notEmptyString('amount');

        $validator
            ->integer('points')
            ->allowEmptyString('points');

        $validator
            ->scalar('payment_mode')
            ->maxLength('payment_mode', 10)
            ->requirePresence('payment_mode', 'create')
            ->notEmptyString('payment_mode');

        $validator
            ->scalar('payment_reference')
            ->maxLength('payment_reference', 30)
            ->requirePresence('payment_reference', 'create')
            ->notEmptyString('payment_reference');

        $validator
            ->dateTime('dt_tm')
            ->notEmptyDateTime('dt_tm');

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
        $rules->add($rules->existsIn(['offer_id'], 'Offers'));

        return $rules;
    }
}
