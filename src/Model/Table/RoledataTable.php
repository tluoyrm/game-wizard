<?php
namespace App\Model\Table;

use App\Model\Entity\Roledata;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Roledata Model
 *
 */
class RoledataTable extends Table
{

    private $searchFields = ['RoleID', 'RoleName'];

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

        $this->table('roledata');
        $this->displayField('RoleID');
        $this->primaryKey('RoleID');
        $this->belongsTo('account_common', [
            'className' => 'AccountCommon',
            'foreignKey' => 'AccountID',
            'joinType'  => 'INNER'
        ]);
        $this->schema()->columnType('MapID', 'float');
        $this->schema()->columnType('RebornMapID', 'float');
        $this->schema()->columnType('WorkedLevel', 'float');
        $this->schema()->columnType('GuildID', 'float');
        $this->schema()->columnType('RemoveTime', 'float');
        $this->schema()->columnType('ItemTransportMapID', 'float');
        $this->schema()->columnType('LoverID', 'float');
        $this->schema()->columnType('MasterID', 'float');
        $this->schema()->columnType('PickupModeSetting', 'float');
        $this->schema()->columnType('BePlayActLayerID', 'float');
        $this->schema()->columnType('FamilyID', 'float');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('AccountID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('AccountID', 'create')
            ->notEmpty('AccountID');

        $validator
            ->add('RoleID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('RoleID', 'create');

        $validator
            ->requirePresence('RoleName', 'create')
            ->notEmpty('RoleName');

        $validator
            ->add('RoleNameCrc', 'valid', ['rule' => 'numeric'])
            ->requirePresence('RoleNameCrc', 'create')
            ->notEmpty('RoleNameCrc')
            ->add('RoleNameCrc', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->add('Sex', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Sex', 'create')
            ->notEmpty('Sex');

        $validator
            ->add('SpeakOff', 'valid', ['rule' => 'numeric'])
            ->requirePresence('SpeakOff', 'create')
            ->notEmpty('SpeakOff');

        $validator
            ->add('HairModelID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('HairModelID', 'create')
            ->notEmpty('HairModelID');

        $validator
            ->add('HairColorID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('HairColorID', 'create')
            ->notEmpty('HairColorID');

        $validator
            ->add('FaceModelID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FaceModelID', 'create')
            ->notEmpty('FaceModelID');

        $validator
            ->add('FaceDetailID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FaceDetailID', 'create')
            ->notEmpty('FaceDetailID');

        $validator
            ->add('DressModelID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('DressModelID', 'create')
            ->notEmpty('DressModelID');

        $validator
            ->allowEmpty('AvatarEquip');

        $validator
            ->add('DisplaySet', 'valid', ['rule' => 'numeric'])
            ->requirePresence('DisplaySet', 'create')
            ->notEmpty('DisplaySet');

        $validator
            ->add('MapID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('MapID', 'create')
            ->notEmpty('MapID');

        $validator
            ->add('X', 'valid', ['rule' => 'numeric'])
            ->requirePresence('X', 'create')
            ->notEmpty('X');

        $validator
            ->add('Y', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Y', 'create')
            ->notEmpty('Y');

        $validator
            ->add('Z', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Z', 'create')
            ->notEmpty('Z');

        $validator
            ->add('FaceX', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FaceX', 'create')
            ->notEmpty('FaceX');

        $validator
            ->add('FaceY', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FaceY', 'create')
            ->notEmpty('FaceY');

        $validator
            ->add('FaceZ', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FaceZ', 'create')
            ->notEmpty('FaceZ');

        $validator
            ->add('RebornMapID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('RebornMapID', 'create')
            ->notEmpty('RebornMapID');

        $validator
            ->add('Class', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Class', 'create')
            ->notEmpty('Class');

        $validator
            ->add('ClassEx', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ClassEx', 'create')
            ->notEmpty('ClassEx');

        $validator
            ->add('LastUpgrade', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LastUpgrade', 'create')
            ->notEmpty('LastUpgrade');

        $validator
            ->add('Level', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Level', 'create')
            ->notEmpty('Level');

        $validator
            ->requirePresence('WorkedLevel', 'create')
            ->notEmpty('WorkedLevel');

        $validator
            ->add('LevelPm', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LevelPm', 'create')
            ->notEmpty('LevelPm');

        $validator
            ->requirePresence('ExpCurLevel', 'create')
            ->notEmpty('ExpCurLevel');

        $validator
            ->add('HP', 'valid', ['rule' => 'numeric'])
            ->requirePresence('HP', 'create')
            ->notEmpty('HP');

        $validator
            ->add('MP', 'valid', ['rule' => 'numeric'])
            ->requirePresence('MP', 'create')
            ->notEmpty('MP');

        $validator
            ->add('Rage', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Rage', 'create')
            ->notEmpty('Rage');

        $validator
            ->add('Endurance', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Endurance', 'create')
            ->notEmpty('Endurance');

        $validator
            ->add('Vitality', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Vitality', 'create')
            ->notEmpty('Vitality');

        $validator
            ->add('Injury', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Injury', 'create')
            ->notEmpty('Injury');

        $validator
            ->add('Knowledge', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Knowledge', 'create')
            ->notEmpty('Knowledge');

        $validator
            ->add('Morale', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Morale', 'create')
            ->notEmpty('Morale');

        $validator
            ->add('Morality', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Morality', 'create')
            ->notEmpty('Morality');

        $validator
            ->add('Culture', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Culture', 'create')
            ->notEmpty('Culture');

        $validator
            ->add('Credit', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Credit', 'create')
            ->notEmpty('Credit');

        $validator
            ->add('Identity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Identity', 'create')
            ->notEmpty('Identity');

        $validator
            ->add('VIPPoint', 'valid', ['rule' => 'numeric'])
            ->requirePresence('VIPPoint', 'create')
            ->notEmpty('VIPPoint');

        $validator
            ->add('Spirit', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Spirit', 'create')
            ->notEmpty('Spirit');

        $validator
            ->requirePresence('FixSpirit', 'create')
            ->notEmpty('FixSpirit');

        $validator
            ->add('WuXun', 'valid', ['rule' => 'numeric'])
            ->requirePresence('WuXun', 'create')
            ->notEmpty('WuXun');

        $validator
            ->add('WuJi', 'valid', ['rule' => 'numeric'])
            ->requirePresence('WuJi', 'create')
            ->notEmpty('WuJi');

        $validator
            ->add('Weary', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Weary', 'create')
            ->notEmpty('Weary');

        $validator
            ->add('AttPtAvail', 'valid', ['rule' => 'numeric'])
            ->requirePresence('AttPtAvail', 'create')
            ->notEmpty('AttPtAvail');

        $validator
            ->add('TalentPtAvail', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentPtAvail', 'create')
            ->notEmpty('TalentPtAvail');

        $validator
            ->add('PhysiqueAdded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('PhysiqueAdded', 'create')
            ->notEmpty('PhysiqueAdded');

        $validator
            ->add('StrengthAdded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('StrengthAdded', 'create')
            ->notEmpty('StrengthAdded');

        $validator
            ->add('PneumaAdded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('PneumaAdded', 'create')
            ->notEmpty('PneumaAdded');

        $validator
            ->add('InnerforceAdded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('InnerforceAdded', 'create')
            ->notEmpty('InnerforceAdded');

        $validator
            ->add('TechniqueAdded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TechniqueAdded', 'create')
            ->notEmpty('TechniqueAdded');

        $validator
            ->add('AgilityAdded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('AgilityAdded', 'create')
            ->notEmpty('AgilityAdded');

        $validator
            ->add('Strength', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Strength', 'create')
            ->notEmpty('Strength');

        $validator
            ->add('StrengthNum', 'valid', ['rule' => 'numeric'])
            ->requirePresence('StrengthNum', 'create')
            ->notEmpty('StrengthNum');

        $validator
            ->add('EquipValue', 'valid', ['rule' => 'numeric'])
            ->requirePresence('EquipValue', 'create')
            ->notEmpty('EquipValue');

        $validator
            ->add('EquipPm', 'valid', ['rule' => 'numeric'])
            ->requirePresence('EquipPm', 'create')
            ->notEmpty('EquipPm');

        $validator
            ->add('AdvanceStrength', 'valid', ['rule' => 'numeric'])
            ->requirePresence('AdvanceStrength', 'create')
            ->notEmpty('AdvanceStrength');

        $validator
            ->add('ConsumptiveStrength', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ConsumptiveStrength', 'create')
            ->notEmpty('ConsumptiveStrength');

        $validator
            ->add('KillCount', 'valid', ['rule' => 'numeric'])
            ->requirePresence('KillCount', 'create')
            ->notEmpty('KillCount');

        $validator
            ->add('TalentType1', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentType1', 'create')
            ->notEmpty('TalentType1');

        $validator
            ->add('TalentType2', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentType2', 'create')
            ->notEmpty('TalentType2');

        $validator
            ->add('TalentType3', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentType3', 'create')
            ->notEmpty('TalentType3');

        $validator
            ->add('TalentType4', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentType4', 'create')
            ->notEmpty('TalentType4');

        $validator
            ->add('TalentVal1', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentVal1', 'create')
            ->notEmpty('TalentVal1');

        $validator
            ->add('TalentVal2', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentVal2', 'create')
            ->notEmpty('TalentVal2');

        $validator
            ->add('TalentVal3', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentVal3', 'create')
            ->notEmpty('TalentVal3');

        $validator
            ->add('TalentVal4', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TalentVal4', 'create')
            ->notEmpty('TalentVal4');

        $validator
            ->add('SGFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('SGFlag', 'create')
            ->notEmpty('SGFlag');

        $validator
            ->requirePresence('CloseSGTime', 'create')
            ->notEmpty('CloseSGTime');

        $validator
            ->add('BagSize', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BagSize', 'create')
            ->notEmpty('BagSize');

        $validator
            ->add('BagGold', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BagGold', 'create')
            ->notEmpty('BagGold');

        $validator
            ->add('BagSilver', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BagSilver', 'create')
            ->notEmpty('BagSilver');

        $validator
            ->add('BagYuanBao', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BagYuanBao', 'create')
            ->notEmpty('BagYuanBao');

        $validator
            ->add('ExchangeVolume', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ExchangeVolume', 'create')
            ->notEmpty('ExchangeVolume');

        $validator
            ->add('GuildID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('GuildID', 'create')
            ->notEmpty('GuildID');

        $validator
            ->add('TotalTax', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TotalTax', 'create')
            ->notEmpty('TotalTax');

        $validator
            ->add('RemoteOpenSet', 'valid', ['rule' => 'numeric'])
            ->requirePresence('RemoteOpenSet', 'create')
            ->notEmpty('RemoteOpenSet');

        $validator
            ->add('CurTitleID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('CurTitleID', 'create')
            ->notEmpty('CurTitleID');

        $validator
            ->requirePresence('GetMallFreeTime', 'create')
            ->notEmpty('GetMallFreeTime');

        $validator
            ->requirePresence('CreateTime', 'create')
            ->notEmpty('CreateTime');

        $validator
            ->requirePresence('LoginTime', 'create')
            ->notEmpty('LoginTime');

        $validator
            ->requirePresence('LogoutTime', 'create')
            ->notEmpty('LogoutTime');

        $validator
            ->add('OnlineTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('OnlineTime', 'create')
            ->notEmpty('OnlineTime');

        $validator
            ->add('CurOnlineTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('CurOnlineTime', 'create')
            ->notEmpty('CurOnlineTime');

        $validator
            ->add('RemoveFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('RemoveFlag', 'create')
            ->notEmpty('RemoveFlag');

        $validator
            ->add('RemoveTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('RemoveTime', 'create')
            ->notEmpty('RemoveTime');

        $validator
            ->allowEmpty('ScriptData');

        $validator
            ->add('TreasureSum', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TreasureSum', 'create')
            ->notEmpty('TreasureSum');

        $validator
            ->add('StallLevel', 'valid', ['rule' => 'numeric'])
            ->requirePresence('StallLevel', 'create')
            ->notEmpty('StallLevel');

        $validator
            ->add('StallDailyExp', 'valid', ['rule' => 'numeric'])
            ->requirePresence('StallDailyExp', 'create')
            ->notEmpty('StallDailyExp');

        $validator
            ->add('StallCurExp', 'valid', ['rule' => 'numeric'])
            ->requirePresence('StallCurExp', 'create')
            ->notEmpty('StallCurExp');

        $validator
            ->add('StallLastTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('StallLastTime', 'create')
            ->notEmpty('StallLastTime');

        $validator
            ->add('Hostility', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Hostility', 'create')
            ->notEmpty('Hostility');

        $validator
            ->add('DeadUnSetSafeGuardCountDown', 'valid', ['rule' => 'numeric'])
            ->requirePresence('DeadUnSetSafeGuardCountDown', 'create')
            ->notEmpty('DeadUnSetSafeGuardCountDown');

        $validator
            ->add('ItemTransportMapID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ItemTransportMapID', 'create')
            ->notEmpty('ItemTransportMapID');

        $validator
            ->add('ItemTransportX', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ItemTransportX', 'create')
            ->notEmpty('ItemTransportX');

        $validator
            ->add('ItemTransportZ', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ItemTransportZ', 'create')
            ->notEmpty('ItemTransportZ');

        $validator
            ->add('ItemTransportY', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ItemTransportY', 'create')
            ->notEmpty('ItemTransportY');

        $validator
            ->add('LoverID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LoverID', 'create')
            ->notEmpty('LoverID');

        $validator
            ->add('HaveWedding', 'valid', ['rule' => 'numeric'])
            ->requirePresence('HaveWedding', 'create')
            ->notEmpty('HaveWedding');

        $validator
            ->add('LastLessingTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LastLessingTime', 'create')
            ->notEmpty('LastLessingTime');

        $validator
            ->add('LastLessingLevel', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LastLessingLevel', 'create')
            ->notEmpty('LastLessingLevel');

        $validator
            ->add('NeedPrisonRevive', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NeedPrisonRevive', 'create')
            ->notEmpty('NeedPrisonRevive');

        $validator
            ->add('LastLessingLevelEx', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LastLessingLevelEx', 'create')
            ->notEmpty('LastLessingLevelEx');

        $validator
            ->add('LastLessingLoongDate', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LastLessingLoongDate', 'create')
            ->notEmpty('LastLessingLoongDate');

        $validator
            ->add('CurrentDayOnlineTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('CurrentDayOnlineTime', 'create')
            ->notEmpty('CurrentDayOnlineTime');

        $validator
            ->add('OneDayFirstLoginedTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('OneDayFirstLoginedTime', 'create')
            ->notEmpty('OneDayFirstLoginedTime');

        $validator
            ->add('OnlineRewardPerDayRecTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('OnlineRewardPerDayRecTime', 'create')
            ->notEmpty('OnlineRewardPerDayRecTime');

        $validator
            ->add('OfflineExperienceRewardFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('OfflineExperienceRewardFlag', 'create')
            ->notEmpty('OfflineExperienceRewardFlag');

        $validator
            ->add('MasterID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('MasterID', 'create')
            ->notEmpty('MasterID');

        $validator
            ->add('JingWuPoint', 'valid', ['rule' => 'numeric'])
            ->requirePresence('JingWuPoint', 'create')
            ->notEmpty('JingWuPoint');

        $validator
            ->add('QinWuPoint', 'valid', ['rule' => 'numeric'])
            ->requirePresence('QinWuPoint', 'create')
            ->notEmpty('QinWuPoint');

        $validator
            ->add('MARelation', 'valid', ['rule' => 'numeric'])
            ->requirePresence('MARelation', 'create')
            ->notEmpty('MARelation');

        $validator
            ->add('FollowPetPocketValue', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FollowPetPocketValue', 'create')
            ->notEmpty('FollowPetPocketValue');

        $validator
            ->add('RidingPetPocketValue', 'valid', ['rule' => 'numeric'])
            ->requirePresence('RidingPetPocketValue', 'create')
            ->notEmpty('RidingPetPocketValue');

        $validator
            ->add('MiraclePrcNum', 'valid', ['rule' => 'numeric'])
            ->requirePresence('MiraclePrcNum', 'create')
            ->notEmpty('MiraclePrcNum');

        $validator
            ->add('MiracleResetTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('MiracleResetTime', 'create')
            ->notEmpty('MiracleResetTime');

        $validator
            ->allowEmpty('TrainStateTable');

        $validator
            ->add('GodMiraclePoints', 'valid', ['rule' => 'numeric'])
            ->requirePresence('GodMiraclePoints', 'create')
            ->notEmpty('GodMiraclePoints');

        $validator
            ->add('SoaringValue', 'valid', ['rule' => 'numeric'])
            ->requirePresence('SoaringValue', 'create')
            ->notEmpty('SoaringValue');

        $validator
            ->add('SoaringSkillLearnTimes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('SoaringSkillLearnTimes', 'create')
            ->notEmpty('SoaringSkillLearnTimes');

        $validator
            ->add('Toughness', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Toughness', 'create')
            ->notEmpty('Toughness');

        $validator
            ->add('CompleteRefreshTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('CompleteRefreshTime', 'create')
            ->notEmpty('CompleteRefreshTime');

        $validator
            ->add('IMRefreshTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('IMRefreshTime', 'create')
            ->notEmpty('IMRefreshTime');

        $validator
            ->add('ConsolidateTimes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ConsolidateTimes', 'create')
            ->notEmpty('ConsolidateTimes');

        $validator
            ->add('TrainStateTransfered', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TrainStateTransfered', 'create')
            ->notEmpty('TrainStateTransfered');

        $validator
            ->add('RoleState', 'valid', ['rule' => 'numeric'])
            ->requirePresence('RoleState', 'create')
            ->notEmpty('RoleState');

        $validator
            ->add('VipLevel', 'valid', ['rule' => 'boolean'])
            ->requirePresence('VipLevel', 'create')
            ->notEmpty('VipLevel');

        $validator
            ->add('VipStartTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('VipStartTime', 'create')
            ->notEmpty('VipStartTime');

        $validator
            ->add('FreeWorldTalkTimes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FreeWorldTalkTimes', 'create')
            ->notEmpty('FreeWorldTalkTimes');

        $validator
            ->add('VipMaxDays', 'valid', ['rule' => 'numeric'])
            ->requirePresence('VipMaxDays', 'create')
            ->notEmpty('VipMaxDays');

        $validator
            ->add('CanRankFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('CanRankFlag', 'create')
            ->notEmpty('CanRankFlag');

        $validator
            ->add('YaoJingValue', 'valid', ['rule' => 'numeric'])
            ->requirePresence('YaoJingValue', 'create')
            ->notEmpty('YaoJingValue');

        $validator
            ->add('Buy50LvlItemFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Buy50LvlItemFlag', 'create')
            ->notEmpty('Buy50LvlItemFlag');

        $validator
            ->add('Buy60LvlItemFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Buy60LvlItemFlag', 'create')
            ->notEmpty('Buy60LvlItemFlag');

        $validator
            ->add('Buy70LvlItemFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Buy70LvlItemFlag', 'create')
            ->notEmpty('Buy70LvlItemFlag');

        $validator
            ->add('Buy80LvlItemFlag', 'valid', ['rule' => 'boolean'])
            ->requirePresence('Buy80LvlItemFlag', 'create')
            ->notEmpty('Buy80LvlItemFlag');

        $validator
            ->add('YListCompleteRefreshTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('YListCompleteRefreshTime', 'create')
            ->notEmpty('YListCompleteRefreshTime');

        $validator
            ->add('YListIMRefreshTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('YListIMRefreshTime', 'create')
            ->notEmpty('YListIMRefreshTime');

        $validator
            ->add('TakeGuildRewardTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TakeGuildRewardTime', 'create')
            ->notEmpty('TakeGuildRewardTime');

        $validator
            ->add('ExpPilularUseTimes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ExpPilularUseTimes', 'create')
            ->notEmpty('ExpPilularUseTimes');

        $validator
            ->add('PickupModeSetting', 'valid', ['rule' => 'numeric'])
            ->requirePresence('PickupModeSetting', 'create')
            ->notEmpty('PickupModeSetting');

        $validator
            ->add('PlayerBack', 'valid', ['rule' => 'boolean'])
            ->requirePresence('PlayerBack', 'create')
            ->notEmpty('PlayerBack');

        $validator
            ->add('PlayerBackDays', 'valid', ['rule' => 'numeric'])
            ->requirePresence('PlayerBackDays', 'create')
            ->notEmpty('PlayerBackDays');

        $validator
            ->add('UseConstraintsMaxPKSafeGuardLevel', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('UseConstraintsMaxPKSafeGuardLevel');

        $validator
            ->add('BePlayActLayerID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BePlayActLayerID', 'create')
            ->notEmpty('BePlayActLayerID');

        $validator
            ->add('BePlayActLevel', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BePlayActLevel', 'create')
            ->notEmpty('BePlayActLevel');

        $validator
            ->add('GodHead', 'valid', ['rule' => 'numeric'])
            ->requirePresence('GodHead', 'create')
            ->notEmpty('GodHead');

        $validator
            ->add('GodFaith', 'valid', ['rule' => 'numeric'])
            ->requirePresence('GodFaith', 'create')
            ->notEmpty('GodFaith');

        $validator
            ->add('GodCondenced', 'valid', ['rule' => 'numeric'])
            ->requirePresence('GodCondenced', 'create')
            ->notEmpty('GodCondenced');

        $validator
            ->add('Clergy', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Clergy', 'create')
            ->notEmpty('Clergy');

        $validator
            ->add('PreClergy', 'valid', ['rule' => 'numeric'])
            ->requirePresence('PreClergy', 'create')
            ->notEmpty('PreClergy');

        $validator
            ->add('ClergyMarsPoint', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ClergyMarsPoint', 'create')
            ->notEmpty('ClergyMarsPoint');

        $validator
            ->add('ClergyApolloPoint', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ClergyApolloPoint', 'create')
            ->notEmpty('ClergyApolloPoint');

        $validator
            ->add('ClergyRabbiPoint', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ClergyRabbiPoint', 'create')
            ->notEmpty('ClergyRabbiPoint');

        $validator
            ->add('ClergyPeacePoint', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ClergyPeacePoint', 'create')
            ->notEmpty('ClergyPeacePoint');

        $validator
            ->add('ClergyCandidateType', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ClergyCandidateType', 'create')
            ->notEmpty('ClergyCandidateType');

        $validator
            ->add('Clergy4SeniorOrJunior', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Clergy4SeniorOrJunior');

        $validator
            ->add('FamilyID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('FamilyID', 'create')
            ->notEmpty('FamilyID');

        $validator
            ->add('KeyCodeRewarded', 'valid', ['rule' => 'numeric'])
            ->requirePresence('KeyCodeRewarded', 'create')
            ->notEmpty('KeyCodeRewarded');

        $validator
            ->add('TrainDate', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TrainDate', 'create')
            ->notEmpty('TrainDate');

        $validator
            ->add('TrainNum', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TrainNum', 'create')
            ->notEmpty('TrainNum');

        $validator
            ->add('award_point', 'valid', ['rule' => 'numeric'])
            ->requirePresence('award_point', 'create')
            ->notEmpty('award_point');

        $validator
            ->add('award_flag', 'valid', ['rule' => 'numeric'])
            ->requirePresence('award_flag', 'create')
            ->notEmpty('award_flag');

        $validator
            ->add('BrotherEndTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BrotherEndTime', 'create')
            ->notEmpty('BrotherEndTime');

        $validator
            ->add('BrotherTeacherID', 'valid', ['rule' => 'numeric'])
            ->requirePresence('BrotherTeacherID', 'create')
            ->notEmpty('BrotherTeacherID');

        $validator
            ->add('PulseRemainTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('PulseRemainTime', 'create')
            ->notEmpty('PulseRemainTime');

        $validator
            ->add('TigerTime', 'valid', ['rule' => 'numeric'])
            ->requirePresence('TigerTime', 'create')
            ->notEmpty('TigerTime');

        $validator
            ->add('god_soul', 'valid', ['rule' => 'numeric'])
            ->requirePresence('god_soul', 'create')
            ->notEmpty('god_soul');

        $validator
            ->add('monster_soul', 'valid', ['rule' => 'numeric'])
            ->requirePresence('monster_soul', 'create')
            ->notEmpty('monster_soul');

        $validator
            ->add('god_point', 'valid', ['rule' => 'numeric'])
            ->requirePresence('god_point', 'create')
            ->notEmpty('god_point');

        $validator
            ->add('monster_point', 'valid', ['rule' => 'numeric'])
            ->requirePresence('monster_point', 'create')
            ->notEmpty('monster_point');

        $validator
            ->add('flower_num', 'valid', ['rule' => 'numeric'])
            ->requirePresence('flower_num', 'create')
            ->notEmpty('flower_num');

        $validator
            ->add('egg_num', 'valid', ['rule' => 'numeric'])
            ->requirePresence('egg_num', 'create')
            ->notEmpty('egg_num');

        $validator
            ->add('holy_value', 'valid', ['rule' => 'numeric'])
            ->requirePresence('holy_value', 'create')
            ->notEmpty('holy_value');

        $validator
            ->add('role_hit_add', 'valid', ['rule' => 'numeric'])
            ->requirePresence('role_hit_add', 'create')
            ->notEmpty('role_hit_add');

        $validator
            ->add('role_eei_all', 'valid', ['rule' => 'numeric'])
            ->requirePresence('role_eei_all', 'create')
            ->notEmpty('role_eei_all');

        return $validator;
    }

    public function getList() {
        $roledata = TableRegistry::get('roledata');
        $query = $roledata->find()
            ->select(['RoleID', 'RoleName', 'AccountID', 'AccountName' => 'a.AccountName', 'FamilyID' => 'f.FamilyID',
                'FamilyName' => 'IFNULL(f.FamilyName, "undefined")', 'Sex',
                'GuildID' => 'IFNULL(g.ID, 0)'])
            ->join([
                'a' => [
                    'table' => 'account_common',
                    'conditions' => [
                        'a.AccountID = roledata.AccountID',
                    ]
                ],
                'fm' => [
                    'table' => 'family_member',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'fm.RoleID = roledata.RoleID'
                    ]
                ],
                'f' => [
                    'table' => 'family',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'fm.FamilyID = f.FamilyID'
                    ]
                ],
                'g' => [
                    'table' => 'guild',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'g.ID = roledata.GuildID'
                    ]
                ]
            ]);
        return $query;
    }

    public function getRoledata($roleID) {
        $roledata = TableRegistry::get('roledata');
        $result = $roledata->find()
            ->select(['FamilyID' => 'f.FamilyID', 'FamilyName' => 'IFNULL(f.FamilyName, "undefined")'])
            ->autoFields(true)
            ->join([
                'a' => [
                    'table' => 'account_common',
                    'conditions' => [
                        'a.AccountID = roledata.AccountID',
                    ]
                ],
                'fm' => [
                    'table' => 'family_member',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'fm.RoleID = roledata.RoleID'
                    ]
                ],
                'f' => [
                    'table' => 'family',
                    'type'  => 'LEFT',
                    'conditions' => [
                        'fm.FamilyID = f.FamilyID'
                    ]
                ]
            ])
            ->where(['roledata.RoleID' => $roleID])->first();
        return $result;
    }

    public function getRoledataInfo($roleID) {
        $roledata = TableRegistry::get('roledata');
        $result = $roledata->find()
            ->select(['AccountID', 'AccountName' => 'a.AccountName', 'RoleName'])
            ->join([
                'a' => [
                    'table' => 'account_common',
                    'conditions' => [
                        'a.AccountID = roledata.AccountID',
                    ]
                ]
            ])
            ->where(['RoleID' => $roleID])->first();
        return $result;
    }

    public function resetGuildID($guildID) {
        $roledata = TableRegistry::get('roledata');
        $roledata->updateAll(['GuildID' => 0], ['GuildID' => $guildID]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['RoleName']));
        return $rules;
    }

    public function getSearchFields() {
        return $this->searchFields;
    }

}
