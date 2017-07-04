<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Commerce Rank'), ['action' => 'edit', $commerceRank->role_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commerce Rank'), ['action' => 'delete', $commerceRank->role_id], ['confirm' => __('Are you sure you want to delete # {0}?', $commerceRank->role_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Commerce Rank'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commerce Rank'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="commerceRank view columns">
    <h2><?= h($commerceRank->role_id) ?></h2>
    <div class="row">
        <div class="form-group col-sm-10">
            <div class="col-sm-2 subheader"><?= __('Guild Id') ?></div>
            <div class="col-sm-3"><?= $commerceRank->guild_id ?></div>
        </div>
        <div class="form-group col-sm-10">
            <div class="col-sm-2 subheader"><?= __('Times') ?></div>
            <div class="col-sm-3"><?= $commerceRank->times ?></div>
        </div>
        <div class="form-group col-sm-10">
            <div class="col-sm-2 subheader"><?= __('Tael') ?></div>
            <div class="col-sm-3"><?= $commerceRank->tael ?></div>
        </div>
    </div>
</div>
