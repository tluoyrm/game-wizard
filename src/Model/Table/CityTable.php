<?php
namespace App\Model\Table;

use App\Model\Entity\City;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * City Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Guilds
 */
class CityTable extends Table
{

    public static function defaultConnectionName() {
        return 'sm_db';
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('city');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('guild', [
            'className' => 'Guild',
            'foreignKey' => 'guild_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('defence', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('defence');

        $validator
            ->add('eudemon_tally', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('eudemon_tally');

        $validator
            ->add('tax_rate', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tax_rate');

        $validator
            ->add('tax_rate_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tax_rate_time');

        $validator
            ->add('taxation', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('taxation');

        $validator
            ->add('prolificacy', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('prolificacy');

        $validator
            ->allowEmpty('signup_list');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['guild_id'], 'Guild'));
        return $rules;
    }

    public function generateNextID() {
        $nextID = 1;
        $found = false;
        $city = TableRegistry::get('city');

        $count = 0;
        while(!$found) {
            $search = $city->find()->where(['id' => $nextID])->first();
            if (!$search) {
                $found = true;
            } else {
                $nextID++;
            }
            $count++;
            if ($count > PHP_INT_MAX) {
                break;
            }
        }

        if ($found) {
            return $nextID;
        } else {
            return -1;
        }
    }
}
