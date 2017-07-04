<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Back').__('Related Skills'), ['action' => 'related_skills', $guildID], ['escape' => false]) ?></li>
    </ul>
</div>
<div class="col-md-7">
    <div class="guildSkill columns well">
        <?= $this->Form->create($guildSkill, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('skill_id', ['disabled' => 'true', 'type' => 'text', 'label' => ['text' => 'Skill Id', 'class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('progress', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('level', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
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