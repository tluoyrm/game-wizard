<?php if (count($ownersList) > 0) { ?>
    <div class="equipment find table-responsive">
        <table class="table">
            <thead>
            <tr>
            <th><?= __('Number') ?></th>
            <th><?= __('TypeID') ?></th>
            <th><?= __('Type') ?></th>
            <th class="name"><?= __('Name') ?></th>
            <th><?= __('Account ID') ?></th>
            <th><?= __('AccountName') ?></th>
            <th><?= __('Role ID') ?></th>
            <th><?= __('RoleName') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($ownersList as $owner): ?>
                <tr>
                    <td class="ids"><?= $owner->Num ?></td>
                    <td><?= $owner->TypeID ?></td>
                    <td>
                        <?php if ($owner->EquipType != 'undefined') : ?>
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).$owner->EquipType, ['controller' => 'Roledata', 'action' => 'edit_equipment', '?' => ['type' => $owner->EquipType, 'serial' => $owner->cSerialNum, 'roleID' => $owner->OwnerID]], ['escape' => false]); ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $owner->Name ?></td>
                    <td class="ids"><?= $this->Html->link($owner->AccountID, ['controller' => 'AccountCommon', 'action' => 'view', 'id' => $owner->AccountID]) ?></td>
                    <td><?= $owner->AccountName ?></td>
                    <td class="ids"><?= $this->Html->link($owner->OwnerID, ['controller' => 'Roledata', 'action' => 'view', 'id' => $owner->OwnerID]) ?></td>
                    <td><?= $owner->RoleName ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div><?= __('No results') ?></div>
<?php } ?>