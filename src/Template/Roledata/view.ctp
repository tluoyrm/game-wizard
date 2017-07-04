<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit').__('Roledata'), ['action' => 'edit', $roledata->RoleID], ['escape' => false]) ?></li>
        <li><?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete').__('Roledata'), ['action' => 'delete', $roledata->RoleID],
            ['escape' => false,
            'confirm' => __('Are you sure you want to delete # {0}?', $roledata->RoleID)]) ?>
        </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-list-alt']).__('RoledataList'), ['action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-briefcase']).__('Equipment'), ['action' => 'equipment_item', 'id' => $roledata->RoleID, 'slug' => 'all'], ['escape' => false]) ?></li>
        <?php if ($roledata->FamilyName != 'undefined'): ?>
            <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-users']).$roledata->FamilyName, ['controller' => 'Family', 'action' => 'view', 'id' => $roledata->FamilyID], ['escape' => false]) ?></li>
        <?php endif; ?>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-paw']).__('Nurslings'), ['action' => 'nurslings', 'id' => $roledata->RoleID], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('RoledataList'), ['action' => 'index']) ?></li>
    <li class="active"><?= $roledata->RoleName ?></li>
</ul>

<div class="col-md-9 well roledata view">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#panel_basic"><?= __('Basic') ?></a></li>
    <li><a data-toggle="tab" href="#panel_place"><?= __('Place') ?></a></li>
    <li><a data-toggle="tab" href="#panel_groups"><?= __('Groups') ?></a></li>
    <li><a data-toggle="tab" href="#panel_additional"><?= __('Additional') ?></a></li>
    <li><a data-toggle="tab" href="#panel_booleans"><?= __('Flags') ?></a></li>
    <li><a data-toggle="tab" href="#panel_skills"><?= __('Skills') ?></a></li>
