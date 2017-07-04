<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('New Commerce Rank'), ['action' => 'add'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['controller' => 'Guild', 'action' => 'index'], ['escape' => false]) ?> </li>
    </ul>
</div>
<div class="commerceRank table-responsive col-md-7">
    <?php if(count($commerceRank)): ?>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="ids"><?= $this->Paginator->sort('role_id', 'Role ID') ?></th>
            <th class="ids"><?= $this->Paginator->sort('guild_id', 'Guild ID') ?></th>
            <th class="ids"><?= $this->Paginator->sort('times') ?></th>
            <th class="ids"><?= $this->Paginator->sort('tael') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($commerceRank as $commerceRank): ?>
        <tr>
            <td class="ids"><?= $commerceRank->role_id ?></td>
            <td class="ids"><?= $commerceRank->guild_id ?></td>
            <td class="ids"><?= $commerceRank->times ?></td>
            <td class="ids"><?= $commerceRank->tael ?></td>
            <td class="actions">
                <div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-external-link']).$this->Html->tag('div', __('View')),
                        ['action' => 'view', 'id' => $commerceRank->role_id],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-pencil']).$this->Html->tag('div', __('Edit')),
                        ['action' => 'edit', 'id' => $commerceRank->role_id],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Form->postLink(
                        $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']).$this->Html->tag('div', __('Delete')),
                        ['action' => 'delete', $commerceRank->role_id],
                        ['escape' => false,
                        'confirm' => __('Are you sure you want to delete # {0}?', $commerceRank->role_id)
                        ]) ?></div>
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
    <?php else: ?>
    <div class="not_found"><?= __('Not Found') ?></div>
    <?php endif; ?>
</div>
