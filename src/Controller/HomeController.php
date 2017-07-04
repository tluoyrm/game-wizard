<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Session;
use Cake\View\Exception\MissingTemplateException;
use Cake\I18n\I18n;

class HomeController extends AppController
{
    public function index() {
    }

    public function about() {
    }

    public function search() {
        $searchString = (isset($this->request->query['search']) ? trim($this->request->query['search']) : '');
        $searchResults = [];
        $results = false;

        if ($searchString) {
            $searchTables = ['AccountCommon', 'Roledata', 'Family', 'Guild', 'Item'];
            foreach($searchTables as $table) {
                $searchResults[$table] = [];
            }

            foreach($searchTables as $table) {
                $this->loadModel($table);
                $query = $this->{$table}->find('all', [
                    'conditions' => ['or' => $this->getSearchConditions($table, $searchString)]
                ]);
                if ($table == 'AccountCommon') {
                    $query->select(['id' => 'AccountID', 'name' => 'AccountName']);
                } elseif ($table == 'Roledata') {
                    $query->select(['id' => 'RoleID', 'name' => 'RoleName']);
                } elseif ($table == 'Family') {
                    $query->select(['id' => 'FamilyID', 'name' => 'FamilyName']);
                } elseif ($table == 'Guild') {
                    $query->select(['id' => 'ID']);
                } elseif ($table == 'Item') {
                    $query->select([
                        'id' => 'CONVERT(item.SerialNum, CHAR)',
                        'OwnerID', 'RoleName' => 'r.RoleName',
                        'EquipType' =>
                            "CASE
                            WHEN soulcrystal.SerialNum IS NOT NULL THEN 'Soulcrystal'
                            WHEN holyequip.SerialNum IS NOT NULL THEN 'Holyequip'
                            WHEN holyman.SerialNum IS NOT NULL THEN 'Holyman'
                            WHEN equip.SerialNum IS NOT NULL THEN 'Equip'
                            ELSE 'undefined'
                            END"
                    ])
                    ->join([
                        'r' => [
                            'table' => 'roledata',
                            'conditions' => [
                                'r.RoleID = item.OwnerID'
                            ]
                        ]
                    ])
                    ->join([
                        'equip' => [
                            'table' => 'equip',
                            'type'  => 'LEFT',
                            'conditions' => [
                                'item.SerialNum = equip.SerialNum',
                            ]
                        ]
                    ])
                    ->join([
                        'holyequip' => [
                            'table' => 'holyequip',
                            'type'  => 'LEFT',
                            'conditions' => [
                                'item.SerialNum = holyequip.SerialNum',
                            ]
                        ]
                    ])
                    ->join([
                        'holyman' => [
                            'table' => 'holyman',
                            'type'  => 'LEFT',
                            'conditions' => [
                                'item.SerialNum = holyman.SerialNum',
                            ]
                        ]
                    ])
                    ->join([
                        'soulcrystal' => [
                            'table' => 'soulcrystal',
                            'type'  => 'LEFT',
                            'conditions' => [
                                'item.SerialNum = soulcrystal.SerialNum',
                            ]
                        ]
                    ]);
                }
                $searchResults[$table] = $query->all();
                if (count($searchResults[$table])) {
                    $results = true;
                }
            }
        }

        $this->set('results', $results);
        $this->set('searchString', $searchString);
        $this->set('searchResults', $searchResults);
    }

    private function getSearchConditions($tableName, $searchString) {
        $conditions = [];
        $searchFields = $this->{$tableName}->getSearchFields();
        foreach ($searchFields as $field) {
            $conditions["CONVERT({$tableName}.{$field}, CHAR) LIKE "] = "%{$searchString}%";
        }
        return $conditions;
    }
}