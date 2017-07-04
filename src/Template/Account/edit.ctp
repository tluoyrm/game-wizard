<div class="actions columns">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-external-link']).__('View').__('AccountCommon'), ['controller' => 'AccountCommon', 'action' => 'view', $account->id], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit').__('AccountCommon'), ['controller' => 'AccountCommon', 'action' => 'edit', $account->id], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Back').__('ListAccountCommon'), ['controller' => 'AccountCommon', 'action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List').' '.__('AccountCommon'), ['controller' => 'AccountCommon', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link($account->name, ['controller' => 'AccountCommon', 'action' => 'view', $account->id]) ?></li>
    <li class="active"><?= __('Monitoring') ?></li>
</ul>
<div class="col-md-7">
    <div class="account view columns well">
        <div class="row">
            <div class="columns strings">
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('name') ?></div>
                    <div class="col-md-9"><?= h($account->name) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('privilege') ?></div>
                    <div class="col-md-9"><?= h($account->privilege) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('login_status') ?></div>
                    <div class="col-md-9"><?= h($account->login_status) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('worldname_crc') ?></div>
                    <div class="col-md-9"><?= h($account->worldname_crc) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('forbid_mask') ?></div>
                    <div class="col-md-9"><?= h($account->forbid_mask) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('mibao') ?></div>
                    <div class="col-md-9"><?= h($account->mibao) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('time') ?></div>
                    <div class="col-md-9"><?= h($account->time) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-3 col-xs-3 subheader"><?= __('email') ?></div>
                    <div class="col-md-9"><?= h($account->email) ?></div>
                </div>
            </div>
        </div>

        <div class="account form">
        <?= $this->Form->create($account, ['class' => 'form-horizontal']) ?>
            <?= $this->Form->input('ip_ban', ['type' => 'checkbox', 'checked' => $isIpBanned ? 'checked' : '', 'label' => ['text' => '<b>'.__('Ban IP').'</b> ' .h($account->ip), 'class' => 'col-md-offset-3', 'escape' => false]]); ?>
            <?= $this->Form->input('mac_ban', ['type' => 'checkbox', 'checked' => $isMacBanned, 'label' => ['text' => '<b>'.__('Ban MAC').'</b> '.h($account->mac), 'class' => 'col-md-offset-3', 'escape' => false]]); ?>
            <div class="form-group">
                <div class="col-md-offset-3">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>