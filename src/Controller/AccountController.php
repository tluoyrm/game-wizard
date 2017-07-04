<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Account Controller
 *
 * @property \App\Model\Table\AccountTable $Account
 */
class AccountController extends AppController {

    public $paginate = array(
        'limit' => 20
    );

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Account->initConnectionParams($id);

        $account = $this->Account->get($id, [
            'contain' => []
        ]);
        $account->ip = $this->Account->getIp();
        $account->mac = $this->Account->getMac();

        if ($this->request->is(['put'])) {

            $this->loadModel('BlackList');
            $this->BlackList->ban($this->request->data['ip_ban'], $account->ip);

            $this->loadModel('BlackMac');
            $this->BlackMac->ban($this->request->data['mac_ban'], $account->mac);

            $this->Flash->success(__('The account common has been saved.'));
            return $this->redirect(['action' => 'edit', $id]);
        }

        $this->set(compact('account'));
        $this->set('_serialize', ['account']);
        $this->set('isIpBanned', $this->Account->isBanIp($id));
        $this->set('isMacBanned', $this->Account->isBanMac($id));
    }
}