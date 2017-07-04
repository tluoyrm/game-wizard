<div class="actions">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('New').__('Roledata'), ['action' => 'add'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-12">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li class="active"><?= __('RoledataList') ?></li>
</ul>
<div class="roledata table-responsive col-md-12">
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="ids"><?= $this->Paginator->sort('RoleID', __('Role#')) ?></th>
            <th class=""><?= $this->Paginator->sort('RoleName') ?></th>
            <th class="ids"><?= $this->Paginator->sort('AccountID', __('Account#')) ?></th>
            <th class=""><?= $this->Paginator->sort('account_common.AccountName', __('AccountName')) ?></th>
            <th class="hidden-sm hidden-xs"><?= $this->Paginator->sort('FamilyName', __('Family')) ?></th>
            <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('GuildID', __('Guild')) ?></th>
            <th class="hidden-sm hidden-xs"><?= $this->Paginator->sort('Sex', __('Sex')) ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($roledata as $roledata): ?>
        <tr>
            <td class="ids"><?= $this->Number->format($roledata->RoleID) ?></td>
            <td class=""><?= h($roledata->RoleName) ?></td>
            <td class="ids">
                <?php
                    $accountID = $this->Number->format($roledata->AccountID);
                echo $this->Html->link($accountID, ['controller' => 'AccountCommon', 'action' => 'view', 'id' => $accountID]);
                ?>
            </td>
            <td class=""><?= $roledata->AccountName ?></td>
            <td class="hidden-sm hidden-xs"><?php
                if ($roledata->FamilyName != 'undefined') {
                    echo $this->Html->link($roledata->FamilyName, ['controller' => 'Family', 'action' => 'view', 'id' => $roledata->FamilyID]);
                } else {
                    echo '';
                } ?>
            </td>
            <td class="ids hidden-sm hidden-xs">
                <?= $roledata->GuildID ? $this->Html->link($roledata->GuildID, ['controller' => 'Guild', 'action' => 'view', $roledata->GuildID]) : '' ?>
            </td>
            <td class="hidden-sm hidden-xs"><?php
                if ($roledata->Sex == 0) echo __('Woman');
                else { echo __('Man'); } ?>
            </td>
            <td class="actions">
                <div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-external-link']).$this->Html->tag('div', __('View')),
                        ['action' => 'view', 'id' => $roledata->RoleID],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-pencil']).$this->Html->tag('div', __('Edit')),
                        ['action' => 'edit', 'id' => $roledata->RoleID],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Form->postLink(
                        $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']).$this->Html->tag('div', __('Delete')),
                        ['action' => 'delete', $roledata->RoleID],
                        ['escape' => false,
                         'confirm' => __('Are you sure you want to delete # {0}?', $roledata->RoleID)
                        ]) ?></div>
                    <div class="icon-contain">
                        <?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-briefcase']).$this->Html->tag('div', __('Equipment')),
                        ['action' => 'equipment_item', 'id' => $roledata->RoleID, 'slug' => 'all'],
                        ['escape' => false]); ?></div>
                    <div class="icon-contain">
                        <?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-paw']).$this->Html->tag('div', __('Nurslings')),
                        ['action' => 'nurslings', 'id' => $roledata->RoleID],
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
