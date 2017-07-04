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
 * Itam Model
 *
 */
class ItemTable extends Table{

    const EQUIP_EQUIP = 'Equip';
    const EQUIP_HOLYEQUIP = 'Holyequip';
    const EQUIP_HOLYMAN = 'Holyman';
    const EQUIP_SOULCRYSTAL = 'Soulcrystal';
    const EQUIP_UNDEFINED = 'undefined';

    private $searchFields = ['SerialNum'];

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

        $this->table('item');
        $this->primaryKey('SerialNum');
        $this->belongsTo('account_common', [
            'className' => 'AccountCommon',
            'foreignKey' => 'AccountID',
            'joinType'  => 'INNER'
        ]);
    }

    /**
     * @param $roleID - Roledata ID
     * Get list of item from roledata $roleID
     * @return array
     */
    public function getListRoledata($roleID, $params=null) {
        $item = TableRegistry::get('item');
        $query = $item->find()
            ->select(['cSerialNum' => 'CONVERT (item.SerialNum, CHAR)',
                'Num', 'TypeID', 'Bind', 'CreateTime', 'del_time',
                'Name' => "IF(item_name.name <> '', item_name.name, equip_name.name)"]);
        if (!isset($params['equipType']) || (isset($params['equipType']) && $params['equipType']=='all')) {
            $query->select([
                'EquipType' =>
                "CASE
                WHEN soulcrystal.SerialNum IS NOT NULL THEN 'Soulcrystal'
                WHEN holyequip.SerialNum IS NOT NULL THEN 'Holyequip'
                WHEN holyman.SerialNum IS NOT NULL THEN 'Holyman'
                WHEN equip.SerialNum IS NOT NULL THEN 'Equip'
                ELSE 'undefined'
                END"
            ]);
        }
        $query->join([
                'item_name' => [
                    'table' => 'wizard_db.item_name',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item_name.id = item.TypeID'
                    ]
                ]
            ]);
        $query->join([
            'equip_name' => [
                'table' => 'wizard_db.equip_name',
                'type'  => 'LEFT',
                'conditions' => [
                    'equip_name.id = item.TypeID'
                ]
            ]
        ]);

        if (isset($params['equipType']) && $params['equipType'] && $params['equipType']!='all') {
            $equipType = $params['equipType'];
            $query->join([
                $equipType => [
                    'table' => $equipType,
                    'conditions' => [
                        'item.SerialNum = '.$equipType.'.SerialNum',
                    ]
                ]
            ]);
        } else {
           $query->join([
                'equip' => [
                    'table' => 'equip',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = equip.SerialNum',
                    ]
                ]
            ])
            ->join([
                'holyequip' => [
                    'table' => 'holyequip',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = holyequip.SerialNum',
                    ]
                ]
            ])
            ->join([
                'holyman' => [
                    'table' => 'holyman',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = holyman.SerialNum',
                    ]
                ]
            ])
            ->join([
                'soulcrystal' => [
                    'table' => 'soulcrystal',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = soulcrystal.SerialNum',
                    ]
                ]
            ]);
        }

        $query->where(['OwnerID' => $roleID]);
        return $query;
    }

    public function getEquipmentTypes() {
        return [ItemTable::EQUIP_EQUIP,
            ItemTable::EQUIP_HOLYEQUIP,
            ItemTable::EQUIP_HOLYMAN,
            ItemTable::EQUIP_SOULCRYSTAL];
    }

    /**
     * @param $serialNum
     * Get array of equipment owners
     * @return array
     */
    public function findItemOwners($serialNum) {
        $item = TableRegistry::get('item');
        $result = $item->find()
            ->select(['cSerialNum' => 'CONVERT (item.SerialNum, CHAR)',
                'Num', 'TypeID',
                'AccountID', 'AccountName' => 'a.AccountName', 'OwnerID', 'RoleName' => 'r.RoleName',
                'EquipType' =>
                    "CASE
                    WHEN soulcrystal.SerialNum IS NOT NULL THEN 'Soulcrystal'
                    WHEN holyequip.SerialNum IS NOT NULL THEN 'Holyequip'
                    WHEN holyman.SerialNum IS NOT NULL THEN 'Holyman'
                    WHEN equip.SerialNum IS NOT NULL THEN 'Equip'
                    ELSE 'undefined'
                    END"
            ])
            ->join([
                'a' => [
                    'table' => 'account_common',
                    'conditions' => [
                        'a.AccountID = item.AccountID',
                    ]
                ]
            ])
            ->join([
                'r' => [
                    'table' => 'roledata',
                    'conditions' => [
                        'r.RoleID = item.OwnerID'
                    ]
                ]
            ])
            ->join([
                'equip' => [
                    'table' => 'equip',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = equip.SerialNum',
                    ]
                ]
            ])
            ->join([
                'holyequip' => [
                    'table' => 'holyequip',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = holyequip.SerialNum',
                    ]
                ]
            ])
            ->join([
                'holyman' => [
                    'table' => 'holyman',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = holyman.SerialNum',
                    ]
                ]
            ])
            ->join([
                'soulcrystal' => [
                    'table' => 'soulcrystal',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'item.SerialNum = soulcrystal.SerialNum',
                    ]
                ]
            ])
            ->having(['cSerialNum' => $serialNum])
            ->toArray();

        if (count($result)) {
            $item_name = TableRegistry::get('item_name')->find();
            $equip_name = TableRegistry::get('equip_name')->find();

            foreach($result as $k=>$row) {
                $result[$k]->Name = '-';

                if ($row->EquipType == 'Equip') {
                    $equip_find = $equip_name->select()->where(['id' => $row->TypeID])->first();
                    if ($equip_find) {
                        $result[$k]->Name = $equip_find->name;
                    }
                } elseif ($row->EquipType == 'Item') {
                    $item_find = $item_name->select()->where(['id' => $row->TypeID])->first();
                    if ($item_find) {
                        $result[$k]->Name = $item_find->name;
                    }
                }
            }
        }
        return $result;
    }

    public function getNextSerialNum() {
        $item = TableRegistry::get('item');
        $list = $item->find()
            ->select(['cSerialNum' => 'CONVERT (SerialNum, CHAR)'])->toArray();

        $values = [];
        foreach($list as $elem) {
            $parts = explode("000", $elem->cSerialNum);
            if (isset($parts[1])) {
                $values[] = $parts[1];
            }
        }

        $next = max($values);
        $next++;
        $result = '5000'.(string)$next;
        return $result;
    }

    /**
     * Delete items and all linked equips
     * @param $typeID
     */
    public function deleteItems($typeID) {
        $db = ConnectionManager::get('sm_db');
        $item_entity = TableRegistry::get('item');

        //список все item у которых TypeID = $typeID
        $itemList = $item_entity->find()
            ->select(['cSerialNum' => 'CONVERT (SerialNum, CHAR)'])
            ->where(['TypeID' => $typeID])->all();

        if (count($itemList)) {
            foreach($itemList as $itemInfo) {
                $itemSerialNum = $itemInfo->cSerialNum;
                foreach($this->getEquipmentTypes() as $type) {
                    $table = strtolower($type);
                    $entity = TableRegistry::get($table);
                    $equip = $entity->find()
                        ->select(['cSerialNum' => 'CONVERT (SerialNum, CHAR)'])
                        ->having(['cSerialNum' => $itemSerialNum]);
                    if ($equip) {
                        $del = "DELETE FROM {$table} WHERE SerialNum='{$itemSerialNum}'";
                        $db->query($del);
                    }
                }
            }
        }
        $query = TableRegistry::get('item')->query();
        $query->delete()->where(['TypeID' => $typeID])->execute();
    }

    public function getSearchFields() {
        return $this->searchFields;
    }
}