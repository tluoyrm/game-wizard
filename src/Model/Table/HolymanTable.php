<?php

namespace App\Model\Table;

use App\Model\Entity\AccountCommon;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Holyman Model
 *
 */
class HolymanTable extends Table
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

        $this->table('holyman');
        $this->primaryKey('SerialNum');
    }

    /**
     * @param $roleID - Roledata ID
     * Get list of holyman from roledata $roleID
     * @return array
     */
    public function getListRoledata($roleID) {
        $holyman = TableRegistry::get('holyman');
        $query = $holyman->find()
            ->select(['cSerialNum' => 'CONVERT (holyman.SerialNum, CHAR)',
                'DevourNum',
                'EquipmentNumber',
                'ToDayDevourNum',
                'EquipSerialIDs',
                'CostHoly',
                'CoValue',
                'HolyDmg',
                'HolyDef',
                'Crit',
                'HolyCritRate',
                'ExDamage',
                'AttackTec',
                'NeglectToughness',
                'HolyValue',
                'MaxDevourNum',
                'typeID' => 'i.TypeID',
                'num' => 'i.Num',
                'Name' => 'item_name.name'
            ])
            ->join([
                'i' => [
                    'table' => 'item',
                    'conditions' => [
                        'i.SerialNum = holyman.SerialNum',
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
        $equip = TableRegistry::get('holyman');
        $query = $equip->find()
            ->select(['cSerialNum' => 'CONVERT (holyman.SerialNum, CHAR)'])
            ->autoFields(true)
            ->hydrate($hydrate)
            ->having(['cSerialNum' => $serialNum]);
        return $query->first();
    }

}