<?php

namespace App\Model\Table;

use App\Model\Entity\AccountCommon;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
* Equip Model
*
*/
class EquipTable extends Table
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

        $this->table('equip');
        //$this->primaryKey('SerialNum');
    }

    /**
     * @param $roleID - Roledata ID
     * Get list of equip from roledata $roleID
     * @return array
     */
    public function getListRoledata($roleID) {
        $equip = TableRegistry::get('equip');
        $query = $equip->find()
            ->select(['cSerialNum' => 'CONVERT (equip.SerialNum, CHAR)',
                'Quality',
                'MinUseLevel',
                'MaxUseLevel',
                'WuHun',
                'MinDmg',
                'MaxDmg',
                'Armor',
                'PotVal',
                'PotValUsed',
                'typeID' => 'i.TypeID',
                'num' => 'i.Num',
                'Name' => 'item_name.name'
            ])
            ->join([
                'i' => [
                    'table' => 'item',
                    'conditions' => [
                        'i.SerialNum = equip.SerialNum',
                    ]
                ]
            ])
            ->join([
                'item_name' => [
                    'table' => 'wizard_db.item_name',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item_name.id = i.TypeID'
                    ]
                ]
            ])
            ->where(['i.OwnerID' => $roleID]);
        return $query;
    }

    public function findSerial($serialNum, $hydrate=true) {
        $equip = TableRegistry::get('equip');
        $query = $equip->find()
            ->select(['cSerialNum' => 'CONVERT (equip.SerialNum, CHAR)'])
            ->autoFields(true)
            ->hydrate($hydrate)
            ->having(['cSerialNum' => $serialNum]);
        return $query->first();
    }
}