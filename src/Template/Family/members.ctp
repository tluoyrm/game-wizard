<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Families'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link($familyName, ['action' => 'view', $familyID]) ?></li>
    <li class="active"><?= __('Members') ?></li>
</ul>

<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('ListFamily'), ['action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-external-link']).__('View'), ['action' => 'view', 'id' => $familyID], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit'), ['action' => 'edit', 'id' => $familyID], ['escape' => false]) ?></li>
        <li><?= $this->Form->postLink(
            $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete'),
            ['action' => 'delete', $familyID],
            ['escape' => false,
            'confirm' => __('Are you sure you want to delete # {0}?', $familyID)]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-cog']).__('Sprite'), ['action' => 'view_sprite', 'id' => $familyID], ['escape' => false]) ?></li>
        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#member_add"><?= $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('AddMember') ?></a></li>
    </ul>
</div>
<?php if ($membersCount > 0): ?>
<div class="members table-responsive col-md-7">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th class="ids" style="width: 20%;">Role#</th>
            <th>RoleName</th>
            <th class="actions icon-contain" style="width: 25%;"><?= __('Additionally') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($membersList as $memberItem): ?>
        <tr>
            <td class="ids">
                <?= $this->Html->link($memberItem->RoleID, ['controller' => 'Roledata', 'action' => 'view', 'id' => $memberItem->RoleID]) ?>
            </td>
            <td><?= $memberItem->roledata->RoleName ?></td>
            <td class="actions">
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('View') ?>"><?= $this->Html->link(
                    $this->Html->tag('i', '', ['class' => 'fa fa-external-link']),
                    ['controller' => 'Roledata', 'action' => 'view', 'id' => $memberItem->RoleID],
                    ['escape' => false]) ?></div>
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Edit') ?>"><?= $this->Html->link(
                    $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                    ['controller' => 'Roledata', 'action' => 'edit', 'id' => $memberItem->RoleID],
                    ['escape' => false]) ?></div>
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Equipment') ?>">
                    <?= $this->Html->link(
                    $this->Html->tag('i', '', ['class' => 'fa fa-briefcase']),
                    ['controller' => 'Roledata', 'action' => 'equipment_item', 'id' => $memberItem->RoleID, 'slug' => 'all'],
                    ['escape' => false]); ?>
                </div>
                <div class="action" data-toggle="tooltip" title="<?= __('Delete Member') ?>">
                    <?= $this->Form->postLink(
                    $this->Html->tag('i', '', ['class' => 'fa fa-minus-circle']),
                    ['action' => 'del_member'],
                    ['escape' => false,
                    'data' => ['roleID' => $memberItem->RoleID, 'familyID' => $memberItem->FamilyID],
                    'confirm' => __('Are you sure you want to delete member #{0} from this family?', $memberItem->RoleID)
                    ]) ?>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
<div>No records found</div>
<?php endif; ?>

<?= $this->element('Family/member_add_dialog'); ?>