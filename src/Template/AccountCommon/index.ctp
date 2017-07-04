<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('New').__('AccountCommon'), ['action' => 'add'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-12">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li class="active"><?= __('ListAccountCommon') ?></li>
</ul>
<div class="accountcommon table-responsive col-md-12">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th class="ids"><?= $this->Paginator->sort('AccountID', 'Account#') ?></th>
            <th><?= $this->Paginator->sort('AccountName', __('Name')) ?></th>
            <th class="ids hidden-xs"><?= __('LastUseRoleID') ?></th>
            <th class="hidden-sm hidden-xs"><?= __('LastRoleName') ?></th>
            <th class="hidden-sm hidden-xs"><?= __('IP') ?></th>
            <th class="hidden-sm hidden-xs"><?= __('MAC') ?></th>
            <th class="numbers hidden-sm hidden-xs"><?= $this->Paginator->sort('BaiBaoYuanBao') ?></th>
            <th class="numbers hidden-sm hidden-xs"><?= $this->Paginator->sort('WareSize') ?></th>
            <th class="numbers hidden-sm hidden-xs"><?= $this->Paginator->sort('WareSilver') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($accountCommonList as $accountCommon): ?>
        <tr>
            <td class="ids"><?= $this->Number->format($accountCommon['AccountID']) ?></td>
            <td><?= h($accountCommon['AccountName']) ?></td>
            <td class="ids hidden-xs"><?= $this->Html->link($accountCommon['LastUseRoleID'], ['action' => 'view', $accountCommon['LastUseRoleID'], 'controller' => 'Roledata']); ?></td>
            <td class="hidden-sm hidden-xs"><?= $accountCommon['r']['RoleName'] ?></td>
            <td class="hidden-sm hidden-xs"><?= $accountCommon['l']['ip'] ?></td>
            <td class="hidden-sm hidden-xs"><?= $accountCommon['l']['mac'] ?></td>
            <td class="numbers hidden-sm hidden-xs"><?= $accountCommon['BaiBaoYuanBao'] ?></td>
            <td class="numbers hidden-sm hidden-xs"><?= $accountCommon['WareSize'] ?></td>
            <td class="numbers hidden-sm hidden-xs"><?= $accountCommon['WareSilver'] ?></td>
            <td class="actions">
                <div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-external-link']).$this->Html->tag('div', __('View')),
                        ['action' => 'view', $accountCommon['AccountID']],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-pencil']).$this->Html->tag('div', __('Edit')),
                        ['action' => 'edit', $accountCommon['AccountID']],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Form->postLink(
                        $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']).$this->Html->tag('div', __('Delete')),
                        ['action' => 'delete', $accountCommon['AccountID']],
                        ['escape' => false,
                         'confirm' => __('Are you sure you want to delete # {0}?', $accountCommon['AccountID'])
                        ]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-eye']).$this->Html->tag('div', __('Monitoring')),
                        ['controller' => 'Account', 'action' => 'edit', $accountCommon['AccountID']],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain">
                        <?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-male']).$this->Html->tag('div', __('RoledataList')),
                        ['action' => 'roledata_list', 'id' => $accountCommon['AccountID']],
                        ['escape' => false]); ?></div>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

