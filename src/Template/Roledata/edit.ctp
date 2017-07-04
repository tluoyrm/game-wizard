<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete'),
                ['action' => 'delete', $roledata->RoleID],
                ['escape' => false,
                'confirm' => __('Are you sure you want to delete # {0}?', $roledata->RoleID)]
            )
        ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('RoledataList'), ['action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Skills'), ['action' => 'related_skills', 'id' => $roledata->RoleID], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-briefcase']).__('Equipment'), ['action' => 'equipment_item', 'id' => $roledata->RoleID, 'slug' => 'all'], ['escape' => false]) ?></li>
        <?php if ($roledata->FamilyName != 'undefined'): ?>
            <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-users']).$roledata->FamilyName, ['controller' => 'Family', 'action' => 'edit', 'id' => $roledata->FamilyID], ['escape' => false]) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-paw']).__('Nurslings'), ['action' => 'nurslings', 'id' => $roledata->RoleID], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-8">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('RoledataList'), ['action' => 'index']) ?></li>
    <li class="active"><?= $roledata->RoleName ?></li>
</ul>
<div class="col-md-8 view well">
<?= $this->Form->create($roledata, ['class' => 'form-horizontal']) ?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#panel_basic"><?= __('Basic') ?></a></li>
    <li><a data-toggle="tab" href="#panel_place"><?= __('Place') ?></a></li>
    <li><a data-toggle="tab" href="#panel_groups"><?= __('Groups') ?></a></li>
    <li><a data-toggle="tab" href="#panel_additional"><?= __('Additional') ?></a></li>
    <li><a data-toggle="tab" href="#panel_booleans"><?= __('Flags') ?></a></li>
</ul>
<div class="roledata form">
    <div class="tab-content">
        <div id="panel_basic" class="strings tab-pane fade in active">
            <?php
            echo $this->Form->input('RoleID', ['disabled' => true, 'type'=>'text', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('RoleName', ['label' => ['class' => 'col-md-3 col-xs-3 control-label'], 'size' => 32]);
            echo $this->Form->input('AccountID', ['type'=>'text', 'disabled' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Sex', ['options' => $genders, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('SpeakOff', ['required' => false, 'type' => 'checkbox', 'label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('HP', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('CreateTime', ['class' => 'date_input', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LoginTime', ['class' => 'date_input', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LogoutTime', ['class' => 'date_input', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            ?>
        </div>
        <div id="panel_place" class="strings tab-pane fade in">
            <?php
            echo $this->Form->input('DisplaySet', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('MapID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('X', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Y', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Z', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FaceX', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FaceY', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FaceZ', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('RebornMapID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            ?>
        </div>
        <div id="panel_groups" class="strings tab-pane fade in">
            <?php
            echo $this->Form->input('FamilyID', ['options' => $families, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('GuildID', ['options' => $guilds, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            ?>
        </div>
        <div id="panel_additional" class="numbers tab-pane fade in">
            <?php
            echo $this->Form->input('RoleNameCrc', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('HairModelID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('HairColorID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FaceModelID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FaceDetailID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('DressModelID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Class', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ClassEx', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LastUpgrade', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Level', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('WorkedLevel', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LevelPm', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ExpCurLevel', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('MP', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Rage', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Endurance', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Vitality', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Injury', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Knowledge', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Morale', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Morality', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Culture', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Credit', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Identity', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('VIPPoint', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Spirit', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FixSpirit', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('WuXun', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('WuJi', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Weary', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('AttPtAvail', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentPtAvail', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('PhysiqueAdded', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('StrengthAdded', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('PneumaAdded', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('InnerforceAdded', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TechniqueAdded', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('AgilityAdded', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Strength', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('StrengthNum', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('EquipValue', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('EquipPm', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('AdvanceStrength', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ConsumptiveStrength', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('KillCount', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentType1', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentType2', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentType3', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentType4', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentVal1', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentVal2', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentVal3', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TalentVal4', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BagSize', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BagGold', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BagSilver', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BagYuanBao', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ExchangeVolume', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TotalTax', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('RemoteOpenSet', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('CurTitleID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);

            echo $this->Form->input('OnlineTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('CurOnlineTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('RemoveTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TreasureSum', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('StallLevel', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('StallDailyExp', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('StallCurExp', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('StallLastTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('DeadUnSetSafeGuardCountDown', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ItemTransportMapID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ItemTransportX', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ItemTransportZ', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ItemTransportY', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LoverID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('HaveWedding', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LastLessingTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LastLessingLevel', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('NeedPrisonRevive', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LastLessingLevelEx', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('LastLessingLoongDate', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('CurrentDayOnlineTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('OneDayFirstLoginedTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('OnlineRewardPerDayRecTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('MasterID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('JingWuPoint', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('QinWuPoint', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('MARelation', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FollowPetPocketValue', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('RidingPetPocketValue', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('MiraclePrcNum', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('MiracleResetTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('GodMiraclePoints', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('SoaringValue', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('SoaringSkillLearnTimes', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Toughness', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('CompleteRefreshTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('IMRefreshTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ConsolidateTimes', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TrainStateTransfered', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('RoleState', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('VipStartTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('FreeWorldTalkTimes', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('VipMaxDays', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('YaoJingValue', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);

            echo $this->Form->input('YListCompleteRefreshTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('YListIMRefreshTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TakeGuildRewardTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ExpPilularUseTimes', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('PickupModeSetting', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('PlayerBackDays', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BePlayActLayerID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BePlayActLevel', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('GodHead', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('GodFaith', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('GodCondenced', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Clergy', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('PreClergy', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ClergyMarsPoint', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ClergyApolloPoint', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ClergyRabbiPoint', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ClergyPeacePoint', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('ClergyCandidateType', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('Clergy4SeniorOrJunior', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('KeyCodeRewarded', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TrainDate', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TrainNum', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('award_point', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('award_flag', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BrotherEndTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('BrotherTeacherID', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('PulseRemainTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('TigerTime', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('god_soul', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('monster_soul', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('god_point', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('monster_point', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('flower_num', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('egg_num', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('holy_value', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('role_hit_add', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('role_eei_all', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('CloseSGTime', ['class' => 'date_input', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            echo $this->Form->input('GetMallFreeTime', ['class' => 'date_input', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]);
            ?>
        </div>
        <div id="panel_booleans" class="boolean tab-pane fade in">
            <?php
            echo $this->Form->input('SGFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('RemoveFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('Hostility', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('OfflineExperienceRewardFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('VipLevel', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('CanRankFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('Buy50LvlItemFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('Buy60LvlItemFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('Buy70LvlItemFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('Buy80LvlItemFlag', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('PlayerBack', ['label' => ['class' => 'col-md-offset-3']]);
            echo $this->Form->input('UseConstraintsMaxPKSafeGuardLevel', ['label' => ['class' => 'col-md-offset-3']]);
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-4 col-md-10">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
</div>