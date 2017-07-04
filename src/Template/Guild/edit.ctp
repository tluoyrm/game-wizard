<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete'),
                ['action' => 'delete', $guild->ID],
                ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $guild->ID)]
            )
        ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Related Skills'), ['action' => 'related_skills', $guild->ID], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Related Cities'), ['action' => 'related_cities', $guild->ID], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Related Commerce Rank'), ['action' => 'related_commerce_rank', $guild->ID], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-users']).__('List Members'), ['controller' => 'Guild', 'action' => 'members', $guild->ID], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Guild'), ['action' => 'index']) ?></li>
</ul>
<div class="col-md-7">
    <div class="guild form columns well">
        <?= $this->Form->create($guild, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('ID', ['disabled' => true, 'type' => 'text', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('FounderNameID', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('LeaderID', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('SpecState', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('Level', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('HoldCity0', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('HoldCity1', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('HoldCity2', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('Fund', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('Material', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('Rep', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('DailyCost', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('Peace', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('Rank', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('CreateTime', ['required' => true, 'type' => 'text', 'class' => 'date_input', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('GroupPurchase', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('RemainSpreadTimes', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('Commendation', ['required' => 'false', 'type' => 'checkbox', 'label' => ['class' => 'col-md-offset-3']]); ?>
        <?= $this->Form->input('GuildValue1', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('GuildValue2', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <div class="form-group">
            <div class="col-md-10 col-md-offset-3">
                <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'name' => 'action', 'value' => 'save', 'class' => 'btn btn-primary']) ?>
                <?= $this->Form->button(__('Upgrade'), ['type' => 'submit', 'name' => 'action', 'value' => 'upgrade', 'class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>