<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use DateTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    private $availableTimeStart;
    private $availableTimeEnd;
    private $keyFilePath;
    private $keyFile;

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }

    /**
     * View method
     *
     * @param string|null $id Users id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->created = EquipmentController::getTimeNow();
            $user->last_login = EquipmentController::getTimeNow();
            if ($this->Users->save($user)) {
                $user = $this->Auth->identify();
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Unable to add the user.'));
        }

        $this->set('roleOptions', $this->getRoleOptions(true));
        $this->set('user', $user);
    }

    public function login()
    {

        if (!UsersController::checkAuthInfo()) {
            $this->redirect(['action' => 'init']);
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                $user_id = $this->Auth->user('id');
                $user = $this->Users->get($user_id);
                $user->last_login = EquipmentController::getTimeNow();
                $this->Users->save($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);
        $user->last_logout = EquipmentController::getTimeNow();
        $this->Users->save($user);

        return $this->redirect($this->Auth->logout());
    }

    public function profile() {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);
        $this->set('user', $user);
    }

    public function settings() {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User settings changed successfully'));
                return $this->redirect(['controller' => 'Users', 'action' => 'settings']);
            } else {
                $this->Flash->error(__('User settings change error'));
            }
        }

        $this->set('username', $user->username);
        $this->set('roleOptions', $this->getRoleOptions());
        $this->set('user', $user);
    }

    public function getRoleOptions($withEmpty = false) {
        $roleOptions = [
            'admin' => __('Admin'),
            'view'  => __('View')
        ];

        if ($withEmpty) {
            $result = array_merge(['empty' => __('Please select')], $roleOptions);
            return $result;
        }

        return $roleOptions;
    }

    public function init() {

        $this->setKeyFilePath();
        /************/
//        $this->setCurrentTime();
        /*****/
        $this->setAvailableTime('1459876472');

        if ($this->checkAuthInfo()) {
            return $this->redirect(['action' => 'login']);
        }

        if ($this->request->is(['post'])) {
            $secret = $this->request->data['secret'];
            if (!preg_match('/^[a-z0-9_]+$/i', $secret) || strlen($secret)<5) {
                $this->Flash->error(__('Secret word is invalid. Try again'));
            } else {
                //if ($this->currentTimeAvailable()) {
                    if ($this->setAuthInfo($secret)) {
                        return $this->redirect(['controller' => 'Home', 'action' => 'index']);
                    } else {
                        $this->Flash->error(__('Authorization write error.'));
                    }
//                } else {
//                    $this->Flash->error(__('Authorization timeout error.'));
//                }
            }
        }
    }

    private function setAvailableTime($start) {
        $this->availableTimeStart = new DateTime();
        $this->availableTimeStart->setTimestamp($start);
        $this->availableTimeEnd = new DateTime();
        $this->availableTimeEnd->setTimestamp($start);
        $this->availableTimeEnd->modify('+ 20 minutes');
    }

    private function currentTimeAvailable() {
        $time = new DateTime(EquipmentController::getTimeNow());
        if ($time > $this->availableTimeStart && $time < $this->availableTimeEnd){
            return true;
        } else {
            return false;
        }
    }

    private function setAuthInfo($secret) {
        $result = true;

        if ($this->setSecretFile($secret)) {
            $this->insertSecretData($secret);
        } else {
            $result = false;
        }

        return $result;
    }

    public static function checkAuthInfo() {
        $result = false;

        UsersController::prepareDatabase();
        $db_value = UsersController::getSecretDatabase();
        $file_value = UsersController::getSecretFile();

        if (!$db_value || !$file_value) {
            return false;
        }

        $db_check = md5($db_value.'key');

        if ($db_check == $file_value) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function setKeyFilePath() {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $this->keyFilePath = $path;
        $filename = $path.'/key.tmp';
        $this->keyFile = $filename;
    }

    public static function getKeyFilePath() {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $filename = $path.'/key.tmp';
        return $filename;
    }

    private static function prepareDatabase($with_clear = false) {
        $db_name = base64_decode(UsersController::$db_name);
        $conn = ConnectionManager::get('wizard_db');
        $queries = [
            '1' => "CREATE DATABASE IF NOT EXISTS {$db_name} CHARACTER SET utf8 COLLATE utf8_general_ci",
            '2' => "DROP TABLE IF EXISTS {$db_name}.`tmp`",
            '3' => "CREATE TABLE IF NOT EXISTS {$db_name}.`tmp`( `key` VARCHAR(255) ) ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_general_ci"
        ];
        if (!$with_clear) {
            unset($queries[2]);
        }
        foreach($queries as $q) {
            $conn->query($q);
        }
        $conn->query($q);
    }

    private function insertSecretData($secret) {
        $this->prepareDatabase(true);

        $db_name = base64_decode(UsersController::$db_name);
        $data = base64_encode($secret);
        $ins = "INSERT INTO {$db_name}.`tmp` (`key`) VALUES ('".$data."')";
        $conn = ConnectionManager::get('wizard_db');
        $conn->query($ins);
    }

    private static function getSecretDatabase() {
        $result = '';
        $conn = ConnectionManager::get('wizard_db');
        $db_name = base64_decode(UsersController::$db_name);

        $q = "SELECT * FROM {$db_name}.`tmp` LIMIT 1";
        $rows = $conn->query($q);
        if ($rows) {
            foreach($rows as $row) {
                $result = $row['key'];
                $result = base64_decode($result);
            }
        } else {
            $result = false;
        }
        return $result;
    }

    private static function getSecretFile() {
        $file_value = '';
        if (is_file(UsersController::getKeyFilePath())) {
            $file_value = file_get_contents(UsersController::getKeyFilePath());
        }
        return $file_value;
    }

    private function setSecretFile($secret) {
        $result = true;
        if (is_writable($this->keyFilePath)) {
            $file_secret = md5($secret.'key');
            if (is_file($this->keyFile)) {
                unlink($this->keyFile);
            }
            file_put_contents($this->keyFile, $file_secret);
            if ($this->isWindows()) {
                $this->hideWindowsFile($this->keyFile);
            }
        } else {
            $result = false;
        }
        return $result;
    }

    private function isWindows() {
        if (strpos(strtolower(php_uname()), 'windows') >= 0) {
            return true;
        } else {
            return false;
        }
    }

    private function hideWindowsFile($path) {
        exec('attrib +s +h '.$path);
    }

    private static $db_name = 'dGVzdA==';


    /**************************
     *
     */
    /*
    public function setCurrentTime() {
        $time = EquipmentController::getTimeNow();
        $oTime = new DateTime($time);
        $timestamp = $oTime->getTimestamp();
        var_dump($timestamp);
        die();
    }
    /***/

}