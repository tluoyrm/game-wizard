<?php

namespace App\Model\Table;

use App\Model\Entity\AccountCommon;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * BlackList Model
 *
 */
class BlackListTable extends Table
{
    public static function defaultConnectionName() {
        return 'sm_login';
    }

    /**
     * @param $do boolean
     * @param $ip string
     * Add or delete ip to black list by IP Address
     * if $do = true then it add else it delete
     * @return void
     */
    public function ban($do, $ip) {
        $query = TableRegistry::get('black_list')->query();
        if ($do == 1) {
            $query->insert(['ip'])
                ->values([
                    'ip' => $ip
                ])->execute();
        } else {
            $query->delete()
                ->where([
                    'ip' => $ip
                ])->execute();
        }
    }
}