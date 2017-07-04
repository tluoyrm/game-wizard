<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('Add Guild City'), ['controller' => 'City', 'action' => 'add', '?' => ['guild_id' => $guildID]], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['action' => 'index'], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Back').__('Edit Guild'), ['action' => 'edit', $guildID], ['escape' => false]) ?> </li>
    </ul>
</div>
<ul class="breadcrumb col-md-10">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Guild'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Back').__('Edit Guild'), ['action' => 'edit', $guildID]) ?></li>
    <li class="active"><?= __('Related cities') ?></li>
</ul>
<div class="table-responsive col-md-10">
    <?php if (count($cities)): ?>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th class="ids"><?= $this->Paginator->sort('id', '#') ?></th>
            <th class="ids"><?= $this->Paginator->sort('defence') ?></th>
            <th class="ids"><?= $this->Paginator->sort('uudemon_tally') ?></th>
            <th class="ids"><?= $this->Paginator->sort('tax_rate') ?></th>
            <th class="ids"><?= $this->Paginator->sort('tax_rate_time') ?></th>
            <th class="ids"><?= $this->Paginator->sort('taxation') ?></th>
            <th class="ids"><?= $this->Paginator->sort('prolificacy') ?></th>
            <th class="ids"><?= $this->Paginator->sort('signup_list') ?></th>
            <th class="actions icon-contain"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <?php foreach ($cities as $city): ?>
        <tr>
            <td class="ids"><?= h($city->id) ?></td>
            <td class="ids"><?= h($city->defence) ?></td>
            <td class="ids"><?= h($city->eudemon_tally) ?></td>
            <td class="ids"><?= h($city->tax_rate) ?></td>
            <td class="ids"><?= h($city->tax_rate_time) ?></td>
            <td class="ids"><?= h($city->taxation) ?></td>
            <td class="ids"><?= h($city->prolificacy) ?></td>
            <td class="ids"><?= h($city->signup_list) ?></td>
            <td class="actions">
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Edit') ?>"><?= $this->Html->link(
                    $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                    ['controller' => 'City', 'action' => 'edit', $city->id],
                    ['escape' => false]) ?></div>
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Delete') ?>"><?= $this->Form->postLink(
                    $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']),
                    ['controller' => 'City', 'action' => 'delete', $city->id],
                    ['escape' => false,
                    'confirm' => __('Are you sure you want to delete # {0}?', $city->id)
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