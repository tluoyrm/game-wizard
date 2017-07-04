<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('EquipmentOfRoleID').' '.$roleID, ['action' => 'equipment_item', 'id' => $roleID, 'slug' => 'all']) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-7">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('RoledataList'), ['controller' => 'Roledata', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link($roleName, ['action' => 'view', $roleID]) ?></li>
    <li><?= $this->Html->link( __('Equipment'), ['action' => 'equipment_item', 'id' => $roleID, 'slug' => 'all']) ?></li>
    <li class="active"><?= $type ?></li>
</ul>
<div class="col-md-7">
    <div class="equipment form well">
        <?php
            echo $this->Form->create($oEquip, ['class' => 'form-horizontal']);
            foreach($aEquip as $field=>$value) {
                $options = ['label' => ['class' => 'col-md-3 control-label']];
                if ($field == 'cSerialNum') {
                    $options['disabled'] = true;
                    $options['label']['text'] = 'SerialNum';
                }

                if (gettype($value) == 'resource') {
                    $options['disabled'] = true;
                }
                echo $this->Form->input($field, $options);
            }
         ?>
        <div class="form-group">
            <div class="col-md-offset-3">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>