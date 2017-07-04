<div class="actions columns">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-external-link']).__('View').__('AccountCommon'), ['action' => 'view', $id], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit').__('AccountCommon'), ['action' => 'edit', $id], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Back').__('ListAccountCommon'), ['action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-eye']).__('Monitoring'), ['controller' => 'Account', 'action' => 'edit', $id], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List').' '.__('AccountCommon'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link($accountName, ['action' => 'view', $id]) ?></li>
    <li class="active"><?= __('RoledataListHeader') ?></li>
</ul>
<div class="roledata_list table-responsive col-md-7">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th class="ids" style="width: 20%;">Role#</th>
            <th><?= __('RoleName') ?></th>
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
</div>
