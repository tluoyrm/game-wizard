<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Routing\Router;
use Cake\I18n\Time;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'init'
            ]
        ]);
        $this->DatabaseInitialize();
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $session = $this->request->session();
        $lang = 'en';

        if (isset($this->request->params['lang'])) {
            $lang = $this->request->params['lang'];
        } else {
            if ($session->check('Config.language')) {
                $lang = $session->read('Config.language');

            }
        }

        $session->write('Config.language', $lang);

        // Change current language by post request
        if ($this->request->is('post') && isset($this->request->data['language'])) {
            $newLang = $this->request->data['language'];
            $transUrl = $this->translateUrl($newLang);
            $this->redirect($transUrl);
        }

        $this->set('lang', $lang);
        $this->set('controller', $this->name);

        I18n::locale($lang);
        Time::setToStringFormat('YYYY-MM-dd HH:mm:ss');
        Type::build('datetime')->useLocaleParser();

        $this->Auth->config([
            'unauthorizedRedirect' => false
        ]);
        $this->Auth->allow(['login', 'init']);

        $user = $this->Auth->user();

        if (isset($user)){
            $username = $user['username'];
            $this->set([
                'is_authorized' => true,
                'username'      => $username,
            ]);
        } else {
            $this->set('is_authorized', false);
        }
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) /*&& $user['role'] === 'admin'*/) {
            return true;
        }

        // Default deny
        return false;
    }

    private function translateUrl($newLang) {
        $params = [
            'controller' => $this->request->params['controller'],
            'action'     => $this->request->params['action'],
            'lang'       => $newLang,
            '?'          => $this->request->query
        ];
        if (isset($this->request->params['id'])) {
            $params['id'] = $this->request->params['id'];
        }
        if (isset($this->request->params['slug'])) {
            $params['slug'] = $this->request->params['slug'];
        }

        $transUrl = Router::url($params);

        return $transUrl;
    }

    private function DatabaseInitialize() {
        $conn = ConnectionManager::get('sm_db');
        $db_name = 'wizard_db';
        $queries = [
            "CREATE DATABASE IF NOT EXISTS {$db_name} CHARACTER SET utf8 COLLATE utf8_general_ci",

            "CREATE TABLE IF NOT EXISTS {$db_name}.`users` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `username` varchar(100) DEFAULT NULL,
              `password` varchar(100) DEFAULT NULL,
              `role` varchar(20) DEFAULT NULL,
              `created` datetime DEFAULT NULL,
              `last_login` datetime DEFAULT NULL,
              `last_logout` datetime DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8",

            "CREATE TABLE IF NOT EXISTS {$db_name}.`item_name` (
              `id` double NOT NULL,
              `name` varchar(255) NOT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8",

            "CREATE TABLE IF NOT EXISTS {$db_name}.`equip_name` (
              `id` double NOT NULL,
              `name` varchar(255) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8"
        ];

        foreach($queries as $q) {
            $conn->query($q);
        }
    }

}
