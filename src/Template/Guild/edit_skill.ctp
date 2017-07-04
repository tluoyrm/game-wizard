<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete'),
                ['action' => 'delete_skill', '?' => ['guild_id' => $guildSkill->guild_id, 'skill_id' => $guildSkill->skill_id]],
                ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $guildSkill->skill_id)]
            )
        ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Back').__('Related Skills'), ['action' => 'related_skills', $guildID], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Guild'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Related Skills'), ['action' => 'related_skills', $guildSkill->guild_id]) ?></li>
    <li class="active"><?= __('EditGuildSkill') ?></li>
</ul>
<div class="col-md-7">
    <div class="guild form well">
        <?= $this->Form->create($guildSkill, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('guild_id', ['type' => 'text', 'disabled' =>true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('skill_id', ['type' => 'text', 'disabled' =>true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('progress', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('level', ['required' => true, 'min' => '1', 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('researching', ['label' => ['class' => 'col-md-offset-3']]); ?>
        <?= $this->Form->input('active', ['label' => ['class' => 'col-md-offset-3']]); ?>
        <div class="form-group">
            <div class="col-md-offset-3">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>