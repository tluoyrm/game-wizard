<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\FamilyMemberTable;

/**
 * Family Controller
 *
 * @property \App\Model\Table\FamilyTable $Family
 */
class FamilyController extends AppController
{

    public $paginate = [
        'order' => ['FamilyID' => 'ASC']
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('family', $this->paginate($this->Family));
        $this->set('_serialize', ['family']);
    }

    /**
     * View method
     *
     * @param string|null $id Family id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $family = $this->Family->get($id, [
            'contain' => []
        ]);
        $this->set('family', $family);
        $this->set('_serialize', ['family']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $family = $this->Family->newEntity();

        $this->loadModel('Roledata');
        $roledataList = $this->Roledata->find()->select(['RoleID', 'RoleName'])->order(['RoleName' => 'asc'])->all();
        $roledataItems[] = __('Please select');
        foreach($roledataList as $roledata) {
            $roledataItems[$roledata->RoleID] = $roledata->RoleName;
        }

        if ($this->request->is('post')) {
            $family = $this->Family->patchEntity($family, $this->request->data);
            $family->FamilyID = $this->Family->generateNextID();
            if ($this->Family->save($family)) {
                $familyID = $family->FamilyID;
                $this->Flash->success(__('The family has been saved.'));
                return $this->redirect(['action' => 'edit', $familyID]);
            } else {
                $this->Flash->error(__('The family could not be saved. Please, try again.'));
            }
        }
        $this->set('roledata', $roledataItems);
        $this->set(compact('family'));
        $this->set('_serialize', ['family']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Family id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $family = $this->Family->get($id);

        $this->loadModel('Roledata');
        $roledataList = $this->Roledata->find()->select(['RoleID', 'RoleName'])->order(['RoleName' => 'asc'])->all();
        $roledataItems[] = __('Please select');
        foreach($roledataList as $roledata) {
            $roledataItems[$roledata->RoleID] = $roledata->RoleName;
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $action = (isset($this->request->data['action']) ? $this->request->data['action'] : '');
            if ($action == 'save') {
                $family = $this->Family->patchEntity($family, $this->request->data);
                if ($this->Family->save($family)) {
                    $this->Flash->success(__('The family has been saved.'));
                    return $this->redirect(['action' => 'edit', 'id' => $id]);
                } else {
                    $this->Flash->error(__('The family could not be saved. Please, try again.'));
                }
            } elseif ($action == 'sprite') {
                return $this->redirect(['action' => 'edit_sprite', 'id' => $id]);
            } elseif ($action == 'upgrade') {
                $this->loadModel('FamilySprite');
                $this->FamilySprite->upgrade($id);
                $this->Flash->success(__('The family sprite has been upgraded.'));
                return $this->redirect(['action' => 'edit', 'id' => $id]);
            }
        }
        $this->set('roledata', $roledataItems);
        $this->set(compact('family'));
        $this->set('_serialize', ['family']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Family id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('FamilySprite');
        $family = $this->Family->get($id);
        if ($this->Family->delete($family)) {

            $familySprite = $this->FamilySprite->find()->where(['FamilyID' => $id])->first();
            if ($familySprite) {
                $this->FamilySprite->delete($familySprite);
            }

            $this->Flash->success(__('The family has been deleted.'));
        } else {
            $this->Flash->error(__('The family could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * View FamilySprite method
     *
     * @param string|null $id Family Sprite id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view_sprite($id = null)
    {
        $family = $this->Family->get($id);
        $this->loadModel('FamilySprite');
        $familySprite = $this->FamilySprite->find()->where(['FamilyID' => $id])->first();
        $this->set('id', $id);
        $this->set('name', $family->FamilyName);
        $this->set('familySprite', $familySprite);
        $this->set('_serialize', ['familySprite']);
    }

    /**
     * Edit FamilySprite method
     *
     * @param string|null $id Family Sprite id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit_sprite($id = null)
    {
        $family = $this->Family->get($id);
        $this->loadModel('FamilySprite');
        $familySprite = $this->FamilySprite->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $action = (isset($this->request->data['action']) ? $this->request->data['action'] : '');
            if ($action == 'save') {
                $familySprite = $this->FamilySprite->patchEntity($familySprite, $this->request->data);
                if ($this->FamilySprite->save($familySprite)) {
                    $this->Flash->success(__('The family sprite has been saved.'));
                    return $this->redirect(['action' => 'edit_sprite', 'id' => $id]);
                } else {
                    $this->Flash->error(__('The family sprite could not be saved. Please, try again.'));
                }
            } elseif ($action == 'upgrade') {
                $this->FamilySprite->upgrade($id);
                $this->Flash->success(__('The family sprite has been upgraded.'));
                return $this->redirect(['action' => 'edit_sprite', 'id' => $id]);
            }
        }

        $this->set('id', $id);
        $this->set('name', $family->FamilyName);
        $this->set(compact('familySprite'));
        $this->set('_serialize', ['familySprite']);
    }

    /**
     * Family members list
     * @param $familyID
     */
    public function members($familyID) {
        $family = $this->Family->get($familyID);
        $this->loadModel('AccountCommon');
        $this->loadModel('Roledata');
        $this->loadModel('FamilyMember');
        $this->set('familyID', $familyID);
        $this->set('familyName', $family->FamilyName);
        $this->set('membersCount', $this->FamilyMember->find()->contain(['roledata'])->where(['FamilyMember.FamilyID' => $familyID])->count());
        $this->set('membersList', $this->FamilyMember->find()->contain(['roledata'])->where(['FamilyMember.FamilyID' => $familyID]));
        $this->set('accountCommonList', $this->AccountCommon->find()->order(['AccountName']));
        $this->set('roledataAccountsList', json_encode($this->AccountCommon->getListRoledataAccounts()));
    }

    public function del_member() {
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender = false;
        $this->loadModel('FamilyMember');
        $roleID = $this->request->data('roleID');
        $familyID = $this->request->data('familyID');
        $this->FamilyMember->deleteMember($roleID, $familyID);
        return $this->redirect(['action' => 'members', $familyID]);
    }

    public function addFamilyMember() {
        $this->request->allowMethod(['post', 'patch']);
        $this->autoRender = false;
        $code = 0;
        $familyID = $this->request->data['familyID'];
        $roleID = $this->request->data['roleID'];
        $this->loadModel('FamilyMember');

        if ($this->FamilyMember->find()->where(['RoleID' => $roleID])->first()) {
            $code = 3;
        } elseif($this->FamilyMember->memberExists($roleID, $familyID)) {
            $code = 1;
        } elseif ($this->FamilyMember->membersCount($familyID) >= FamilyMemberTable::MAX_FAMILY_MEMBERS) {
            $code = 2;
        } else {
            $this->FamilyMember->addMember($roleID, $familyID);
            $this->Flash->success(__('The member has been added to the family'));
        }
        echo $code;
    }
}
