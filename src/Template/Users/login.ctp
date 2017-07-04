<div class="col-md-6">
    <div class="form well">
        <?= $this->Form->create('User', ['autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
        <legend><?= __('Please login'); ?></legend>

        <?= $this->Form->input('username', ['autocomplete' => 'off', 'label' => ['text' => __('Username'), 'class' => 'col-md-2 col-xs-2 control-label']]) ?>
        <?= $this->Form->input('password', ['autocomplete' => 'off', 'label' => ['text' => __('Password'), 'class' => 'col-md-2 col-xs-2 control-label']]) ?>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']); ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
