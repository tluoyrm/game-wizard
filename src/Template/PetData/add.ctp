<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-list-alt']).__('List Pet Data'), ['action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Pet Data'), ['action' => 'index']) ?></li>
    <li class="active"><?= __('PetDataAdd') ?></li>
</ul>
<div class="col-md-7">
    <div class="petData form well">
        <?= $this->Form->create($petData, ['class' => 'form-horizontal']) ?>
        <?= $this->Form->input('pet_name', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('pet_value', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('pet_pm', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('master_id', ['options' => $roledata,'required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label', 'text' => 'Master']]); ?>
        <?= $this->Form->input('type_id', ['required' => true, 'type' => 'text', 'label' => ['class' => 'col-md-3 col-xs-3 control-label', 'text' => 'TypeID']]); ?>
        <?= $this->Form->input('quality', ['label' => ['class' => 'col-md-offset-3']]); ?>
        <?= $this->Form->input('aptitude', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('potential', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('cur_spirit', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('cur_exp', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('step', ['label' => ['class' => 'col-md-offset-3']]); ?>
        <?= $this->Form->input('grade', ['label' => ['class' => 'col-md-offset-3']]); ?>
        <?= $this->Form->input('talent_count', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('wuxing_energy', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('pet_state', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('pet_lock', ['label' => ['class' => 'col-md-offset-3']]); ?>
        <?= $this->Form->input('RemoveFlag', ['label' => ['class' => 'col-md-offset-3']]); ?>
        <?= $this->Form->input('birthday', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('live', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <?= $this->Form->input('lifeadded', ['required' => true, 'label' => ['class' => 'col-md-3 col-xs-3 control-label']]); ?>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-10">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>    
