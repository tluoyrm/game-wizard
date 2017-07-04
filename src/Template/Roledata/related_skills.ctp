<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Roledata'), ['action' => 'index'], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Back').__('Edit Roledata'), ['action' => 'edit', $roleID], ['escape' => false]) ?> </li>
    </ul>
</div>
<ul class="breadcrumb col-md-8">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Roledata'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Back').__('Edit Roledata'), ['action' => 'edit', $roleID]) ?></li>
    <li class="active"><?= __('Related Skills') ?></li>
</ul>
<div class="table-responsive col-md-8" style="padding-bottom: 20px;">
    <?php if (count($skills)): ?>
    <?= $this->Form->create('', ['class' => 'table_editor', 'method' => 'post']) ?>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th class="ids">#</th>
            <th class="ids"><?= __('BiddenLevel') ?></th>
            <th class="ids"><?= __('SelfLevel') ?></th>
            <th class="ids"><?= __('Proficiency') ?></th>
            <th class="ids"><?= __('CoolDown') ?></th>
            <th class="ids"><?= __('active_time') ?></th>
        </tr>
        </thead>
        <?php foreach ($skills as $skill): ?>
        <tr>
            <td class="ids"><?= $skill->ID ?></td>
            <td class="ids"><?= $this->Form->input('skills['.$skill->ID.'][BiddenLevel]', ['type' => 'number', 'readonly' => 'readonly', 'value' => $skill->BiddenLevel]) ?></td>
            <td class="ids"><?= $this->Form->input('skills['.$skill->ID.'][SelfLevel]', ['type' => 'number', 'readonly' => 'readonly', 'value' => $skill->SelfLevel]) ?></td>
            <td class="ids"><?= $this->Form->input('skills['.$skill->ID.'][Proficiency]', ['type' => 'number', 'readonly' => 'readonly', 'value' => $skill->Proficiency]) ?></td>
            <td class="ids"><?= $this->Form->input('skills['.$skill->ID.'][CoolDown]', ['type' => 'number', 'readonly' => 'readonly', 'value' => $skill->CoolDown]) ?></td>
            <td class="ids"><?= $this->Form->input('skills['.$skill->ID.'][active_time]', ['type' => 'number', 'readonly' => 'readonly', 'value' => $skill->active_time]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="buttons_block">
        <?= $this->Form->button(__('Upgrade'), ['type' => 'submit', 'name' => 'action', 'value' => 'upgrade', 'class' => 'btn btn-raised btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
    <?php else: ?>
    <div class="not_found"><?= __('Not Found') ?></div>
    <?php endif; ?>
</div>