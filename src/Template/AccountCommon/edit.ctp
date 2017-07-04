<div class="actions columns">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
            $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete'),
            ['action' => 'delete', $accountCommon->AccountID],
            ['escape' => false,
            'confirm' => __('Are you sure you want to delete # {0}?', $accountCommon->AccountID)]
            )
            ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List').' '.__('AccountCommon'), ['action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-eye']).__('Monitoring'), ['controller' => 'Account', 'action' => 'edit', $accountCommon['AccountID']], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-male']).__('RoledataList'), ['action' => 'roledata_list', 'id' => $accountCommon->AccountID], ['escape' => false]); ?></li>
    </ul>
</div>
<ul class="breadcrumb">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List').' '.__('AccountCommon'), ['action' => 'index']) ?></li>
    <li class="active"><?= $accountCommon->AccountName ?></li>
</ul>
<div class="col-md-7">
    <div class="account_common form well">
        <?= $this->Form->create($accountCommon, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('AccountID', ['type' => 'text', 'disabled' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('AccountName', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label'], 'size' => 36]); ?>
        <?= $this->Form->input('ChannelID', ['type' => 'text', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('BaiBaoYuanBao', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('WareSize', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('WareSilver', ['label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('LastUseRoleID', ['type' => 'text', 'disabled' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>

        <div class="form-group">
            <div class="col-md-offset-3 col-md-10 voofset10">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
