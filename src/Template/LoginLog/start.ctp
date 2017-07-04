<div class="col-md-8">
    <div class="login_log_form well btn-group-sm">
        <h4><?= __('Please select an account to see the login log') ?></h4>
        <?= $this->Form->create('', ['class' => 'form-inline']) ?>
        <?= $this->Form->select('accountID', $accountCommonList, ['id' => 'accountID', 'class' => 'form-control']) ?>
        <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-search']), ['class' => 'btn btn-fab btn-primary', 'type' => 'button', 'onclick' => 'getAccountLog();']); ?>
        <?= $this->Form->end() ?>
    </div>

    <div id="login_log" class="well"></div>
</div>
