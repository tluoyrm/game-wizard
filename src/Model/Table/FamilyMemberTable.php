<?php
namespace App\Model\Table;

use App\Controller\EquipmentController;
use App\Model\Entity\FamilyMember;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * FamilyMember Model
 *
 */
class FamilyMemberTable extends Table
{

    const MAX_FAMILY_MEMBERS = 12;

    public static function defaultConnectionName() {
        return 'sm_db';
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

        $this->table('family_member');
        $this->schema()->columnType('FamilyID', 'float');
        $this->belongsTo('roledata', [
            'className' => 'Roledata',
            'foreignKey' => 'RoleID',
            'joinType'  => 'INNER'
        ]);
        $this->belongsTo('family', [
            'className' => 'Family',
            'foreignKey' => 'FamilyID',
            'joinType'  => 'INNER'
        ]);
    }

    /**
     * Delete member from family
     * @param $roleID
     * @param $memberID
     */
    public function deleteMember($roleID, $familyID) {
        $query =  TableRegistry::get('family_member')->query();
        $query->delete()
            ->where(['RoleID' => $roleID, 'FamilyID' => $familyID])
            ->execute();
    }

    public function memberExists($roleID, $familyID) {
        $familyMember = TableRegistry::get('family_member');
        $check = $familyMember->find()
            ->where(['RoleID' => $roleID, 'FamilyID' => $familyID])->first();
        if ($check) {
            return true;
        } else {
            return false;
        }
    }

    public function membersCount($familyID) {
        $familyMember = TableRegistry::get('family_member');
        $result = $familyMember->find()
            ->select(['count' => 'COUNT(*)'])
            ->where(['FamilyID' => $familyID])->first();
        return $result->count;
    }

    /**
     * Add member to family
     * @param $roleID
     * @param $familyID
     */
    public function addMember($roleID, $familyID) {
        $query =  TableRegistry::get('family_member')->query();
        $query->insert(['RoleID', 'FamilyID', 'JoinTime'])
            ->values([
                'RoleID' => $roleID,
                'FamilyID' => $familyID,
                'JoinTime' => EquipmentController::getTimeNow()
            ])
            ->execute();
    }
}