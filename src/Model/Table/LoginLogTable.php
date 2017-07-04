<?php

namespace App\Model\Table;

use App\Model\Entity\AccountCommon;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * LoginLog Model
 *
 */
class LoginLogTable extends Table
{
    public static function defaultConnectionName() {
        return 'sm_login';
    }

    /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('login_log');
    }
}