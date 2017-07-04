<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit Pet Data'), ['action' => 'edit', $petData->pet_id], ['escape' => false]) ?> </li>
        <li><?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete Pet Data'), ['action' => 'delete', $petData->pet_id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $petData->pet_id)]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Pet Data'), ['action' => 'index'], ['escape' => false]) ?> </li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Pet Data'), ['action' => 'index']) ?></li>
    <li class="active"><?= $petData->pet_name ?></li>
</ul>

<div class="col-md-7">
    <div class="petData columns view well">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('PetID') ?></div>
                <div class="col-md-8"><?= h($petData->pet_id) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Pet Name') ?></div>
                <div class="col-md-8"><?= h($petData->pet_name) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Pet Value') ?></div>
                <div class="col-md-8"><?= h($petData->pet_value) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Pet Pm') ?></div>
                <div class="col-md-8"><?= h($petData->pet_pm) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Master Id') ?></div>
                <div class="col-md-8"><?= h($petData->master_id) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Type Id') ?></div>
                <div class="col-md-8"><?= h($petData->type_id) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Aptitude') ?></div>
                <div class="col-md-8"><?= h($petData->aptitude) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Potential') ?></div>
                <div class="col-md-8"><?= h($petData->potential) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Cur Spirit') ?></div>
                <div class="col-md-8"><?= h($petData->cur_spirit) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Cur Exp') ?></div>
                <div class="col-md-8"><?= h($petData->cur_exp) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Talent Count') ?></div>
                <div class="col-md-8"><?= h($petData->talent_count) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Wuxing Energy') ?></div>
                <div class="col-md-8"><?= h($petData->wuxing_energy) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Pet State') ?></div>
                <div class="col-md-8"><?= h($petData->pet_state) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Birthday') ?></div>
                <div class="col-md-8"><?= h($petData->birthday) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Live') ?></div>
                <div class="col-md-8"><?= h($petData->live) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Lifeadded') ?></div>
                <div class="col-md-8"><?= h($petData->lifeadded) ?></div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Quality') ?></div>
                <div class="col-md-8"><?= $petData->quality ? __('Yes') : __('No'); ?></div>
             </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Step') ?></div>
                <div class="col-md-8"><?= $petData->step ? __('Yes') : __('No'); ?></div>
             </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Grade') ?></div>
                <div class="col-md-8"><?= $petData->grade ? __('Yes') : __('No'); ?></div>
             </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('Pet Lock') ?></div>
                <div class="col-md-8"><?= $petData->pet_lock ? __('Yes') : __('No'); ?></div>
             </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 subheader"><?= __('RemoveFlag') ?></div>
                <div class="col-md-8"><?= $petData->RemoveFlag ? __('Yes') : __('No'); ?></div>
             </div>
        </div>
    </div>
</div>
