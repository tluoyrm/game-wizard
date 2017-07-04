<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * LoginLog Controller
 *
 * @property \App\Model\Table\LoginLog $LoginLog
 */
class LoginLogController extends AppController {

    public $paginate = array(
        'limit' => 20
    );

    /**
     * Index method
     *
     * @return void
     */
    public function start() {
        $this->loadModel('AccountCommon');
        $accountCommons = $this->AccountCommon->find()->select(['AccountID', 'AccountName'])->all();
        $accountCommonList[0] = __('Please select');
        foreach($accountCommons as $item) {
            $accountCommonList[$item->AccountID] = $item->AccountName;
        }
        $this->set('accountCommonList', $accountCommonList);
    }

    public function accountLog() {
        $this->viewClass = 'ajax';
        $this->loadModel('AccountCommon');
        $accountID = $this->request->query['accountID'];
        $this->set('accountID', $accountID);
        $this->set('accountName', $this->AccountCommon->get($accountID)->AccountName);
        $this->set('accountLogList', $this->LoginLog->find()->where(['accountID' => $accountID])->order(['time' => 'DESC'])->toArray());
    }

}