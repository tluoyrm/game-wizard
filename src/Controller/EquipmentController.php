<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * EquipmentCommon Controller
 *
 */
class EquipmentController extends AppController {

    public function start() {
        $this->loadModel('ItemName');
        $this->ItemName->DatabaseInitialize();
        $this->loadModel('EquipName');
        $this->EquipName->DatabaseInitialize();
    }

    /**
     * Allow to find item and his owner by SerialNumber
     * return array
     */
    public function find() {
        $serialNum = $this->request->query['serialNum'];
        $this->set('serialNum', $serialNum);
        $this->loadModel('Item');
        $this->viewClass = 'ajax';
        $this->set('ownersList', $this->Item->findItemOwners($serialNum));
    }

    public function addRoledataEquipment() {
        $db = ConnectionManager::get('sm_db');
        $this->loadModel('Item');
        $this->loadModel('Equip');
        $this->loadModel('Holyequip');
        $this->loadModel('Holyman');
        $this->loadModel('Soulcrystal');

        $serialNum = $this->request->data['serial'];
        $typeID = $this->request->data['typeID'];
        $accountID = $this->request->data['accountID'];
        $roleID = $this->request->data['roleID'];
        $count = $this->request->data['count'];
        $this->autoRender = false;

        $item = $this->Item
            ->find()
            ->autoFields(true)
            ->hydrate(false)
            ->where(['typeID' => $typeID])->first();

        $newSerialNum = $this->Item->getNextSerialNum();

        $newItem = $this->Item->newEntity($item);
        $newItem->set([
            'SerialNum' => 0,
            'AccountID' => $accountID,
            'OwnerID' => $roleID,
            'Num' => $count,
            'TypeID' => $typeID,
            'CreateTime' => $this->getTimeNow()]);

        $newItem = $this->Item->patchEntity($newItem, $newItem->toArray());
        $this->Item->save($newItem);

        $query = "UPDATE item SET SerialNum='{$newSerialNum}' WHERE SerialNum=0";
        $db->query($query);

        foreach($this->Item->getEquipmentTypes() as $type) {
            $linkedEquip = $this->{$type}->findSerial($serialNum, false);
            if ($linkedEquip) {
                $newEquip = $this->{$type}->newEntity($linkedEquip);
                $newEquip->set(['SerialNum' => 0]);
                $this->{$type}->save($newEquip);
                $query = "UPDATE ".strtolower($type)." SET SerialNum='{$newSerialNum}' WHERE SerialNum=0";
                $db->query($query);
            }
        }

        echo json_encode(['SerialNum' => $newSerialNum]);
    }

    public static function getTimeNow() {
        $conn = ConnectionManager::get('sm_db');
        $result = $conn->query('select now()')->fetch();
        return $result[0];
    }

}
