<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CommerceRank Controller
 *
 * @property \App\Model\Table\CommerceRankTable $CommerceRank
 */
class CommerceRankController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('commerceRank', $this->paginate($this->CommerceRank));
        $this->set('_serialize', ['commerceRank']);
    }

    /**
     * View method
     *
     * @param string|null $id Commerce Rank id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commerceRank = $this->CommerceRank->get($id);
        $this->set('commerceRank', $commerceRank);
        $this->set('_serialize', ['commerceRank']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guild_id = isset($this->request->query['guild_id']) ? $this->request->query['guild_id'] : 0;
        $commerceRank = $this->CommerceRank->newEntity();
        if ($this->request->is('post')) {
            $commerceRank = $this->CommerceRank->patchEntity($commerceRank, $this->request->data);
            $commerceRank->role_id = $this->CommerceRank->generateNextID();
            if ($this->CommerceRank->save($commerceRank)) {
                $this->Flash->success(__('The commerce rank has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The commerce rank could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('Guild');
        $guilds = $this->Guild->find()->all();
        $guildIds = [];
        foreach($guilds as $guild) {
            $guildIds[$guild->ID] = $guild->ID;
        }

        $this->set('guildIds', $guildIds);
        $this->set('guild_id', $guild_id);
        $this->set(compact('commerceRank'));
        $this->set('_serialize', ['commerceRank']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Commerce Rank id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commerceRank = $this->CommerceRank->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commerceRank = $this->CommerceRank->patchEntity($commerceRank, $this->request->data);
            if ($this->CommerceRank->save($commerceRank)) {
                $this->Flash->success(__('The commerce rank has been saved.'));
                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('The commerce rank could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('commerceRank'));
        $this->set('_serialize', ['commerceRank']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Commerce Rank id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commerceRank = $this->CommerceRank->get($id);
        if ($this->CommerceRank->delete($commerceRank)) {
            $this->Flash->success(__('The commerce rank has been deleted.'));
        } else {
            $this->Flash->error(__('The commerce rank could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
