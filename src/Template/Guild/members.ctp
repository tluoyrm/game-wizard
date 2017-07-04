<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['action' => 'index'], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Back').__('Edit Guild'), ['action' => 'edit', $guildID], ['escape' => false]) ?> </li>
        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#member_add"><?= $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('AddMember') ?></a></li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('List Guild'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Back').__('Edit Guild'), ['action' => 'edit', $guildID]) ?></li>
    <li class="active"><?= __('Members') ?></li>
</ul>
<?php if (count($roledataList)): ?>
    <div class="table-responsive col-md-7">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th class="ids"  style="width: 20%;"><?= $this->Paginator->sort('RoleID', 'Role#') ?></th>
                <th><?= $this->Paginator->sort('RoleName') ?></th>
                <th class="actions icon-contain" style="width: 20%;"><?= __('Additionally') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($roledataList as $roledataItem): ?>
            <tr>
                <td class="ids">
                    <?= $this->Html->link($roledataItem->RoleID, ['controller' => 'Roledata', 'action' => 'view', 'id' => $roledataItem->RoleID]) ?>
                </td>
                <td><?= $roledataItem->RoleName ?></td>
                <td class="actions">
                    <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('View') ?>"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-external-link']),
                        ['controller' => 'Roledata', 'action' => 'view', 'id' => $roledataItem->RoleID],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Edit') ?>"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                        ['controller' => 'Roledata', 'action' => 'edit', 'id' => $roledataItem->RoleID],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Equipment') ?>">
                        <?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-briefcase']),
                        ['controller' => 'Roledata', 'action' => 'equipment_item', 'id' => $roledataItem->RoleID, 'slug' => 'all'],
                        ['escape' => false]); ?>
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
<?php else: ?>
    <div class="not_found"><?= __('Not Found') ?></div>
<?php endif; ?>

<?= $this->element('Family/member_add_dialog'); ?>