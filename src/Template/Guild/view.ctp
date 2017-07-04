<div class="actions columns">
    <ul class="side-nav">
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-table']).__('List Guild'), ['action' => 'index'], ['escape' => false]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-pencil']).__('Edit Guild'), ['action' => 'edit', $guild->ID], ['escape' => false]) ?> </li>
        <li><?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-trash-o']).__('Delete Guild'), ['action' => 'delete', $guild->ID], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $guild->ID)]) ?> </li>
        <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-fw fa-users']).__('List Members'), ['controller' => 'Guild', 'action' => 'members', $guild->ID], ['escape' => false]) ?></li>
    </ul>
</div>
<ul class="breadcrumb col-md-10">
    <li><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Guild'), ['action' => 'index']) ?></li>
</ul>

<div class="col-md-10 well view">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#panel_view"><?= __('Fields') ?></a></li>
        <li><a data-toggle="tab" href="#panel_cities"><?= __('Cities') ?></a></li>
        <li><a data-toggle="tab" href="#panel_commerce_ranks"><?= __('Commerce Ranks') ?></a></li>
        <li><a data-toggle="tab" href="#panel_guild_skills"><?= __('Skills') ?></a></li>
    </ul>
    <div class="tab-content">
        <div id="panel_view" class="tab-pane fade in active">
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('GuildID') ?></div>
                    <div class="col-md-4"><?= $guild->ID ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('FounderNameID') ?></div>
                    <div class="col-md-4"><?= $guild->FounderNameID ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('LeaderID') ?></div>
                    <div class="col-md-4"><?= $guild->LeaderID ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('SpecState') ?></div>
                    <div class="col-md-4"><?= $guild->SpecState ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('Level') ?></div>
                    <div class="col-md-4"><?= $guild->Level ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('HoldCity0') ?></div>
                    <div class="col-md-4"><?= $guild->HoldCity0 ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('HoldCity1') ?></div>
                    <div class="col-md-4"><?= $guild->HoldCity1 ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('HoldCity2') ?></div>
                    <div class="col-md-4"><?= $guild->HoldCity2 ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('Fund') ?></div>
                    <div class="col-md-4"><?= $guild->Fund ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('Material') ?></div>
                    <div class="col-md-4"><?= $guild->Material ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('Rep') ?></div>
                    <div class="col-md-4"><?= $guild->Rep ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('DailyCost') ?></div>
                    <div class="col-md-4"><?= $guild->DailyCost ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('Peace') ?></div>
                    <div class="col-md-4"><?= $guild->Peace ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('Rank') ?></div>
                    <div class="col-md-4"><?= $guild->Rank ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('GroupPurchase') ?></div>
                    <div class="col-md-4"><?= $guild->GroupPurchase ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('RemainSpreadTimes') ?></div>
                    <div class="col-md-4"><?= $guild->RemainSpreadTimes ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('GuildValue1') ?></div>
                    <div class="col-md-4"><?= $guild->GuildValue1 ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('GuildValue2') ?></div>
                    <div class="col-md-4"><?= $guild->GuildValue2 ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('CreateTime') ?></div>
                    <div class="col-md-4"><?= h($guild->CreateTime) ?></div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-4 subheader"><?= __('Commendation') ?></div>
                    <div class="col-md-4"><?= $guild->Commendation ? __('Yes') : __('No'); ?></div>
                </div>
            </div>
        </div>
        <div id="panel_cities" class="tab-pane fade in">
            <div class="row">
            <?php if (!empty($guild->city)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th class="ids"><?= __('#') ?></th>
                        <th class="ids"><?= __('Defence') ?></th>
                        <th class="ids"><?= __('Eudemon Tally') ?></th>
                        <th class="ids"><?= __('Tax Rate') ?></th>
                        <th class="ids"><?= __('Tax Rate Time') ?></th>
                        <th class="ids"><?= __('Taxation') ?></th>
                        <th class="ids"><?= __('Prolificacy') ?></th>
                        <th class="ids"><?= __('Signup List') ?></th>
                        <th class="actions icon-contain"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($guild->city as $city): ?>
                    <tr>
                        <td class="ids"><?= h($city->id) ?></td>
                        <td class="ids"><?= h($city->defence) ?></td>
                        <td class="ids"><?= h($city->eudemon_tally) ?></td>
                        <td class="ids"><?= h($city->tax_rate) ?></td>
                        <td class="ids"><?= h($city->tax_rate_time) ?></td>
                        <td class="ids"><?= h($city->taxation) ?></td>
                        <td class="ids"><?= h($city->prolificacy) ?></td>
                        <td class="ids"><?= h($city->signup_list) ?></td>
                        <td class="actions">
                            <div class="icon-contain-inline action"><?= $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                                ['controller' => 'City', 'action' => 'edit', $city->id],
                                ['escape' => false]) ?></div>
                            <div class="icon-contain-inline action"><?= $this->Form->postLink(
                                $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']),
                                ['controller' => 'City', 'action' => 'delete', $city->id],
                                ['escape' => false,
                                'confirm' => __('Are you sure you want to delete # {0}?', $city->id)
                                ]) ?></div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php else: ?>
                <div class="not_found"><?= __('Not Found') ?></div>
            <?php endif; ?>
            </div>
        </div>
        <div id="panel_commerce_ranks" class="tab-pane fade in">
            <div class="row">
            <?php if (!empty($guild->commerce_rank)): ?>
            <div class="table-responsive col-md-6">
                <table class="table table-hover">
                    <tr>
                        <th class="ids"><?= __('Role#') ?></th>
                        <th class="ids"><?= __('Times') ?></th>
                        <th class="ids"><?= __('Tael') ?></th>
                        <th class="actions icon-contain"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($guild->commerce_rank as $commerceRank): ?>
                    <tr>
                        <td class="ids"><?= h($commerceRank->role_id) ?></td>
                        <td class="ids"><?= h($commerceRank->times) ?></td>
                        <td class="ids"><?= h($commerceRank->tael) ?></td>
                        <td class="actions">
                            <div class="icon-contain-inline action"><?= $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                                ['controller' => 'CommerceRank', 'action' => 'edit', $commerceRank->role_id],
                                ['escape' => false]) ?></div>
                            <div class="icon-contain-inline action"><?= $this->Form->postLink(
                                $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']),
                                ['controller' => 'CommerceRank', 'action' => 'delete', $commerceRank->role_id],
                                ['escape' => false,
                                'confirm' => __('Are you sure you want to delete # {0}?', $commerceRank->role_id)
                                ]) ?></div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php else: ?>
                <div class="not_found"><?= __('Not Found') ?></div>
            <?php endif; ?>
            </div>
        </div>
        <div id="panel_guild_skills" class="tab-pane fade in">
            <div class="row">
            <?php if (!empty($guild->guild_skill)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th class="ids"><?= __('#') ?></th>
                        <th class="ids"><?= __('Progress') ?></th>
                        <th class="ids"><?= __('Level') ?></th>
                        <th class="ids"><?= __('Researching') ?></th>
                        <th class="ids"><?= __('Active') ?></th>
                        <!--th class="actions icon-contain"><?= __('Actions') ?></th-->
                    </tr>
                    <?php foreach ($guild->guild_skill as $skill): ?>
                    <tr>
                        <td class="ids"><?= h($skill->skill_id) ?></td>
                        <td class="ids"><?= h($skill->progress) ?></td>
                        <td class="ids"><?= h($skill->level) ?></td>
                        <td class="ids"><?= $skill->researching ? __('Yes') : __('No') ?></td>
                        <td class="ids"><?= $skill->active ? __('Yes') : __('No') ?></td>
                        <!--td class="actions">
                            <div class="icon-contain-inline action"><?= $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fa fa-pencil']),
                                ['action' => 'edit_skill', '?' => ['guild_id' => $skill->guild_id, 'skill_id' => $skill->skill_id]],
                                ['escape' => false]) ?></div>
                            <div class="icon-contain-inline action"><?= $this->Form->postLink(
                                $this->Html->tag('i', '', ['class' => 'fa fa-trash-o']),
                                ['action' => 'delete_skill', '?' => ['skill_id' => $skill->skill_id, 'guild_id' => $skill->guild_id]],
                                ['escape' => false,
                                'confirm' => __('Are you sure you want to delete # {0}?', $skill->skill_id)
                                ]) ?></div>
                        </td-->
                    </tr>

                    <?php endforeach; ?>
                </table>
            </div>
            <?php else: ?>
                <div class="not_found"><?= __('Not Found') ?></div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>