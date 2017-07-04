<?php
namespace App\Model\Table;

use App\Model\Entity\Guild;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Guild Model
 *
 * @property \Cake\ORM\Association\HasMany $City
 * @property \Cake\ORM\Association\HasMany $CommerceRank
 * @property \Cake\ORM\Association\BelongsToMany $Skill
 */
class GuildTable extends Table
{

    private $searchFields = ['ID'];
    private $maxLevel = 5;

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

        $this->table('guild');
        $this->displayField('ID');
        $this->primaryKey('ID');
        $this->schema()->columnType('ID', 'float');

        $this->hasMany('City', [
            'foreignKey' => 'guild_id'
        ]);
        $this->hasMany('CommerceRank', [
            'foreignKey' => 'guild_id'
        ]);
        $this->hasMany('GuildSkill', [
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
            ->add('ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ID', 'create');

        $validator
            ->allowEmpty('Name');

        $validator
            ->add('FounderNameID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FounderNameID', 'create')
            ->notEmpty('FounderNameID');

        $validator
            ->add('LeaderID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LeaderID', 'create')
            ->notEmpty('LeaderID');

        $validator
            ->add('SpecState', 'valid', ['rule' => 'numeric'])
            ->requirePresence('SpecState', 'create')
            ->notEmpty('SpecState');

        $validator
            ->add('Level', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Level', 'create')
            ->notEmpty('Level');

        $validator
            ->add('HoldCity0', 'valid', ['rule' => 'numeric'])
            ->requirePresence('HoldCity0', 'create')
            ->notEmpty('HoldCity0');

        $validator
            ->add('HoldCity1', 'valid', ['rule' => 'numeric'])
            ->requirePresence('HoldCity1', 'create')
            ->notEmpty('HoldCity1');

        $validator
            ->add('HoldCity2', 'valid', ['rule' => 'numeric'])
            ->requirePresence('HoldCity2', 'create')
            ->notEmpty('HoldCity2');

        $validator
            ->add('Fund', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Fund', 'create')
            ->notEmpty('Fund');

        $validator
            ->add('Material', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Material', 'create')
            ->notEmpty('Material');

        $validator
            ->add('Rep', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Rep', 'create')
            ->notEmpty('Rep');

        $validator
            ->add('DailyCost', 'valid', ['rule' => 'numeric'])
            ->requirePresence('DailyCost', 'create')
            ->notEmpty('DailyCost');

        $validator
            ->add('Peace', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Peace', 'create')
            ->notEmpty('Peace');

        $validator
            ->add('Rank', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Rank', 'create')
            ->notEmpty('Rank');

        $validator
            ->allowEmpty('Tenet');

        $validator
            ->allowEmpty('Symbol');

        $validator
            ->add('CreateTime', 'valid', ['rule' => 'datetime'])
            ->requirePresence('CreateTime', 'create')
            ->notEmpty('CreateTime');

        $validator
            ->add('GroupPurchase', 'valid', ['rule' => 'numeric'])
            ->requirePresence('GroupPurchase', 'create')
            ->notEmpty('GroupPurchase');

        $validator
            ->add('RemainSpreadTimes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('RemainSpreadTimes', 'create')
            ->notEmpty('RemainSpreadTimes');

        $validator
            ->add('Commendation', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Commendation', 'create')
            ->notEmpty('Commendation');

        $validator
            ->allowEmpty('DailyRewardTakenTimes');

        $validator
            ->add('GuildValue1', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('GuildValue1');

        $validator
            ->add('GuildValue2', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('GuildValue2');

        return $validator;
    }

    public function generateNextID() {
        $nextID = 1;
        $found = false;
        $guild = TableRegistry::get('guild');

        $count = 0;
        while(!$found) {
            $search = $guild->find()->where(['ID' => $nextID])->first();
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

    public function upgrade($guildID) {
        $guild = TableRegistry::get('guild');
        $guild->find()->update()
            ->set(['level' => $this->maxLevel])
            ->where(['ID' => $guildID])
            ->execute();
    }

    public function isMaxLevel($guildID) {
        $guild = TableRegistry::get('guild');
        $level = $guild->find()->where(['ID' => $guildID])->extract('Level')->first();
        if ($level == $this->maxLevel) {
            return true;
        } else {
            return false;
        }
    }

    public function getMaxLevel() {
        return $this->maxLevel;
    }
}