</ul>
<div class="tab-content view">
    <div id="panel_basic" class="strings tab-pane fade in active">
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RoleID') ?></div>
            <div class="col-md-4"><?= h($roledata->RoleID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RoleName') ?></div>
            <div class="col-md-4"><?= h($roledata->RoleName) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('AccountID') ?></div>
            <div class="col-md-4"><?= h($roledata->AccountID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Sex') ?></div>
            <div class="col-md-4"><?= h($roledata->Sex) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('SpeakOff') ?></div>
            <div class="col-md-4"><?= h($roledata->SpeakOff) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('CreateTime') ?></div>
            <div class="col-md-4"><?= h($roledata->CreateTime) ?></div>
        </div>

        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('HP') ?></div>
            <div class="col-md-4"><?= h($roledata->HP) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LoginTime') ?></div>
            <div class="col-md-4"><?= h($roledata->LoginTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LogoutTime') ?></div>
            <div class="col-md-4"><?= h($roledata->LogoutTime) ?></div>
        </div>
    </div>

    <div id="panel_place" class="strings tab-pane fade in">
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('DisplaySet') ?></div>
            <div class="col-md-4"><?= h($roledata->DisplaySet) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('MapID') ?></div>
            <div class="col-md-4"><?= h($roledata->MapID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('X') ?></div>
            <div class="col-md-4"><?= h($roledata->X) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Y') ?></div>
            <div class="col-md-4"><?= h($roledata->Y) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Z') ?></div>
            <div class="col-md-4"><?= h($roledata->Z) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FaceX') ?></div>
            <div class="col-md-4"><?= h($roledata->FaceX) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FaceY') ?></div>
            <div class="col-md-4"><?= h($roledata->FaceY) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FaceZ') ?></div>
            <div class="col-md-4"><?= h($roledata->FaceZ) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RebornMapID') ?></div>
            <div class="col-md-4"><?= h($roledata->RebornMapID) ?></div>
        </div>
    </div>

    <div id="panel_groups" class="strings tab-pane fade in">
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FamilyID') ?></div>
            <div class="col-md-4"><?= h($roledata->FamilyID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('GuildID') ?></div>
            <div class="col-md-4"><?= h($roledata->GuildID) ?></div>
        </div>
    </div>

    <div id="panel_additional" class="numbers tab-pane fade in">
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RoleNameCrc') ?></div>
            <div class="col-md-4"><?= h($roledata->RoleNameCrc) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('HairModelID') ?></div>
            <div class="col-md-4"><?= h($roledata->HairModelID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('HairColorID') ?></div>
            <div class="col-md-4"><?= h($roledata->HairColorID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FaceModelID') ?></div>
            <div class="col-md-4"><?= h($roledata->FaceModelID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FaceDetailID') ?></div>
            <div class="col-md-4"><?= h($roledata->FaceDetailID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('DressModelID') ?></div>
            <div class="col-md-4"><?= h($roledata->DressModelID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Class') ?></div>
            <div class="col-md-4"><?= h($roledata->Class) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ClassEx') ?></div>
            <div class="col-md-4"><?= h($roledata->ClassEx) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LastUpgrade') ?></div>
            <div class="col-md-4"><?= h($roledata->LastUpgrade) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Level') ?></div>
            <div class="col-md-4"><?= h($roledata->Level) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('WorkedLevel') ?></div>
            <div class="col-md-4"><?= h($roledata->WorkedLevel) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LevelPm') ?></div>
            <div class="col-md-4"><?= h($roledata->LevelPm) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ExpCurLevel') ?></div>
            <div class="col-md-4"><?= h($roledata->ExpCurLevel) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('MP') ?></div>
            <div class="col-md-4"><?= h($roledata->MP) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Rage') ?></div>
            <div class="col-md-4"><?= h($roledata->Rage) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Endurance') ?></div>
            <div class="col-md-4"><?= h($roledata->Endurance) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Vitality') ?></div>
            <div class="col-md-4"><?= h($roledata->Vitality) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Injury') ?></div>
            <div class="col-md-4"><?= h($roledata->Injury) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Knowledge') ?></div>
            <div class="col-md-4"><?= h($roledata->Knowledge) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Morale') ?></div>
            <div class="col-md-4"><?= h($roledata->Morale) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Morality') ?></div>
            <div class="col-md-4"><?= h($roledata->Morality) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Culture') ?></div>
            <div class="col-md-4"><?= h($roledata->Culture) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Credit') ?></div>
            <div class="col-md-4"><?= h($roledata->Credit) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Identity') ?></div>
            <div class="col-md-4"><?= h($roledata->Identity) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('VIPPoint') ?></div>
            <div class="col-md-4"><?= h($roledata->VIPPoint) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Spirit') ?></div>
            <div class="col-md-4"><?= h($roledata->Spirit) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FixSpirit') ?></div>
            <div class="col-md-4"><?= h($roledata->FixSpirit) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('WuXun') ?></div>
            <div class="col-md-4"><?= h($roledata->WuXun) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('WuJi') ?></div>
            <div class="col-md-4"><?= h($roledata->WuJi) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Weary') ?></div>
            <div class="col-md-4"><?= h($roledata->Weary) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('AttPtAvail') ?></div>
            <div class="col-md-4"><?= h($roledata->AttPtAvail) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentPtAvail') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentPtAvail) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('PhysiqueAdded') ?></div>
            <div class="col-md-4"><?= h($roledata->PhysiqueAdded) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('StrengthAdded') ?></div>
            <div class="col-md-4"><?= h($roledata->StrengthAdded) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('PneumaAdded') ?></div>
            <div class="col-md-4"><?= h($roledata->PneumaAdded) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('InnerforceAdded') ?></div>
            <div class="col-md-4"><?= h($roledata->InnerforceAdded) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TechniqueAdded') ?></div>
            <div class="col-md-4"><?= h($roledata->TechniqueAdded) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('AgilityAdded') ?></div>
            <div class="col-md-4"><?= h($roledata->AgilityAdded) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Strength') ?></div>
            <div class="col-md-4"><?= h($roledata->Strength) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('StrengthNum') ?></div>
            <div class="col-md-4"><?= h($roledata->StrengthNum) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('EquipValue') ?></div>
            <div class="col-md-4"><?= h($roledata->EquipValue) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('EquipPm') ?></div>
            <div class="col-md-4"><?= h($roledata->EquipPm) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('AdvanceStrength') ?></div>
            <div class="col-md-4"><?= h($roledata->AdvanceStrength) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ConsumptiveStrength') ?></div>
            <div class="col-md-4"><?= h($roledata->ConsumptiveStrength) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('KillCount') ?></div>
            <div class="col-md-4"><?= h($roledata->KillCount) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentType1') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentType1) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentType2') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentType2) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentType3') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentType3) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentType4') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentType4) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentVal1') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentVal1) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentVal2') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentVal2) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentVal3') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentVal3) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TalentVal4') ?></div>
            <div class="col-md-4"><?= h($roledata->TalentVal4) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BagSize') ?></div>
            <div class="col-md-4"><?= h($roledata->BagSize) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BagGold') ?></div>
            <div class="col-md-4"><?= h($roledata->BagGold) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BagSilver') ?></div>
            <div class="col-md-4"><?= h($roledata->BagSilver) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BagYuanBao') ?></div>
            <div class="col-md-4"><?= h($roledata->BagYuanBao) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ExchangeVolume') ?></div>
            <div class="col-md-4"><?= h($roledata->ExchangeVolume) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TotalTax') ?></div>
            <div class="col-md-4"><?= h($roledata->TotalTax) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RemoteOpenSet') ?></div>
            <div class="col-md-4"><?= h($roledata->RemoteOpenSet) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('CurTitleID') ?></div>
            <div class="col-md-4"><?= h($roledata->CurTitleID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('OnlineTime') ?></div>
            <div class="col-md-4"><?= h($roledata->OnlineTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('CurOnlineTime') ?></div>
            <div class="col-md-4"><?= h($roledata->CurOnlineTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RemoveTime') ?></div>
            <div class="col-md-4"><?= h($roledata->RemoveTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TreasureSum') ?></div>
            <div class="col-md-4"><?= h($roledata->TreasureSum) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('StallLevel') ?></div>
            <div class="col-md-4"><?= h($roledata->StallLevel) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('StallDailyExp') ?></div>
            <div class="col-md-4"><?= h($roledata->StallDailyExp) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('StallCurExp') ?></div>
            <div class="col-md-4"><?= h($roledata->StallCurExp) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('StallLastTime') ?></div>
            <div class="col-md-4"><?= h($roledata->StallLastTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('DeadUnSetSafeGuardCountDown') ?></div>
            <div class="col-md-4"><?= h($roledata->DeadUnSetSafeGuardCountDown) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ItemTransportMapID') ?></div>
            <div class="col-md-4"><?= h($roledata->ItemTransportMapID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ItemTransportX') ?></div>
            <div class="col-md-4"><?= h($roledata->ItemTransportX) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ItemTransportZ') ?></div>
            <div class="col-md-4"><?= h($roledata->ItemTransportZ) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ItemTransportY') ?></div>
            <div class="col-md-4"><?= h($roledata->ItemTransportY) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LoverID') ?></div>
            <div class="col-md-4"><?= h($roledata->LoverID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('HaveWedding') ?></div>
            <div class="col-md-4"><?= h($roledata->HaveWedding) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LastLessingTime') ?></div>
            <div class="col-md-4"><?= h($roledata->LastLessingTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LastLessingLevel') ?></div>
            <div class="col-md-4"><?= h($roledata->LastLessingLevel) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('NeedPrisonRevive') ?></div>
            <div class="col-md-4"><?= h($roledata->NeedPrisonRevive) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LastLessingLevelEx') ?></div>
            <div class="col-md-4"><?= h($roledata->LastLessingLevelEx) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('LastLessingLoongDate') ?></div>
            <div class="col-md-4"><?= h($roledata->LastLessingLoongDate) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('CurrentDayOnlineTime') ?></div>
            <div class="col-md-4"><?= h($roledata->CurrentDayOnlineTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('OneDayFirstLoginedTime') ?></div>
            <div class="col-md-4"><?= h($roledata->OneDayFirstLoginedTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('OnlineRewardPerDayRecTime') ?></div>
            <div class="col-md-4"><?= h($roledata->OnlineRewardPerDayRecTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('MasterID') ?></div>
            <div class="col-md-4"><?= h($roledata->MasterID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('JingWuPoint') ?></div>
            <div class="col-md-4"><?= h($roledata->JingWuPoint) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('QinWuPoint') ?></div>
            <div class="col-md-4"><?= h($roledata->QinWuPoint) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('MARelation') ?></div>
            <div class="col-md-4"><?= h($roledata->MARelation) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FollowPetPocketValue') ?></div>
            <div class="col-md-4"><?= h($roledata->FollowPetPocketValue) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RidingPetPocketValue') ?></div>
            <div class="col-md-4"><?= h($roledata->RidingPetPocketValue) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('MiraclePrcNum') ?></div>
            <div class="col-md-4"><?= h($roledata->MiraclePrcNum) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('MiracleResetTime') ?></div>
            <div class="col-md-4"><?= h($roledata->MiracleResetTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('GodMiraclePoints') ?></div>
            <div class="col-md-4"><?= h($roledata->GodMiraclePoints) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('SoaringValue') ?></div>
            <div class="col-md-4"><?= h($roledata->SoaringValue) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('SoaringSkillLearnTimes') ?></div>
            <div class="col-md-4"><?= h($roledata->SoaringSkillLearnTimes) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Toughness') ?></div>
            <div class="col-md-4"><?= h($roledata->Toughness) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('CompleteRefreshTime') ?></div>
            <div class="col-md-4"><?= h($roledata->CompleteRefreshTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('IMRefreshTime') ?></div>
            <div class="col-md-4"><?= h($roledata->IMRefreshTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ConsolidateTimes') ?></div>
            <div class="col-md-4"><?= h($roledata->ConsolidateTimes) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TrainStateTransfered') ?></div>
            <div class="col-md-4"><?= h($roledata->TrainStateTransfered) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('RoleState') ?></div>
            <div class="col-md-4"><?= h($roledata->RoleState) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('VipStartTime') ?></div>
            <div class="col-md-4"><?= h($roledata->VipStartTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('FreeWorldTalkTimes') ?></div>
            <div class="col-md-4"><?= h($roledata->FreeWorldTalkTimes) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('VipMaxDays') ?></div>
            <div class="col-md-4"><?= h($roledata->VipMaxDays) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('YaoJingValue') ?></div>
            <div class="col-md-4"><?= h($roledata->YaoJingValue) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('YListCompleteRefreshTime') ?></div>
            <div class="col-md-4"><?= h($roledata->YListCompleteRefreshTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('YListIMRefreshTime') ?></div>
            <div class="col-md-4"><?= h($roledata->YListIMRefreshTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TakeGuildRewardTime') ?></div>
            <div class="col-md-4"><?= h($roledata->TakeGuildRewardTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ExpPilularUseTimes') ?></div>
            <div class="col-md-4"><?= h($roledata->ExpPilularUseTimes) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('PickupModeSetting') ?></div>
            <div class="col-md-4"><?= h($roledata->PickupModeSetting) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('PlayerBackDays') ?></div>
            <div class="col-md-4"><?= h($roledata->PlayerBackDays) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BePlayActLayerID') ?></div>
            <div class="col-md-4"><?= h($roledata->BePlayActLayerID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BePlayActLevel') ?></div>
            <div class="col-md-4"><?= h($roledata->BePlayActLevel) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('GodHead') ?></div>
            <div class="col-md-4"><?= h($roledata->GodHead) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('GodFaith') ?></div>
            <div class="col-md-4"><?= h($roledata->GodFaith) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('GodCondenced') ?></div>
            <div class="col-md-4"><?= h($roledata->GodCondenced) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Clergy') ?></div>
            <div class="col-md-4"><?= h($roledata->Clergy) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('PreClergy') ?></div>
            <div class="col-md-4"><?= h($roledata->PreClergy) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ClergyMarsPoint') ?></div>
            <div class="col-md-4"><?= h($roledata->ClergyMarsPoint) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ClergyApolloPoint') ?></div>
            <div class="col-md-4"><?= h($roledata->ClergyApolloPoint) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ClergyRabbiPoint') ?></div>
            <div class="col-md-4"><?= h($roledata->ClergyRabbiPoint) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ClergyPeacePoint') ?></div>
            <div class="col-md-4"><?= h($roledata->ClergyPeacePoint) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('ClergyCandidateType') ?></div>
            <div class="col-md-4"><?= h($roledata->ClergyCandidateType) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Clergy4SeniorOrJunior') ?></div>
            <div class="col-md-4"><?= h($roledata->Clergy4SeniorOrJunior) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('KeyCodeRewarded') ?></div>
            <div class="col-md-4"><?= h($roledata->KeyCodeRewarded) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TrainDate') ?></div>
            <div class="col-md-4"><?= h($roledata->TrainDate) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TrainNum') ?></div>
            <div class="col-md-4"><?= h($roledata->TrainNum) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Award Point') ?></div>
            <div class="col-md-4"><?= h($roledata->award_point) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Award Flag') ?></div>
            <div class="col-md-4"><?= h($roledata->award_flag) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BrotherEndTime') ?></div>
            <div class="col-md-4"><?= h($roledata->BrotherEndTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('BrotherTeacherID') ?></div>
            <div class="col-md-4"><?= h($roledata->BrotherTeacherID) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('PulseRemainTime') ?></div>
            <div class="col-md-4"><?= h($roledata->PulseRemainTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('TigerTime') ?></div>
            <div class="col-md-4"><?= h($roledata->TigerTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('God Soul') ?></div>
            <div class="col-md-4"><?= h($roledata->god_soul) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Monster Soul') ?></div>
            <div class="col-md-4"><?= h($roledata->monster_soul) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('God Point') ?></div>
            <div class="col-md-4"><?= h($roledata->god_point) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Monster Point') ?></div>
            <div class="col-md-4"><?= h($roledata->monster_point) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Flower Num') ?></div>
            <div class="col-md-4"><?= h($roledata->flower_num) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Egg Num') ?></div>
            <div class="col-md-4"><?= h($roledata->egg_num) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Holy Value') ?></div>
            <div class="col-md-4"><?= h($roledata->holy_value) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Role Hit Add') ?></div>
            <div class="col-md-4"><?= h($roledata->role_hit_add) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('Role Eei All') ?></div>
            <div class="col-md-4"><?= h($roledata->role_eei_all) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('CloseSGTime') ?></div>
            <div class="col-md-4"><?= h($roledata->CloseSGTime) ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-4 subheader"><?= __('GetMallFreeTime') ?></div>
            <div class="col-md-4"><?= h($roledata->GetMallFreeTime) ?></div>
        </div>
    </div>
    <div id="panel_booleans" class="booleans tab-pane fade in">
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('SGFlag') ?></div>
            <div class="col-md-4"><?= $roledata->SGFlag ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('RemoveFlag') ?></div>
            <div class="col-md-4"><?= $roledata->RemoveFlag ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('Hostility') ?></div>
            <div class="col-md-4"><?= $roledata->Hostility ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('OfflineExperienceRewardFlag') ?></div>
            <div class="col-md-4"><?= $roledata->OfflineExperienceRewardFlag ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('VipLevel') ?></div>
            <div class="col-md-4"><?= $roledata->VipLevel ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('CanRankFlag') ?></div>
            <div class="col-md-4"><?= $roledata->CanRankFlag ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('Buy50LvlItemFlag') ?></div>
            <div class="col-md-4"><?= $roledata->Buy50LvlItemFlag ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('Buy60LvlItemFlag') ?></div>
            <div class="col-md-4"><?= $roledata->Buy60LvlItemFlag ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('Buy70LvlItemFlag') ?></div>
            <div class="col-md-4"><?= $roledata->Buy70LvlItemFlag ? __('Yes') : __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('Buy80LvlItemFlag') ?></div>
            <div class="col-md-4"><?= $roledata->Buy80LvlItemFlag? __('Yes'): __('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('PlayerBack') ?></div>
            <div class="col-md-4"><?= $roledata->PlayerBack? __('Yes'):__('No'); ?></div>
        </div>
        <div class="form-group">
            <div class="col-md-5 subheader"><?= __('UseConstraintsMaxPKSafeGuardLevel') ?></div>
            <div class="col-md-4"><?= $roledata->UseConstraintsMaxPKSafeGuardLevel? __('Yes') : __('No');?></div>
        </div>
    </div>
    <div id="panel_skills" class="skills tab-pane fade in">
        <div class="row">
            <?php if (!empty($skills)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th class="ids"><?= __('#') ?></th>
                        <th class="ids"><?= __('BiddenLevel') ?></th>
                        <th class="ids"><?= __('SelfLevel') ?></th>
                        <th class="ids"><?= __('Proficiency') ?></th>
                        <th class="ids"><?= __('CoolDown') ?></th>
                        <th class="ids"><?= __('active_time') ?></th>
                    </tr>
                    <?php foreach ($skills as $skill): ?>
                    <tr>
                        <td class="ids"><?= h($skill->ID) ?></td>
                        <td class="ids"><?= h($skill->BiddenLevel) ?></td>
                        <td class="ids"><?= h($skill->SelfLevel) ?></td>
                        <td class="ids"><?= $skill->Proficiency ?></td>
                        <td class="ids"><?= $skill->CoolDown ?></td>
                        <td class="ids"><?= $skill->active_time ?></td>
                    </tr>

                    <?php endforeach; ?>
                </table>
            </div>
            <?php else: ?>
            <div class="not_found"><?= __('Not Found') ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>