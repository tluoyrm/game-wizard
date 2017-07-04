<div class="actions">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-plus-square-o']).__('New Pet Data'), ['action' => 'add'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-10">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li class="active"><?= __('Nurslings') ?></li>
</ul>
<div class="petData table-responsive col-md-10">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="ids"><?= $this->Paginator->sort('pet_id', '#') ?></th>
                <th><?= $this->Paginator->sort('pet_name', __('Name')) ?></th>
                <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('pet_value') ?></th>
                <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('pet_pm') ?></th>
                <th class="ids"><?= $this->Paginator->sort('master_id', __('MasterID')) ?></th>
                <th class="ids"><?= $this->Paginator->sort('type_id', 'TypeID') ?></th>
                <th class="ids hidden-sm hidden-xs"><?= $this->Paginator->sort('quality') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($petData as $petData): ?>
            <tr>
                <td class="ids"><?= h($petData->pet_id) ?></td>
                <td><?= h($petData->pet_name) ?></td>
                <td class="ids"><?= h($petData->pet_value) ?></td>
                <td class="ids hidden-sm hidden-xs"><?= h($petData->pet_pm) ?></td>
                <td class="ids hidden-sm hidden-xs"><?= $this->Html->link($petData->master_id, ['controller' => 'Roledata', 'action' => 'view', $petData->master_id]) ?></td>
                <td class="ids"><?= h($petData->type_id) ?></td>
                <td class="ids hidden-sm hidden-xs"><?= h($petData->quality) ?></td>
                <td class="actions">
                    <div>
                        <div class="icon-contain"><?= $this->Html->link(
                            $this->Html->tag('i', '', ['class' => 'fa fa-external-link']).$this->Html->tag('div', __('View')),
                            ['action' => 'view', 'id' => $petData->pet_id],
                            ['escape' => false]) ?></div>
                        <div class="icon-contain"><?= $this->Html->link(
                            $this->Html->tag('i', '', ['class' => 'fa fa-pencil']).$this->Html->tag('div', __('Edit')),
                            ['action' => 'edit', 'id' => $petData->pet_id],
                            ['escape' => false]) ?></div>
                        <div class="icon-contain"><?= $this->Form->postLink(
                            $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']).$this->Html->tag('div', __('Delete')),
                            ['action' => 'delete', $petData->pet_id],
                            ['escape' => false,
                            'confirm' => __('Are you sure you want to delete # {0}?', $petData->pet_id)
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
</div>
