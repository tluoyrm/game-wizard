<div class="profile col-md-5">
    <legend><?= __('Profile') ?></legend>
    <div class="row">
        <div class="list-group">
            <div class="list-group-item">
                <div class="row-action-primary"><i class="material-icons">folder</i></div>
                <div class="row-content">
                    <h4 class="list-group-item-heading"><?= __('Account Created') ?></h4>
                    <p class="list-group-item-text"><?= $user->created ?></p>
                </div>
            </div>
            <div class="list-group-separator"></div>
            <div  class="list-group-item">
                <div class="row-action-primary"><i class="material-icons">folder</i></div>
                <div class="row-content">
                    <h4 class="list-group-item-heading"><?= __('Login Time') ?></h4>
                    <p class="list-group-item-text"><?= $user->last_login ?>&nbsp;</p>
                </div>
            </div>
            <div class="list-group-separator"></div>
            <div  class="list-group-item">
                <div class="row-action-primary"><i class="material-icons">folder</i></div>
                <div class="row-content">
                    <h4 class="list-group-item-heading"><?= __('Logout Time') ?></h4>
                    <p class="list-group-item-text"><?= $user->last_logout ?>&nbsp;</p>
                </div>
            </div>
            <div class="list-group-separator"></div>
            <div  class="list-group-item">
                <div class="row-action-primary"><i class="material-icons">folder</i></div>
                <div class="row-content">
                    <h4 class="list-group-item-heading"><?= __('User Role') ?></h4>
                    <p class="list-group-item-text"><?= $user->role ?></p>
                </div>
            </div>
        </div>
    </div>
</div>