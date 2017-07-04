<div class="actions columns">
    <ul class="side-nav">
        <?php if ($familySprite): ?>
            <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit Family Sprite'), ['action' => 'edit_sprite', $id], ['escape' => false]) ?> </li>
        <?php endif; ?>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('ListOfFamily'), ['action' => 'index'], ['escape' => false]) ?> </li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Family'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link($name, ['action' => 'view', $id]) ?></li>
    <li class="active"><?= __('Sprite') ?></li>
</ul>

<?php if ($familySprite): ?>
<div class="col-md-7">
    <div class="familySprite view columns well">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Name') ?></div>
                <div class="col-md-4"><?= h($familySprite->Name) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Level') ?></div>
                <div class="col-md-4"><?= $familySprite->Level ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Exp') ?></div>
                <div class="col-md-4"><?= $familySprite->Exp ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('HP') ?></div>
                <div class="col-md-4"><?= $familySprite->HP ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('EXAttack') ?></div>
                <div class="col-md-4"><?= $familySprite->EXAttack ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('InAttack') ?></div>
                <div class="col-md-4"><?= $familySprite->InAttack ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('EXDefense') ?></div>
                <div class="col-md-4"><?= $familySprite->EXDefense ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('InDefense') ?></div>
                <div class="col-md-4"><?= $familySprite->InDefense ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('EXAttackDeeper') ?></div>
                <div class="col-md-4"><?= $familySprite->EXAttackDeeper ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('InAttackDeeper') ?></div>
                <div class="col-md-4"><?= $familySprite->InAttackDeeper ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('EXAttackResistance') ?></div>
                <div class="col-md-4"><?= $familySprite->EXAttackResistance ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('InAttackResistance') ?></div>
                <div class="col-md-4"><?= $familySprite->InAttackResistance ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Toughness') ?></div>
                <div class="col-md-4"><?= $familySprite->Toughness ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('CritDes') ?></div>
                <div class="col-md-4"><?= $familySprite->CritDes ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('ControleffectDeepen') ?></div>
                <div class="col-md-4"><?= $familySprite->ControleffectDeepen ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('ControleffectResistance') ?></div>
                <div class="col-md-4"><?= $familySprite->ControleffectResistance ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('SlowingeffectDeepen') ?></div>
                <div class="col-md-4"><?= $familySprite->SlowingeffectDeepen ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('SlowingeffectResistance') ?></div>
                <div class="col-md-4"><?= $familySprite->SlowingeffectResistance ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('FixedeffectDeepen') ?></div>
                <div class="col-md-4"><?= $familySprite->FixedeffectDeepen ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('FixedeffectResistance') ?></div>
                <div class="col-md-4"><?= $familySprite->FixedeffectResistance ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('AgingeffectDeepen') ?></div>
                <div class="col-md-4"><?= $familySprite->AgingeffectDeepen ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('AgingeffectResistance') ?></div>
                <div class="col-md-4"><?= $familySprite->AgingeffectResistance ?></div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="not_found"><?= __('Not Found') ?></div>
<?php endif; ?>