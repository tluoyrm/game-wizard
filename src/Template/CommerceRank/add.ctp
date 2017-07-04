<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Commerce Rank'), ['action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>
<div class="col-md-7">
    <div class="commerceRank form well">
        <?= $this->Form->create($commerceRank, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('guild_id', ['options' => $guildIds, 'required' => true, 'label' => ['text' => 'Guild ID', 'class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('times', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('tael', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <div class="form-group">
            <div class="col-md-offset-3">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<?= $this->Html->scriptBlock('
var guildID = "'.$guild_id.'";
$("select[name=guild_id]").val(guildID);
') ?>