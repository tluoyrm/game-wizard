<div class="actions columns">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List').__('AccountCommon'), ['action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List').' '.__('AccountCommon'), ['action' => 'index']) ?></li>
    <li class="active"><?= __('Create new account') ?></li>
</ul>
<div class="col-md-7">
    <div class="account_common form well">
        <?= $this->Form->create($accountCommon, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('AccountName', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('ChannelID', ['type' => 'text', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('BaiBaoYuanBao', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('WareSize', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('WareSilver', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('LastUseRoleID', ['type' => 'text', 'disabled' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <?= $this->Form->button(__('Create'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
