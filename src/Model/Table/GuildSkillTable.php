<?php
namespace App\Model\Table;

use App\Model\Entity\GuildSkill;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * GuildSkill Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Guilds
 * @property \Cake\ORM\Association\BelongsTo $Skills
 */
class GuildSkillTable extends Table
{

    private $upgradedSkills = [
        [
            'skill_id' => 40001,
            'level' => 11
        ],
        [
            'skill_id' => 40002,
            'level' => 7
        ],
        [
            'skill_id' => 40003,
            'level' => 11
        ],
        [
            'skill_id' => 40004,
            'level' => 7
        ],
        [
            'skill_id' => 40005,
            'level' => 11
        ],
        [
            'skill_id' => 40006,
            'level' => 7
        ],
        [
            'skill_id' => 40007,
            'level' => 11
        ],
        [
            'skill_id' => 40008,
            'level' => 11
        ],
        [
            'skill_id' => 40010,
            'level' => 7
        ],
        [
            'skill_id' => 40011,
            'level' => 7
        ],
        [
            'skill_id' => 90003,
            'level' => 4
        ],
    ];

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

        $this->table('guild_skill');
        $this->primaryKey(['guild_id', 'skill_id']);
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
            ->add('progress', 'valid', ['rule' => 'numeric'])
            ->requirePresence('progress', 'create')
            ->notEmpty('progress');

        $validator
            ->add('level', 'valid', ['rule' => 'numeric'])
            ->requirePresence('level', 'create')
            ->notEmpty('level')
            ->add('level', 'format', [
                'rule' => array('custom', '/^[0-9]\d*$/'),
                'message' => __('Please enter a valid level')
            ]);

        $validator
            ->add('researching', 'valid', ['rule' => 'boolean'])
            ->requirePresence('researching', 'create')
            ->notEmpty('researching');

        $validator
            ->add('active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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

    public function generateNextSkillID() {
        $nextID = 1;
        $found = false;
        $guildSkill = TableRegistry::get('guild_skill');

        $count = 0;
        while(!$found) {
            $search = $guildSkill->find()->where(['skill_id' => $nextID])->first();
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

    public function upgradeGuildSkills($guildID) {
        $guildSkill = TableRegistry::get('guild_skill');
        foreach($this->upgradedSkills as $skill_info) {
            $guildSkill->find()->update()
                ->set(['level' => $skill_info['level']])
                ->where(['guild_id' => $guildID, 'skill_id' => $skill_info['skill_id']])
                ->execute();
        }
    }
}
