<?php
namespace App\Model\Table;

use App\Model\Entity\PetData;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * PetData Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pets
 * @property \Cake\ORM\Association\BelongsTo $Masters
 * @property \Cake\ORM\Association\BelongsTo $Types
 */
class PetDataTable extends Table
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

        $this->table('pet_data');
        $this->displayField('pet_id');
        $this->primaryKey('pet_id');
        $this->schema()->columnType('pet_id', 'float');
        /*
        $this->belongsTo('Pets', [
            'foreignKey' => 'pet_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Masters', [
            'foreignKey' => 'master_id',
            'joi
        nType' => 'INNER'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);*/
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
            ->requirePresence('pet_name', 'create')
            ->notEmpty('pet_name');

        $validator
            ->add('pet_value', 'valid', ['rule' => 'numeric'])
            ->requirePresence('pet_value', 'create')
            ->notEmpty('pet_value');

        $validator
            ->add('pet_pm', 'valid', ['rule' => 'numeric'])
            ->requirePresence('pet_pm', 'create')
            ->notEmpty('pet_pm');

        $validator
            ->add('quality', 'valid', ['rule' => 'boolean'])
            ->requirePresence('quality', 'create')
            ->notEmpty('quality');

        $validator
            ->add('aptitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('aptitude', 'create')
            ->notEmpty('aptitude');

        $validator
            ->add('potential', 'valid', ['rule' => 'numeric'])
            ->requirePresence('potential', 'create')
            ->notEmpty('potential');

        $validator
            ->add('cur_spirit', 'valid', ['rule' => 'numeric'])
            ->requirePresence('cur_spirit', 'create')
            ->notEmpty('cur_spirit');

        $validator
            ->add('cur_exp', 'valid', ['rule' => 'numeric'])
            ->requirePresence('cur_exp', 'create')
            ->notEmpty('cur_exp');

        $validator
            ->add('step', 'valid', ['rule' => 'boolean'])
            ->requirePresence('step', 'create')
            ->notEmpty('step');

        $validator
            ->add('grade', 'valid', ['rule' => 'boolean'])
            ->requirePresence('grade', 'create')
            ->notEmpty('grade');

        $validator
            ->add('talent_count', 'valid', ['rule' => 'numeric'])
            ->requirePresence('talent_count', 'create')
            ->notEmpty('talent_count');

        $validator
            ->add('wuxing_energy', 'valid', ['rule' => 'numeric'])
            ->requirePresence('wuxing_energy', 'create')
            ->notEmpty('wuxing_energy');

        $validator
            ->add('pet_state', 'valid', ['rule' => 'numeric'])
            ->requirePresence('pet_state', 'create')
            ->notEmpty('pet_state');

        $validator
            ->add('pet_lock', 'valid', ['rule' => 'boolean'])
            ->requirePresence('pet_lock', 'create')
            ->notEmpty('pet_lock');

        $validator
            ->add('RemoveFlag', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('RemoveFlag');

        $validator
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday');

        $validator
            ->add('live', 'valid', ['rule' => 'numeric'])
            ->requirePresence('live', 'create')
            ->notEmpty('live');

        $validator
            ->add('lifeadded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('lifeadded', 'create')
            ->notEmpty('lifeadded');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['pet_name']));
        return $rules;
    }

    public function generateNextID() {
        $nextID = 1;
        $found = false;
        $guild = TableRegistry::get('pet_data');

        $count = 0;
        while(!$found) {
            $search = $guild->find()->where(['pet_id' => $nextID])->first();
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

    public function getNurslings($roleID) {
        $petData = TableRegistry::get('pet_data');
        $result = $petData->find()
            ->select(['pet_id', 'pet_name', 'pet_value', 'pet_pm', 'quality'])
            ->where(['master_id' => $roleID])->all();
        return $result;
    }

}
