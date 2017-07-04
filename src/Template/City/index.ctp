<div class="actions">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('New City'), ['action' => 'add'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['controller' => 'Guild', 'action' => 'index'], ['escape' => false]) ?> </li>
    </ul>
</div>
<ul class="breadcrumb col-md-10">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li class="active"><?= __('List City') ?></li>
</ul>

<div class="city table-responsive col-md-10">
    <?php if (count($city)): ?>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="ids"><?= $this->Paginator->sort('id', '#') ?></th>
            <th class="ids"><?= $this->Paginator->sort('guild_id', 'Guild ID') ?></th>
            <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('defence') ?></th>
            <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('eudemon_tally') ?></th>
            <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('tax_rate') ?></th>
            <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('tax_rate_time') ?></th>
            <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('taxation') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($city as $city): ?>
        <tr>
            <td class="ids"><?= $city->id ?></td>
            <td class="ids"><?= $this->Html->link($city->guild_id, ['controller' => 'Guild', 'action' => 'view', $city->guild_id]) ?></td>
            <td class="ids hidden-sm hidden-xs"><?= $city->defence ?></td>
            <td class="ids hidden-sm hidden-xs"><?= $city->eudemon_tally ?></td>
            <td class="ids hidden-sm hidden-xs"><?= $city->tax_rate ?></td>
            <td class="ids hidden-sm hidden-xs"><?= $city->tax_rate_time ?></td>
            <td class="ids hidden-sm hidden-xs"><?= $city->taxation ?></td>
            <td class="actions">
                <div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-external-link']).$this->Html->tag('div', __('View')),
                        ['action' => 'view', 'id' => $city->id],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-pencil']).$this->Html->tag('div', __('Edit')),
                        ['action' => 'edit', 'id' => $city->id],
                        ['escape' => false]) ?></div>
                    <div class="icon-contain"><?= $this->Form->postLink(
                        $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']).$this->Html->tag('div', __('Delete')),
                        ['action' => 'delete', $city->id],
                        ['escape' => false,
                        'confirm' => __('Are you sure you want to delete # {0}?', $city->id)
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
