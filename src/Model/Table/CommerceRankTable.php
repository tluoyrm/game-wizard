<?php
namespace App\Model\Table;

use App\Model\Entity\CommerceRank;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * CommerceRank Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\BelongsTo $Guilds
 */
class CommerceRankTable extends Table
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

        $this->table('commerce_rank');
        $this->displayField('role_id');
        $this->primaryKey('role_id');
        $this->belongsTo('Guild', [
            'foreignKey' => 'guild_id',
            'joinType' => 'INNER'
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
            ->add('times', 'valid', ['rule' => 'numeric'])
            ->requirePresence('times', 'create')
            ->notEmpty('times');

        $validator
            ->add('tael', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tael', 'create')
            ->notEmpty('tael');

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
        $city = TableRegistry::get('commerce_rank');

        $count = 0;
        while(!$found) {
            $search = $city->find()->where(['role_id' => $nextID])->first();
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
