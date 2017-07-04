<?php
namespace App\Model\Table;

use App\Model\Entity\Skill;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Skill Model
 *
 */
class SkillTable extends Table
{

    public static function defaultConnectionName()
    {
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

        $this->table('skill');
        $this->displayField('RoleID');
        $this->primaryKey(['RoleID', 'ID']);

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
            ->add('RoleID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('RoleID', 'create');

        $validator
            ->add('ID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ID', 'create');

        $validator
            ->add('BiddenLevel', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BiddenLevel', 'create')
            ->notEmpty('BiddenLevel');

        $validator
            ->add('SelfLevel', 'valid', ['rule' => 'numeric'])
            ->requirePresence('SelfLevel', 'create')
            ->notEmpty('SelfLevel');

        $validator
            ->add('Proficiency', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Proficiency', 'create')
            ->notEmpty('Proficiency');

        $validator
            ->add('CoolDown', 'valid', ['rule' => 'numeric'])
            ->requirePresence('CoolDown', 'create')
            ->notEmpty('CoolDown');

        $validator
            ->add('active_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('active_time');

        return $validator;
    }

    public function related_skills($roleID)
    {
        $skills = TableRegistry::get('skill');
        $result = $skills->find()->where(['RoleID' => $roleID])->all();
        return $result;
    }

    public function upgrade($roleID)
    {
        $db = ConnectionManager::get('sm_db');
        $queries = [
            'delete from skill where ID in (30001,30003,30006,30007,30004,30002,30005,30008,30009,30010,30101,30102,30104,30103,30107,30108,30110,30109,30106,30105,30201,30202,30203,30204,30205,30206,30207,30208,30209,30210,30301,30302,30303,30304,30305,30306,30307,30308,30309,30310,30401,30403,30402,30404,30408,30410,30406,30409,30412,30413,30501,30502,30503,30504,30505,30506,30507,30508,30509,30510) and RoleID = '.$roleID,
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30001,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30003,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30006,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30007,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30004,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30002,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30005,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30008,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30009,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30010,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30101,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30102,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30104,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30103,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30107,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30108,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30110,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30109,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30106,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30105,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30201,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30202,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30203,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30204,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30205,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30206,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30207,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30208,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30209,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30210,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30301,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30302,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30303,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30304,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30305,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30306,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30307,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30308,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30309,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30310,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30401,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30403,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30402,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30404,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30408,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30410,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30406,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30409,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30412,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30413,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30501,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30502,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30503,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30504,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30505,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30506,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30507,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30508,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30509,0,10,0,0,0)',
            'insert into skill (RoleID,ID,BiddenLevel,SelfLevel,Proficiency,CoolDown,active_time) values ('.$roleID.',30510,0,10,0,0,0)',
        ];
        foreach($queries as $q) {
            $db->query($q);
        }
    }
}
