<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\GuildSkillTable;
use Cake\Datasource\ConnectionManager;

/**
 * Guild Controller
 *
 * @property \App\Model\Table\GuildTable $Guild
 */
class GuildController extends AppController
{

    public $paginate = [
        'order' => ['ID' => 'ASC']
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('guild', $this->paginate($this->Guild));
        $this->set('_serialize', ['guild']);
    }

    /**
     * View method
     *
     * @param string|null $id Guild id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guild = $this->Guild->get($id, [
            'contain' => ['GuildSkill', 'City', 'CommerceRank']
        ]);
        $this->set('guild', $guild);
        $this->set('_serialize', ['guild']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guild = $this->Guild->newEntity();
        if ($this->request->is('post')) {
            $guild = $this->Guild->patchEntity($guild, $this->request->data);
            $guild->ID = $this->Guild->generateNextID();
            if ($guild->ID > 0 && $this->Guild->save($guild)) {
                $this->Flash->success(__('The guild has been saved.'));
                return $this->redirect(['action' => 'edit', $guild->ID]);
            } else {
                $this->Flash->error(__('The guild could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('guild'));
        $this->set('_serialize', ['guild']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Guild id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $guild = $this->Guild->get($id, [
            'contain' => ['GuildSkill']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $action = (isset($this->request->data['action']) ? $this->request->data['action'] : '');
            if ($action == 'save') {
                $guild = $this->Guild->patchEntity($guild, $this->request->data);
                if ($this->Guild->save($guild)) {
                    $this->Flash->success(__('The guild has been saved.'));
                    return $this->redirect(['action' => 'edit', $id]);
                } else {
                    $this->Flash->error(__('The guild could not be saved. Please, try again.'));
                }
            } elseif ($action == 'upgrade') {
                if ($this->upgrade($id)) {
                    $this->Flash->success(__('The guild was upgraded.'));
                    $this->redirect(['action' => 'edit', $id]);
                } else {
                    $this->Flash->error(__('This guild is upgraded already.'));
                }
            }
        }

        $skills = $this->Guild->GuildSkill->find()->where(['guild_id' => $guild->ID]);
        $skill_ids = [];
        foreach($skills as $skill) {
            $skill_ids[] = $skill->skill_id;
        }
        $this->set(compact('guild', 'skill_ids'));
        $this->set('_serialize', ['guild']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Guild id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('GuildSkill');
        $this->loadModel('City');
        $this->loadModel('CommerceRank');
        $this->loadModel('Roledata');

        $this->request->allowMethod(['post', 'delete']);
        $guild = $this->Guild->get($id);
        if ($this->Guild->delete($guild)) {

            $this->Guild->GuildSkill->deleteAll(['guild_id' => $id]);

            $cities = $this->City->find()->where(['guild_id' => $id]);
            foreach($cities as $city) {
                $this->City->delete($city);
            }
            $commerceRanks = $this->CommerceRank->find()->where(['guild_id' => $id]);

            $this->Roledata->resetGuildID($id);

            foreach($commerceRanks as $commerceRank) {
                $this->CommerceRank->delete($commerceRank);
            }

            $this->Flash->success(__('The guild has been deleted.'));
        } else {
            $this->Flash->error(__('The guild could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function add_skill($guildID) {
        $this->loadModel('GuildSkill');
        $guildSkill = $this->GuildSkill->newEntity();
        $guildSkill->skill_id = $this->GuildSkill->generateNextSkillID();
        if ($this->request->is('post')) {
            $guildSkill = $this->GuildSkill->patchEntity($guildSkill, $this->request->data);
            $guildSkill->guild_id = $guildID;
            if ($guildSkill->skill_id > 0 && $this->GuildSkill->save($guildSkill)) {
                $this->Flash->success(__('The guildSkill has been saved.'));
                return $this->redirect(['action' => 'related_skills', $guildID]);
            } else {
                $this->Flash->error(__('The guildSkill could not be saved. Please, try again.'));
            }
        }

        $this->set('guildID', $guildID);
        $this->set(compact('guildSkill'));
        $this->set('_serialize', ['guildSkill']);
    }

    public function edit_skill() {
        $skillID = $this->request->query['skill_id'];
        $guildID = $this->request->query['guild_id'];
        $this->loadModel('GuildSkill');
        $guildSkill = $this->GuildSkill->find()->where(['guild_id' => $guildID, 'skill_id' => $skillID])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $guildSkill = $this->GuildSkill->patchEntity($guildSkill, $this->request->data);
            if ($this->GuildSkill->save($guildSkill)) {
                $this->Flash->success(__('The guild skill has been saved.'));
                return $this->redirect(['action' => 'related_skills', $guildID]);
            } else {
                $this->Flash->error(__('The guild skill could not be saved. Please, try again.'));
            }
        }
        $this->set('guildID', $guildID);
        $this->set(compact('guildSkill'));
        $this->set('_serialize', ['guildSkill']);
    }

    public function delete_skill() {
        $skillID = $this->request->query['skill_id'];
        $guildID = $this->request->query['guild_id'];
        $this->loadModel('GuildSkill');
        $this->request->allowMethod(['post', 'delete']);
        $guildSkill = $this->GuildSkill->find()->where(['guild_id' => $guildID, 'skill_id' => $skillID])->first();
        if ($this->GuildSkill->delete($guildSkill)) {
            $this->Flash->success(__('The guildSkill has been deleted.'));
        } else {
            $this->Flash->error(__('The guildSkill could not be deleted. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }

    public function related_skills($id) {
        $this->loadModel('GuildSkill');
        if ($this->request->is('post')) {
            $action = (isset($this->request->data['action']) ? $this->request->data['action'] : '');
            if ($action == 'save') {
                $data = $this->request->data['guild_skills'];
                $errors = [];
                foreach($data as $skill_id => $obj) {
                    $guildSkill = $this->GuildSkill->find()->where(['guild_id' => $obj['guild_id'], 'skill_id' => $skill_id])->first();
                    $guildSkill = $this->GuildSkill->patchEntity($guildSkill, $obj);
                    if ($guildSkill->errors()) {
                        $errors[$skill_id] = $guildSkill->errors();
                    } else {
                        $this->GuildSkill->save($guildSkill);
                    }
                }
                if (!$errors) {
                    $this->Flash->success(__('The guild skills was updated.'));
                    $this->redirect(['action' => 'related_skills', $id]);
                } else {
                    $error_messages = __('input errors').': ';
                    foreach($errors as $key => $errors) {
                        $error_messages .= '#'.$key.' ';
                    }
                    $this->Flash->error($error_messages);
                }
            } elseif($action == 'upgrade') {
                if ($this->upgrade($id)) {
                    $this->Flash->success(__('The guild was upgraded.'));
                    $this->redirect(['action' => 'related_skills', $id]);
                } else {
                    $this->Flash->error(__('This guild is upgraded already.'));
                }
            }
        }

        $skills = $this->Guild->GuildSkill->find()->where(['guild_id' => $id]);
        $this->set('skills', $skills);
        $this->set('_serialize', ['skills']);
        $this->set('guildID', $id);
    }

    private function upgrade($guildID) {
        $this->loadModel('GuildSkill');
        $this->loadModel('GuildUpgrade');
        if (!$this->Guild->isMaxLevel($guildID)) {
            $this->Guild->upgrade($guildID);
            $this->GuildSkill->upgradeGuildSkills($guildID);
            $this->GuildUpgrade->upgrade($guildID);
            return true;
        } else {
            return false;
        }
    }

    public function related_cities($id) {
        $cities = $this->Guild->City->find()->where(['guild_id' => $id]);
        $this->set('cities', $this->paginate($cities));
        $this->set('_serialize', ['cities']);
        $this->set('guildID', $id);
    }

    public function related_commerce_rank($id) {
        $commerceRanks = $this->Guild->CommerceRank->find()->where(['guild_id' => $id]);
        $this->set('commerceRanks', $this->paginate($commerceRanks));
        $this->set('_serialize', ['commerceRanks']);
        $this->set('guildID', $id);
    }

    public function members($id) {
        $this->loadModel('AccountCommon');
        $this->loadModel('Roledata');
        $roledataList = $this->Roledata->find()->where(['GuildID' => $id]);
        $this->set('roledataList', $this->paginate($roledataList));
        $this->set('_serialize', ['roledataList']);
        $this->set('accountCommonList', $this->AccountCommon->find()->order(['AccountName']));
        $this->set('roledataAccountsList', json_encode($this->AccountCommon->getListRoledataAccounts()));
        $this->set('guildID', $id);
    }

    public function addGuildMember() {
        $this->loadModel('Roledata');
        $this->autoRender = false;
        $guildID = $this->request->data['guildID'];
        $roleID = $this->request->data['roleID'];
        $roledata = $this->Roledata->get($roleID);
        $roledata->GuildID = $guildID;
        $this->Roledata->save($roledata);
        $this->Flash->success(__('The member has been added to the guild'));
    }

}
