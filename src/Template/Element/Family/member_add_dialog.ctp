<div id="member_add" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php
                    if ($controller == 'Family'): echo __('Select Account and Roledata to assign Family "'.$familyName.'"');
                    elseif ($controller == 'Guild'): echo __('Select Account and Roledata to assign Guild #'.$guildID);
                    endif;
                 ?></h4>
            </div>
            <form class="form-horizontal" role="form">
                <?php if ($controller == 'Family'): ?>
                    <input type="hidden" name="familyID" value="<?= $familyID ?>">
                <?php elseif ($controller == 'Guild') : ?>
                    <input type="hidden" name="guildID" value="<?= $guildID ?>">
                <?php endif; ?>
                <input type="hidden" name="empty_option" value="<?= __('please_select') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3"><?= __('Account') ?></label>
                        <div class="col-md-9">
                            <select name="account" class="form-control">
                                <option value="0"><?= __('please_select') ?></option>
                                <?php foreach($accountCommonList as $accountCommon) { ?>
                                <option value="<?= $accountCommon->AccountID ?>"><?= $accountCommon->AccountName ?></option>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addMembers('<?= $controller ?>');"><?= __('Add') ?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= __('Cancel') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->Html->scriptBlock('

initMembers('.$roledataAccountsList.');

') ?>