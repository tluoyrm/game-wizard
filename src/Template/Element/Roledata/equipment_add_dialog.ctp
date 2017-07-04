<div id="equip_add" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= __('Select Account and Roledata to assign this Item') ?></h4>
            </div>
            <form class="form-horizontal" role="form">
                <input type="hidden" name="originalRoleId" value="<?= $id ?>">
                <input type="hidden" name="serial" value="">
                <input type="hidden" name="typeID" value="">
                <input type="hidden" name="empty_option" value="<?= __('please_select') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3"><?= __('Account') ?></label>
                        <div class="col-md-9">
                            <select name="account" class="form-control">
                                <option value="0"><?= __('please_select') ?></option>
                                <?php foreach($accountCommonList as $accountCommon) { ?>
                                    <option
                                        class="<?php if ($accountCommon->AccountID == $accountID) { echo 'current'; } ?>"
                                        value="<?= $accountCommon->AccountID ?>"><?= $accountCommon->AccountName ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?= __('Roledata') ?></label>
                        <div class="col-md-9">
                            <select name="roledata" class="form-control">
                                <option value="0"><?= __('please_select') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?= __('Number') ?></label>
                        <div class="col-md-4">
                            <input id="count" type="number" name="count" class="form-control" value="1" size="10">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addEquipment();"><?= __('Add') ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= __('Cancel') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>