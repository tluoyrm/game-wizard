<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
            $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete'),
                ['action' => 'delete', $city->id],
                ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $city->id)]
            )
        ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List City'), ['action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>

<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Guild'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Guild'), ['controller' => 'Guild', 'action' => 'view', $city->guild_id]) ?></li>
    <li><?= $this->Html->link(__('Related Cities'), ['controller' => 'Guild', 'action' => 'related_cities', $city->guild_id]) ?></li>
</ul>
<div class="col-md-7">
    <div class="city form columns well">
        <?= $this->Form->create($city, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('id', ['disabled' => true, 'type' => 'text', 'type' => 'text', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('guild_id', ['required' => true, 'type' => 'text', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('defence', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('eudemon_tally', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('tax_rate', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('tax_rate_time', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('taxation', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('prolificacy', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-10">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>