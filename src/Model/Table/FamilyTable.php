<?php
namespace App\Model\Table;

use App\Model\Entity\Family;
use Cake\Form\Schema;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Family Model
 *
 */
class FamilyTable extends Table
{

    private $searchFields = ['FamilyID', 'FamilyName'];

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

        $this->table('family');
        $this->displayField('FamilyID');
        $this->primaryKey('FamilyID');
        $this->schema()->columnType('FamilyID', 'float');
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
            ->add('FamilyID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('FamilyID', 'create');

        $validator
            ->requirePresence('FamilyName', 'create')
            ->notEmpty('FamilyName');

        $validator
            ->add('LeaderID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LeaderID', 'create')
            ->notEmpty('LeaderID');

        $validator
            ->add('FounderID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FounderID', 'create')
            ->notEmpty('FounderID');

        $validator
            ->add('CreateTime', 'valid', ['rule' => 'datetime'])
            ->requirePresence('CreateTime', 'create')
            ->notEmpty('CreateTime');

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
        $rules->add($rules->isUnique(['FamilyName']));
        return $rules;
    }

    public function generateNextID() {
        $nextID = 1;
        $found = false;
        $guild = TableRegistry::get('family');

        $count = 0;
        while(!$found) {
            $search = $guild->find()->where(['FamilyID' => $nextID])->first();
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

    public function getSearchFields() {
        return $this->searchFields;
    }
}
