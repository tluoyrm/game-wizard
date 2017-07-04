<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ItemTable;
use Cake\Datasource\ConnectionManager;

/**
 * Roledata Controller
 *
 * @property \App\Model\Table\RoledataTable $Roledata
 */
class RoledataController extends AppController
{

    private $genders = [0 => 'Woman', 1 => 'Man'];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'sortWhitelist' => [
                'RoleID', 'RoleName', 'AccountID',  'account_common.AccountName', 'FamilyName', 'Sex', 'GuildID'],
            'contain' => ['account_common'],
            'limit' => 20,
            'order' => ['RoleID' => 'asc']
        ];
        $this->set('roledata', $this->paginate($this->Roledata->getList()));
        $this->set('_serialize', ['roledata']);
    }

    /**
     * View method
     *
     * @param string|null $id Roledata id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roledata = $this->Roledata->getRoledata($id);
        $this->loadModel('Skill');
        $skills = $this->Skill->related_skills($id);
        $this->set('roledata', $roledata);
        $this->set('skills', $skills);
        $this->set('_serialize', ['roledata']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roledata = $this->Roledata->newEntity();

        $this->loadModel('AccountCommon');
        $accountsList = $this->AccountCommon->find()->select(['AccountID', 'AccountName'])->order(['AccountName' => 'asc'])->all();
        $accounts[] = __('Please select');
        foreach($accountsList as $account) {
            $accounts[$account->AccountID] = $account->AccountName;
        }

        $this->loadModel('Family');
        $familyList = $this->Family->find()->order(['FamilyName' => 'asc'])->all();
        $families[] = __('Please select');
        foreach($familyList as $family) {
            $families[$family->FamilyID] = $family->FamilyName;
        }

        $this->loadModel('Guild');
        $guildList = $this->Guild->find()->order(['ID' => 'asc'])->all();
        $guilds[] = __('Please select');
        foreach($guildList as $guild) {
            $guilds[$guild->ID] = $guild->ID;
        }

        if ($this->request->is('post')) {
            $roledata = $this->Roledata->patchEntity($roledata, $this->request->data);
            if ($this->Roledata->save($roledata)) {
                $roleID = $roledata->RoleID;
                $this->Flash->success(__('The roledata has been saved.'));
                return $this->redirect(['action' => 'edit', $roleID]);
            } else {
                $this->Flash->error(__('The roledata could not be saved. Please, try again.'));
            }
        }

        $this->set('accounts', $accounts);
        $this->set('genders', $this->genders);
        $this->set('families', $families);
        $this->set('guilds', $guilds);
        $this->set(compact('roledata'));
        $this->set('_serialize', ['roledata']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Roledata id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roledata = $this->Roledata->getRoledata($id);

        $this->loadModel('Family');
        $familyList = $this->Family->find()->order(['FamilyName' => 'asc'])->all();
        $families[] = __('Please select');
        foreach($familyList as $family) {
            $families[$family->FamilyID] = $family->FamilyName;
        }

        $this->loadModel('Guild');
        $guildList = $this->Guild->find()->order(['ID' => 'asc'])->all();
        $guilds[] = __('Please select');
        foreach($guildList as $guild) {
            $guilds[$guild->ID] = $guild->ID;
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $roledata = $this->Roledata->patchEntity($roledata, $this->request->data);
            if ($this->Roledata->save($roledata)) {
                $this->Flash->success(__('The roledata has been saved.'));
                return $this->redirect(['action' => 'edit', 'id' => $id]);
            } else {
                $this->Flash->error(__('The roledata could not be saved. Please, try again.'));
            }
        }
        $this->set('genders', $this->genders);
        $this->set('families', $families);
        $this->set('guilds', $guilds);
        $this->set(compact('roledata'));
        $this->set('_serialize', ['roledata']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Roledata id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('Item');
        $this->loadModel('FamilyMember');
        $this->loadModel('PetData');
        $this->request->allowMethod(['post', 'delete']);

        $roledata = $this->Roledata->get($id);
        if ($this->Roledata->delete($roledata)) {

            /* список всех вещей привязанных к персонажу */
            $itemList = $this->Item->find()
                ->select(['TypeID'])
                ->where(['OwnerID' => $id])
                ->all();

            if (count($itemList)) {
                foreach($itemList as $item) {
                    $this->Item->deleteItems($item->TypeID);
                }
            }

            /* список семей, привязанных к персонажу */
            $familyList = $this->FamilyMember->find()
                ->select(['RoleID', 'FamilyID'])
                ->where(['RoleID' => $id])
                ->all();

            if (count($familyList)) {
                foreach($familyList as $member) {
                    $this->FamilyMember->deleteMember($member->RoleID, $member->FamilyID);
                }
            }

            /* список петомцев, привязанных к персонажу */
            $petList = $this->PetData->find()
                ->select(['pet_id'])
                ->where(['master_id' => $id])
                ->all();

            if (count($petList)) {
                foreach($petList as $pet) {
                    $petData = $this->PetData->get($pet->pet_id);
                    $this->PetData->delete($petData);
                }
            }

            $this->Flash->success(__('The roledata has been deleted.'));
        } else {
            $this->Flash->error(__('The roledata could not be deleted. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }

    public function equipment_item($id, $slug=null) {
        $this->paginate = [
            'sortWhitelist' => [
                'SerialNum', 'TypeID', 'Num', 'EquipType'
            ],
            'order' => ['SerialNum' => 'asc']
        ];

        $this->loadModel('ItemName');
        $this->ItemName->DatabaseInitialize();
        $this->loadModel('EquipName');
        $this->EquipName->DatabaseInitialize();

        $this->loadModel('Item');
        $this->loadModel('AccountCommon');
        $this->loadModel('Roledata');

        $sort = $this->request->query('sort');
        $direction = $this->request->query('direction');
        $hiddenDirection = 'desc';
        if ($sort == 'EquipType') {
            $hiddenDirection = $direction;
        }

        $equipType = $slug;

        $this->set('id', $id);
        $this->set('accountID', $this->Roledata->getRoledataInfo($id)->AccountID);
        $this->set('accountName', $this->Roledata->getRoledataInfo($id)->AccountName);
        $this->set('roleName', $this->Roledata->getRoledataInfo($id)->RoleName);
        $this->set('itemList', $this->paginate($this->Item->getListRoledata($id, ['equipType' => $equipType])));
        $this->set('itemListCount', $this->Item->getListRoledata($id, ['equipType' => $equipType])->count());
        $this->set('accountCommonList', $this->AccountCommon->find()->order(['AccountName']));
        $this->set('roledataAccountsList', json_encode($this->AccountCommon->getListRoledataAccounts()));
        $this->set('equipTypes', $this->Item->getEquipmentTypes());
        $this->set('selectedEquipType', $equipType);
        $this->set('direction', $direction);
        $this->set('hiddenDirection', $hiddenDirection);
        $this->set('_serialize', ['itemList']);
    }

    public function del_equip() {
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender = false;
        $this->loadModel('Item');
        $serialNum = $this->request->data('serial');
        $type = $this->request->data('type');
        $typeID = $this->request->data('typeid');
        $roleID = $this->request->data('roleid');
        $base = $this->request->data('base');

        $db = ConnectionManager::get('sm_db');
        $del = "DELETE FROM item WHERE SerialNum='{$serialNum}'";
        $db->query($del);

        if ($type != ItemTable::EQUIP_UNDEFINED) {
            $del_equip = "DELETE FROM ".strtolower($type)." WHERE SerialNum='{$serialNum}'";
            $db->query($del_equip);
        }
        if ($type == ItemTable::EQUIP_UNDEFINED) {
            $type = 'all';
        }
        $this->Flash->success(__("The equipment has been deleted."));
        return $this->redirect(['action' => 'equipment_item', 'id' => $roleID, 'slug' => $type]);
    }

    public function edit_equipment() {
        $db = ConnectionManager::get('sm_db');
        $type = $this->request->query['type'];
        $serial = $this->request->query['serial'];
        $roleID = $this->request->query['roleID'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['SerialNum'] = $this->request->data['cSerialNum'];
            unset($this->request->data['cSerialNum']);

            $this->loadModel($type);
            $equip = $this->{$type}->findSerial($serial, false);
            $equipCopy = $this->{$type}->newEntity($equip);
            $equipCopy->set($this->request->data);
            $equipCopy->set(['SerialNum' => 0]);
            $equipCopy = $this->{$type}->patchEntity($equipCopy, $equipCopy->toArray());

            if ($this->{$type}->save($equipCopy)) {
                $query = "DELETE FROM ".strtolower($type)." WHERE SerialNum='".$serial."'";
                $db->query($query);
                $query = "UPDATE ".strtolower($type)." SET SerialNum='".$serial."' WHERE SerialNum=0";
                $db->query($query);
                $this->Flash->success(__("The {$type} has been saved."));
                return $this->redirect(['action' => 'edit_equipment', '?' => ['type' =>$type, 'serial' => $serial, 'roleID' => $roleID]]);
            } else {
                $this->Flash->error(__("The {$type} could not be saved. Please, try again."));
            }
        }

        $this->loadModel($type);
        $oEquip = $this->{$type}->findSerial($serial, true);
        $aEquip = $this->{$type}->findSerial($serial, false);
        $this->set('oEquip', $oEquip);
        $this->set('aEquip', $aEquip);
        $this->set('type', $type);
        $this->set('roleID', $roleID);
        $this->set('accountID', $this->Roledata->getRoledataInfo($roleID)->AccountID);
        $this->set('accountName', $this->Roledata->getRoledataInfo($roleID)->AccountName);
        $this->set('roleName', $this->Roledata->getRoledataInfo($roleID)->RoleName);
        $this->set('serial', $serial);
    }

    public function nurslings($id) {
        $this->loadModel('PetData');
        $this->set('id', $id);
        $this->set('accountID', $this->Roledata->getRoledataInfo($id)->AccountID);
        $this->set('accountName', $this->Roledata->getRoledataInfo($id)->AccountName);
        $this->set('roleName', $this->Roledata->getRoledataInfo($id)->RoleName);
        $this->set('nurslings', $this->PetData->getNurslings($id));
    }

    public function related_skills($id) {
        $this->loadModel('Skill');
        if ($this->request->is('post')) {
            $action = (isset($this->request->data['action']) ? $this->request->data['action'] : '');
            if ($action == 'save') {
                $skills = $this->request->data['skills'];
                $errors = [];
                foreach($skills as $skillID => $obj) {
                    $skill = $this->Skill->find()->where(['RoleID' => $id, 'ID' => $skillID])->first();
                    $skill = $this->Skill->patchEntity($skill, $obj);
                    if ($skill->errors()) {
                        $errors[$skillID] = $skill->errors();
                    } else {
                        $this->Skill->save($skill);
                    }
                }
                if (!$errors) {
                    $this->Flash->success(__('The skills was updated.'));
                    $this->redirect(['action' => 'related_skills', $id]);
                } else {
                    $error_messages = __('input errors').': ';
                    foreach($errors as $key => $errors) {
                        $error_messages .= '#'.$key.' ';
                    }
                    $this->Flash->error($error_messages);
                }
            } elseif ($action == 'upgrade') {
                $this->upgrade($id);
                $this->Flash->success(__('The roledata skills was upgraded.'));
                $this->redirect(['action' => 'related_skills', $id]);
            }
        }
        $this->set('roleID', $id);
        $skills = $this->Skill->related_skills($id);
        $this->set('skills', $skills);
    }

    private function upgrade($roleID) {
        $this->loadModel('Skill');
        $this->Skill->upgrade($roleID);
    }

}
