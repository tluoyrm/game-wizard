<div class="actions columns large-2 medium-3">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('Add Guild Commerce Rank'), ['controller' => 'CommerceRank', 'action' => 'add', '?' => ['guild_id' => $guildID]], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['action' => 'index'], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Back').__('Edit Guild'), ['action' => 'edit', $guildID], ['escape' => false]) ?> </li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Guild'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Back').__('Edit Guild'), ['action' => 'edit', $guildID]) ?></li>
    <li class="active"><?= __('Related Guild Commerce Rank') ?></li>
</ul>
<div class="table-responsive col-md-7">
    <?php if (count($commerceRanks)): ?>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th class="ids" style="width: 20%;"><?= $this->Paginator->sort('role_id', 'Role#') ?></th>
            <th class="ids"><?= $this->Paginator->sort('times') ?></th>
            <th class="ids"><?= $this->Paginator->sort('tael') ?></th>
            <th class="actions icon-contain" style="width: 20%;"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <?php foreach ($commerceRanks as $commerceRank): ?>
        <tr>
            <td class="ids"><?= h($commerceRank->role_id) ?></td>
            <td class="ids"><?= h($commerceRank->times) ?></td>
            <td class="ids"><?= h($commerceRank->tael) ?></td>
            <td class="actions">
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Edit') ?>"><?= $this->Html->link(
                    $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                    ['controller' => 'CommerceRank', 'action' => 'edit', $commerceRank->role_id],
                    ['escape' => false]) ?></div>
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Delete') ?>"><?= $this->Form->postLink(
                    $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']),
                    ['controller' => 'CommerceRank', 'action' => 'delete', $commerceRank->role_id],
                    ['escape' => false,
                    'confirm' => __('Are you sure you want to delete # {0}?', $commerceRank->role_id)
                    ]) ?></div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?php else: ?>
    <div class="not_found"><?= __('Not Found') ?></div>
    <?php endif; ?>
</div>