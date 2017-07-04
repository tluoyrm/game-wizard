<?= $this->Html->css('auth.css') ?>

<div class="col-md-6 col-sm-8">
    <div class="well">
        <?= $this->Form->create('', ['autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
            <?= $this->Form->input('secret', ['autocomplete' => 'off', 'data-toggle' => 'tooltip', 'title' => __('secret_description'), 'label' => ['text' => __('Secret'), 'class' => 'col-md-2 col-xs-2 control-label']]) ?>
            <div class="form-group">
                <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                    <?= $this->Form->button(__('Send'), ['class' => 'btn btn-primary']); ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>
