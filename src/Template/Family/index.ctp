<div class="actions">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('New Family'), ['action' => 'add'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-10">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li class="active"><?= __('List Family') ?></li>
</ul>
<div class="family table-responsive col-lg-10">
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="ids"><?= $this->Paginator->sort('FamilyID', '#') ?></th>
            <th><?= $this->Paginator->sort('FamilyName') ?></th>
            <th class="ids"><?= $this->Paginator->sort('LeaderID') ?></th>
            <th class="ids"><?= $this->Paginator->sort('FounderID') ?></th>
            <th class="ids"><?= $this->Paginator->sort('Active') ?></th>
            <th class="hidden-sm hidden-xs"><?= $this->Paginator->sort('CreateTime') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($family as $family): ?>
        <tr>
            <td class="ids"><?= $family->FamilyID ?></td>
            <td><?= h($family->FamilyName) ?></td>
            <td class="ids"><?= $this->Html->link($family->LeaderID, ['controller' => 'Roledata', 'action' => 'view', 'id' => $family->LeaderID]) ?></td>
            <td class="ids"><?= $this->Html->link($family->FounderID, ['controller' => 'Roledata', 'action' => 'view', 'id' => $family->FounderID]) ?></td>
            <td class="ids"><?= $family->Active ?></td>
            <td class="hidden-sm hidden-xs"><?= h($family->CreateTime) ?></td>
            <td class="actions">
                <div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-external-link']).$this->Html->tag('div', __('View')),
                        ['action' => 'view', 'id' => $family->FamilyID],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-pencil']).$this->Html->tag('div', __('Edit')),
                        ['action' => 'edit', 'id' => $family->FamilyID],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Form->postLink(
                        $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']).$this->Html->tag('div', __('Delete')),
                        ['action' => 'delete', $family->FamilyID],
                        ['escape' => false,
                        'confirm' => __('Are you sure you want to delete # {0}?', $family->FamilyID)
                        ]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-cog']).$this->Html->tag('div', __('Sprite')),
                        ['action' => 'view_sprite', $family->FamilyID],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-users']).$this->Html->tag('div', __('Members')),
                        ['action' => 'members', $family->FamilyID],
                        ['escape' => false]) ?></div>
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
