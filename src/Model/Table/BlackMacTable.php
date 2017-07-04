<?php

namespace App\Model\Table;

use App\Model\Entity\AccountCommon;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * BlackMac Model
 *
 */
class BlackMacTable extends Table
{
    public static function defaultConnectionName() {
        return 'sm_login';
    }

    /**
     * @param $do boolean
     * @param $mac string
     * Add or delete mac to black mac list by MAC Address
     * if $do = true then it add else it delete
     * @return void
     */
    public function ban($do, $mac) {
        $query = TableRegistry::get('black_mac')->query();
        if ($do == 1) {
            $query->insert(['mac'])
                ->values([
                    'mac' => $mac
                ])->execute();
        } else {
            $query->delete()
                ->where([
                    'mac' => $mac
                ])->execute();
        }
    }
}