<div class="actions columns">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit').__('AccountCommon'), ['action' => 'edit', $accountCommon->AccountID], ['escape' => false]) ?> </li>
        <li><?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete').__('AccountCommon'), ['action' => 'delete', $accountCommon->AccountID], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $accountCommon->AccountID)]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List').' '.__('AccountCommon'), ['action' => 'index'], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-eye']).__('Monitoring'), ['controller' => 'Account', 'action' => 'edit', $accountCommon['AccountID']], ['escape' => false]) ?>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-male']).__('RoledataList'), ['action' => 'roledata_list', 'id' => $accountCommon->AccountID], ['escape' => false]); ?></li>
        </li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List').' '.__('AccountCommon'), ['action' => 'index']) ?></li>
    <li class="active"><?= $accountCommon->AccountName ?></li>
</ul>
<div class="col-md-7">
    <div class="account_common view columns well">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('AccountID') ?></div>
                <div class="col-md-8"><?= h($accountCommon->AccountID) ?></div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('AccountName') ?></div>
                <div class="col-md-8"><?= h($accountCommon->AccountName) ?></div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('ChannelID') ?></div>
                <div class="col-md-8"><?= h($accountCommon->ChannelID) ?></div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('BaiBaoYuanBao') ?></div>
                <div class="col-md-8"><?= h($accountCommon->BaiBaoYuanBao) ?></div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('WareSize') ?></div>
                <div class="col-md-8"><?= h($accountCommon->WareSize) ?></div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('WareSilver') ?></div>
                <div class="col-md-8"><?= h($accountCommon->WareSilver) ?></div>
            </div>

            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('LastUseRoleID') ?></div>
                <div class="col-md-8"><?= h($accountCommon->LastUseRoleID) ?></div>
            </div>
        </div>
</div>
