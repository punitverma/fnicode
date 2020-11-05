<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Members Model
 *
 * @property \App\Model\Table\MembertypesTable&\Cake\ORM\Association\BelongsTo $Membertypes
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\DistbDashboardTable&\Cake\ORM\Association\HasMany $DistbDashboard
 * @property \App\Model\Table\KycsTable&\Cake\ORM\Association\HasMany $Kycs
 * @property \App\Model\Table\LedgersTable&\Cake\ORM\Association\HasMany $Ledgers
 * @property \App\Model\Table\PayoutTable&\Cake\ORM\Association\HasMany $Payout
 * @property \App\Model\Table\PayoutMockTable&\Cake\ORM\Association\HasMany $PayoutMock
 * @property \App\Model\Table\RewardwinnerTable&\Cake\ORM\Association\HasMany $Rewardwinner
 * @property \App\Model\Table\TranscationsTable&\Cake\ORM\Association\HasMany $Transcations
 *
 * @method \App\Model\Entity\Member get($primaryKey, $options = [])
 * @method \App\Model\Entity\Member newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Member[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Member|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Member saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Member patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Member[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Member findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MembersTable extends Table
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

        $this->setTable('members');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Membertypes', [
            'foreignKey' => 'membertype_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DistbDashboard', [
            'foreignKey' => 'member_id',
        ]);
        $this->hasMany('Kycs', [
            'foreignKey' => 'member_id',
        ]);
        $this->hasMany('Ledgers', [
            'foreignKey' => 'member_id',
        ]);
        $this->hasMany('Payout', [
            'foreignKey' => 'member_id',
        ]);
        $this->hasMany('PayoutMock', [
            'foreignKey' => 'member_id',
        ]);
        $this->hasMany('Rewardwinner', [
            'foreignKey' => 'member_id',
        ]);
        $this->hasMany('Transcations', [
            'foreignKey' => 'member_id',
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
            ->requirePresence('sponsor', 'create')
            ->notEmptyString('sponsor');

        $validator
            ->scalar('parent')
            ->maxLength('parent', 15)
            ->requirePresence('parent', 'create')
            ->notEmptyString('parent');

        $validator
            ->scalar('placement')
            ->maxLength('placement', 1)
            ->requirePresence('placement', 'create')
            ->notEmptyString('placement');

        $validator
            ->notEmptyString('count');

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 1)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('adddetails')
            ->maxLength('adddetails', 100)
            ->requirePresence('adddetails', 'create')
            ->notEmptyString('adddetails');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 10)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('father_name')
            ->maxLength('father_name', 100)
            ->allowEmptyString('father_name');

        $validator
            ->date('dob')
            ->allowEmptyDate('dob');

        $validator
            ->scalar('marital_status')
            ->maxLength('marital_status', 20)
            ->allowEmptyString('marital_status');

        $validator
            ->scalar('professional')
            ->maxLength('professional', 100)
            ->allowEmptyString('professional');

        $validator
            ->scalar('nominee_name')
            ->maxLength('nominee_name', 100)
            ->allowEmptyString('nominee_name');

        $validator
            ->allowEmptyString('nominee_age');

        $validator
            ->scalar('nominee_relation')
            ->maxLength('nominee_relation', 30)
            ->allowEmptyString('nominee_relation');

        $validator
            ->scalar('block')
            ->maxLength('block', 1)
            ->allowEmptyString('block');

        $validator
            ->scalar('kyc')
            ->maxLength('kyc', 1)
            ->requirePresence('kyc', 'create')
            ->notEmptyString('kyc');

        $validator
            ->scalar('active')
            ->maxLength('active', 1)
            ->requirePresence('active', 'create')
            ->notEmptyString('active');

        $validator
            ->scalar('left_activate')
            ->maxLength('left_activate', 1)
            ->notEmptyString('left_activate');

        $validator
            ->scalar('right_activate')
            ->maxLength('right_activate', 1)
            ->notEmptyString('right_activate');

        $validator
            ->dateTime('dt_activate')
            ->allowEmptyDateTime('dt_activate');

        $validator
            ->scalar('leftid')
            ->maxLength('leftid', 15)
            ->allowEmptyString('leftid');

        $validator
            ->scalar('rightid')
            ->maxLength('rightid', 15)
            ->allowEmptyString('rightid');

        $validator
            ->numeric('week_points')
            ->notEmptyString('week_points');

        $validator
            ->numeric('total_points')
            ->notEmptyString('total_points');

        $validator
            ->numeric('self_week_points')
            ->notEmptyString('self_week_points');

        $validator
            ->numeric('self_total_points')
            ->notEmptyString('self_total_points');

        $validator
            ->dateTime('cr_tm')
            ->notEmptyDateTime('cr_tm');

        $validator
            ->scalar('mod_user')
            ->maxLength('mod_user', 30)
            ->allowEmptyString('mod_user');

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
        $rules->add($rules->existsIn(['membertype_id'], 'Membertypes'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }
}
