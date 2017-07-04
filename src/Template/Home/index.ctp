<?= $this->Html->css('landing-page.css') ?>

<div class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="intro-message">
                    <h1><?= __('Game Wizard') ?></h1>
                    <h3><?= __('Administration Panel') ?></h3>
                    <hr class="intro-divider">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading"><?= __('ColumnSubheader') ?></h2>
                <div class="lead">
                    <div><?= $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-star']).__('Thesis1') ?></div>
                    <div><?= $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-star']).__('Thesis2') ?></div>
                    <div><?= $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-star']).__('Thesis3') ?></div>
                    <div><?= $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-star']).__('Thesis4') ?></div>
                    <div><?= $this->Html->tag('i', '', ['class' => 'fa fa-fw fa-star']).__('Thesis5') ?></div>
                </div>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive img-thumbnail" src="../../../webroot/img/bloodsoul_right.jpg"  alt="">
            </div>
        </div>
    </div>
</div>

<div class="banner">
    <div class="container">
        <div class="row first">
            <div class="col-lg-12">
                <h2><?= __('BannerText') ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li><?= $this->Html->link(__('Home'), ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('About'), ['action' => 'about']) ?></li>
                </ul>
                <p class="copyright text-muted small"><?= __('CopyrightText') ?></p>
            </div>
        </div>
    </div>

</div>