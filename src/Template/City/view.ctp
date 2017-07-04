<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit City'), ['action' => 'edit', $city->id], ['escape' => false]) ?> </li>
        <li><?= $this->Form->postLink(
            $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete'),
            ['action' => 'delete', $city->id],
            ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $city->id)]
            )
            ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List City'), ['action' => 'index'], ['escape' => false]) ?> </li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List City'), ['action' => 'index']) ?></li>
</ul>
<div class="col-md-7">
    <div class="city view columns well">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('CityID') ?></div>
                <div class="col-sm-3"><?= $city->id ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Guild Id') ?></div>
                <div class="col-sm-3"><?= $city->guild_id ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Defence') ?></div>
                <div class="col-sm-3"><?= $city->defence ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Eudemon Tally') ?></div>
                <div class="col-sm-3"><?= $city->eudemon_tally ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Tax Rate') ?></div>
                <div class="col-sm-3"><?= $city->tax_rate ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Tax Rate Time') ?></div>
                <div class="col-sm-3"><?= $city->tax_rate_time ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Taxation') ?></div>
                <div class="col-sm-3"><?= $city->taxation ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Prolificacy') ?></div>
                <div class="col-sm-3"><?= $city->prolificacy ?></div>
            </div>
        </div>
    </div>
</div>
