<div class="actions">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Back').__('RoledataList'), ['action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-8">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('RoledataList'), ['controller' => 'Roledata', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link($roleName, ['action' => 'view', $id]) ?></li>
    <li class="active"><?= __('Nurslings') ?></li>
</ul>
<div class="table-responsive col-md-8">
    <?php if(count($nurslings)): ?>
    <table class="table table-hover table-striped nurslings">
        <thead>
        <tr>
            <th class="ids" style="width: 15%;">#</th>
            <th><?= __('Name') ?></th>
            <th class="ids"><?= __('pet_value') ?></th>
            <th class="ids"><?= __('pet_pm') ?></th>
            <th class="ids"><?= __('quality') ?></th>
            <th class="actions icon-contain"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($nurslings as $nursling): ?>
        <tr>
            <td class="ids"><?= $nursling->pet_id ?></td>
            <td><?= $nursling->pet_name ?></td>
            <td class="ids"><?= $nursling->pet_value ?></td>
            <td class="ids"><?= $nursling->pet_pm ?></td>
            <td class="ids"><?= $nursling->quality ?></td>
            <td class="actions">
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('View') ?>"><?= $this->Html->link(
                    $this->Html->tag('i', '', ['class' => 'fa fa-external-link']),
                    ['controller' => 'PetData', 'action' => 'view', 'id' => $nursling->pet_id],
                    ['escape' => false]) ?></div>
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Edit') ?>"><?= $this->Html->link(
                    $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                    ['controller' => 'PetData', 'action' => 'edit', 'id' => $nursling->pet_id],
                    ['escape' => false]) ?></div>
                <div class="icon-contain-inline action" data-toggle="tooltip" title="<?= __('Delete') ?>"><?= $this->Form->postLink(
                    $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']),
                    ['controller' => 'PetData', 'action' => 'delete', 'id' => $nursling->pet_id],
                    ['escape' => false,
                    'confirm' => __('Are you sure you want to delete # {0}?', $nursling->pet_id)
                    ]) ?></div>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="not_found"><?= __('Not Found') ?></div>
    <?php endif; ?>
</div>
