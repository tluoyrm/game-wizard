<div class="col-md-10">
    <div class="search_form well">
        <?= $this->Form->create('', ['class' => 'form-inline']) ?>
        <h4><?= __('Please input the serial number to find') ?></h4>
        <?= $this->Form->input('serialNum', ['label' => '', 'type' => 'text', 'id' => 'serialNum', 'size' => '50', 'placeholder' => __('Serial Number')]) ?>
        <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-search']), ['class' => 'btn btn-fab btn-primary', 'type' => 'button', 'onclick' => 'findOwners();']); ?>
        <div class="find_progress"><i class="fa fa-spinner fa-spin"></i></div>
        <?= $this->Form->end() ?>
    </div>

    <div id="find_results" class="well"></div>
<div>
