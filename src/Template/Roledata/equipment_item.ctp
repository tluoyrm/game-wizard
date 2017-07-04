<ul class="breadcrumb">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('RoledataList'), ['controller' => 'Roledata', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link($roleName, ['action' => 'view', $id]) ?></li>
    <?php if ($selectedEquipType == 'all'): ?>
        <li class="active"><?= __('Equipment') ?></li>
    <?php else: ?>
        <li><?= $this->Html->link(__('Equipment'), ['action' => 'equipment_item', 'id' => $id, 'slug' => 'all']) ?></li>
        <li class="active"><?= $selectedEquipType ?></li>
    <?php endif; ?>
</ul>

<div class="actions">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('Back').__('RoledataList'), ['action' => 'index'], ['escape' => false]) ?></li>
    </ul>
</div>

<div class="table-responsive">
    <?php if ($itemListCount > 0): ?>
    <table class="table table-hover table-striped equip">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('SerialNum') ?></th>
            <th><?= $this->Paginator->sort('TypeID') ?></th>
            <th><?= $this->Paginator->sort('Num') ?></th>
            <th>
                <input type="hidden" name="roleID" value="<?= $id ?>">
                <input type="hidden" name="subaction">
                <div class="equip_type_container">
                    <select id="equipType" name="equipType" class="form-control">
                        <option value="all" selected="selected"><?= __('EquipType') ?></option>
                        <?php foreach($equipTypes as $type) { ?>
                        <option value="<?= $type ?>" <?php if($type==$selectedEquipType) { echo 'selected="selected"';} ?>><?= $type ?></option>
                        <?php } ?>
                    </select>
                    <div class="sort_container <?php if($selectedEquipType != 'all'): echo 'disabled'; endif;?>">
                        <?php
                            $hiddenDirection == 'desc' ? $direction = 'asc' : $direction = 'desc';
                            if ($direction == 'asc') :
                                echo $this->Paginator->sort('EquipType', '<i class="fa fa-sort-alpha-asc"></i>', ['escape' => false, 'direction' => $direction]);
                            else:
                                echo $this->Paginator->sort('EquipType', '<i class="fa fa-sort-alpha-desc"></i>', ['escape' => false, 'direction' => $direction]);
                            endif;
                        ?>
                    </div>
                </div>
            </th>
            <th><?= __('Name') ?></th>
            <th><?= __('Bind') ?></th>
            <th><?= __('Create Time') ?></th>
            <th><?= __('Delete Time') ?></th>
            <th class="actions centered"><?= __('Actions') ?></th>
        </tr>
        </thead>

        <tbody>
            <?php foreach ($itemList as $item): ?>
            <tr>
                <td><?= $item->cSerialNum ?></td>
                <td><?= $item->TypeID ?></td>
                <td><?= $item->Num ?></td>
                <td>
                    <?php
                        if (!isset($item->EquipType)) {
                            echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__($selectedEquipType), ['action' => 'edit_equipment', '?' => ['type' => $selectedEquipType, 'serial' => $item->cSerialNum, 'roleID' => $id]], ['escape' => false]);
                        } else {
                            if($item->EquipType == 'undefined') {
                                echo '';
                            } else {
                                echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__($item->EquipType), ['action' => 'edit_equipment', '?' => ['type' => $item->EquipType, 'serial' => $item->cSerialNum, 'roleID' => $id]], ['escape' => false]);
                            }
                        }
                    ?>
                </td>
                <td><?= $item->Name ?></td>
                <td><?= $item->Bind ?></td>
                <td><?= $item->CreateTime ?></td>
                <td><?= $item->del_time ?></td>
                <td class="actions">
                    <div class="action" data-toggle="tooltip" title="<?= __('delete_item') ?>">
                        <?php
                        $equipType = $selectedEquipType;
                        if (isset($item->EquipType)) {
                            $equipType = $item->EquipType;
                        }
                        ?>
                        <?= $this->Form->postLink(
                        $this->Html->tag('i', '', ['class' => 'fa fa-minus-circle']),
                        ['action' => 'del_equip'],
                        ['escape' => false,
                         'data' => ['serial' => $item->cSerialNum, 'typeid' => $item->TypeID, 'roleid' => $id, 'type' => $equipType],
                         'confirm' => __('Are you sure you want to delete item # {0}?', $item->cSerialNum)
                        ]) ?>
                    </div>
                    <div class="action" data-toggle="tooltip" title="<?= __('copy_item') ?>">
                        <a href="javascript:void(0);" class="copy_item" data-original-roleid="<?= $id ?>" data-serial="<?= $item->cSerialNum ?>" data-typeid="<?= $item->TypeID ?>" data-toggle="modal" data-target="#equip_add"><i class="fa fa-plus-circle"></i></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td><?= __('Total') ?>:</td>
            <td colspan="8"><?= $itemListCount ?></td>
        </tr>
        </tfoot>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?php else: ?>
    <div class="not_found"><?= __('Not Found') ?></div>
    <?php endif; ?>
</div>

<?= $this->element('Roledata/equipment_add_dialog'); ?>

<?= $this->Html->scriptBlock('

    initEquipment('.$roledataAccountsList.');

') ?>