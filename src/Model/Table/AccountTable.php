<?php

namespace App\Model\Table;

use App\Model\Entity\AccountCommon;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Account Model
 *
 */
class AccountTable extends Table
{

    private $ip;
    private $mac;

    public static function defaultConnectionName() {
        return 'sm_login';
    }

    /**
     * @param $id integer
     * Initialize connection data by login_log table
     * return void
     */
    public function initConnectionParams($id) {
        $account = TableRegistry::get('account');
        $query = $account->find()
            ->select(['id', 'l.ip', 'l.mac'])
            ->join([
                'l' => [
                    'table' => 'sm_login.login_log',
                    'conditions' => [
                        'l.accountID = account.id',
                        'l.time = (SELECT MAX(time) FROM sm_login.login_log WHERE accountID=account.id)']
                ]
            ])
            ->where(['id' => $id])->first();
        $this->ip = $query->l['ip'];
        $this->mac = $query->l['mac'];
    }

    public function isBanMac() {
        $result = TableRegistry::get('black_mac')->find()
            ->where(['mac'=>$this->mac])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function isBanIp() {
        $result = TableRegistry::get('black_list')->find()
            ->where(['ip'=>$this->ip])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getIp() {
        return $this->ip;
    }

    public function getMac() {
        return $this->mac;
    }

}