<div class="col-md-6">
    <div class="well">
        <?= $this->Form->create($user, ['autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
        <?= $this->Form->input('id', ['type' => 'hidden']) ?>
        <legend><?= __('User settings') ?></legend>
        <?= $this->Form->input('username', ['autocomplete' => 'off', 'label' => ['text' => __('Username'), 'class' => 'col-md-3 col-xs-3 control-label']]) ?>
        <?= $this->Form->input('password', ['autocomplete' => 'off', 'label' => ['text' => __('Password'), 'class' => 'col-md-3 col-xs-3 control-label'], 'value' => '']) ?>
        <?= $this->Form->input('password2', ['autocomplete' => 'off', 'type' => 'password', 'label' => ['text' => __('Repeat Password'), 'class' => 'col-md-3 col-xs-3 control-label'], 'value' => '']) ?>
        <?= $this->Form->input('role', ['options' => $roleOptions, 'label' => ['text' => __('Role'), 'class' => 'col-md-3 col-xs-3 control-label']]) ?>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <?= $this->Form->button(__('Cancel'), ['type' => 'reset', 'class' => 'btn btn-default']); ?>
                <?= $this->Form->button(__('Update'), ['type' => 'submit', 'class' => 'btn btn-primary']); ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>