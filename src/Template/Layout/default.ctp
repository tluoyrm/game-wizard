<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Wizard</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-theme.min.css') ?>
    <?= $this->Html->css('sb-admin.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('chosen.css') ?>
    <?= $this->Html->css('bootstrap-material-design.min.css') ?>
    <?= $this->Html->css('ripples.min.css') ?>
    <?= $this->Html->css('snackbar.min.css') ?>
    <?= $this->Html->css('bootstrap-material-datetimepicker.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?= $this->Html->Script('jquery-1.11.3.min.js') ?>
    <?= $this->Html->Script('bootstrap.min.js') ?>
    <?= $this->Html->Script('material.min.js') ?>
    <?= $this->Html->Script('ripples.min.js') ?>
    <?= $this->Html->Script('snackbar.min.js') ?>
    <?= $this->Html->Script('chosen.jquery.min.js') ?>
    <?= $this->Html->Script('moment-with-locales.min.js') ?>
    <?= $this->Html->Script('bootstrap-material-datetimepicker.js') ?>
    <?= $this->Html->Script('main.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper" class="btn-group-sm">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><?= __('Game Wizard') ?></a>
            </div>
            <ul class="nav navbar-nav navbar-collapse top-nav">
                <li class="dropdown" id="actions">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-bars"></i> <?= __('Actions') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu"></ul>
                </li>
            </ul>
            <?= $this->Form->create('', ['autocomplete' => 'off', 'class' => 'navbar-form navbar-left hidden-sm hidden-xs', 'id' => 'search_form', 'url' => ['controller' => 'Home', 'action' => 'search'], 'type' => 'get']) ?>
                <?= $this->Form->input('search', ['autocomplete' => 'off', 'type' => 'text', 'class' => 'form-control', 'placeholder' => __('Search')]) ?>
                <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-search']), ['class' => 'btn btn-fab btn-default', 'type' => 'submit']); ?>
            <?= $this->Form->end() ?>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="lang_drop"><i class="fa fa-fw fa-globe"></i> <?= __('Language') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu lang">
                        <li>
                            <?= $this->Form->create('', ['type' => 'post', 'id' => 'language_form']) ?>
                            <?= $this->Form->select('language', ['en' => 'English', 'ru' => 'Русский'], ['default' => $lang, 'size' => 2, 'class' => 'lang_select']) ?>
                            <?= $this->Form->end() ?>
                        </li>
                    </ul>
                </li>
                <?php
                if ($is_authorized) { ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i> <?= $username ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-user']).__('Profile'),
                                ['controller' => 'Users', 'action' => 'profile'], ['escape' => false]) ?>
                            </li>
                            <li>
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-gear']).__('Settings'),
                                ['controller' => 'Users', 'action' => 'settings'], ['escape' => false]) ?>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-power-off']).__('Logout'),
                                ['controller' => 'Users', 'action' => 'logout'],
                                ['escape' => false]) ?>
                            </li>
                        </ul>
                    </li>
                <?php
                } else { ?>
                    <li>
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-user']).__('SignUp'),
                                 ['controller' => 'Users', 'action' => 'add'],
                                 ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-sign-in']).__('SignIn'),
                                 ['controller' => 'Users', 'action' => 'login'],
                                 ['escape' => false]) ?>
                    </li>
                <?php } ?>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li data-controller="Home">
                        <?= $this->Html->link(
                            $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-home']).__('Home'),
                            ['controller' => 'Home', 'action' => 'index', 'lang' => $lang],
                            ['escape' => false]) ?>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#tables"><i class="fa fa-fw fa-table"></i><?= __('Tables') ?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="tables" class="collapse">
                            <li data-controller="AccountCommon"><?= $this->Html->link(__('ListAccountCommon'), ['controller' => 'AccountCommon', 'action' => 'index']) ?></li>
                            <li data-controller="Roledata"><?= $this->Html->link(__('RoledataList'), ['controller' => 'Roledata', 'action' => 'index']) ?></li>
                            <li data-controller="PetData"><?= $this->Html->link(__('PetData'), ['controller' => 'PetData', 'action' => 'index']) ?></li>
                            <li data-controller="Family"><?= $this->Html->link(__('FamilyList'), ['controller' => 'Family', 'action' => 'index']) ?></li>
                            <li data-controller="Guild"><?= $this->Html->link(__('GuildList'), ['controller' => 'Guild', 'action' => 'index']) ?></li>
                            <li data-controller="City"><?= $this->Html->link(__('CityList'), ['controller' => 'City', 'action' => 'index']) ?></li>
                            <!-- li data-controller="CommerceRank"><?= $this->Html->link(__('CommerceRankList'), ['controller' => 'CommerceRank', 'action' => 'index']) ?></li-->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#equipment"><i class="fa fa-fw fa-briefcase"></i><?= __('Equipment') ?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="equipment" class="collapse">
                            <li data-controller="Equipment"><?= $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-search']).__('Find'),
                                ['controller' => 'Equipment', 'action' => 'start', 'lang' => $lang],
                                ['escape' => false]); ?></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#reports"><i class="fa fa-fw fa-file-text"></i><?= __('Reports') ?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="reports" class="collapse">
                            <li data-controller="LoginLog"><?= $this->Html->link(__('ListLoginLog'), ['controller' => 'LoginLog', 'action' => 'start', 'lang' => $lang]); ?></li>
                        </ul>
                    </li>
                    <li id="search_block" class="visible-sm visible-xs">
                        <?= $this->Form->create('', ['autocomplete' => 'off', 'class' => 'navbar-form navbar-left', 'id' => 'search_form', 'url' => ['controller' => 'Home', 'action' => 'search'], 'type' => 'get']) ?>
                        <?= $this->Form->input('search', ['autocomplete' => 'off', 'type' => 'text', 'class' => 'form-control', 'placeholder' => __('Search')]) ?>
                        <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-search']), ['class' => 'btn btn-fab btn-default', 'type' => 'submit']); ?>
                        <?= $this->Form->end() ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>

<?= $this->Html->scriptBlock('
        $.material.init();

        uploadActions();

        $("input.date_input").bootstrapMaterialDatePicker({ format : "YYYY-MM-DD HH:mm:ss" });

        var controller = "'.$controller.'";
        if (controller == "Account") controller = "AccountCommon";
        setMenuActive(controller);

        $(".lang_select").chosen({width: "100%", disable_search: true}).change(function(){
            languageChange();
        });

        $("#lang_drop").on("click", function() {
            $(".lang_select").trigger("chosen:open");
        });
    ') ?>

</body>
</html>
