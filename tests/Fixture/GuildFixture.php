<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GuildFixture
 *
 */
class GuildFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'guild';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '帮派ID -- 名称转成小写后的CRC32值', 'precision' => null, 'autoIncrement' => null],
        'Name' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '名称', 'precision' => null],
        'FounderNameID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '帮派创始人名称ID', 'precision' => null, 'autoIncrement' => null],
        'LeaderID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '现任帮主ID', 'precision' => null, 'autoIncrement' => null],
        'SpecState' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '帮派当前特殊状态', 'precision' => null, 'autoIncrement' => null],
        'Level' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '帮派当前等级', 'precision' => null, 'autoIncrement' => null],
        'HoldCity0' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '帮派当前辖属城市编号', 'precision' => null, 'autoIncrement' => null],
        'HoldCity1' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'HoldCity2' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Fund' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '当前资金', 'precision' => null, 'autoIncrement' => null],
        'Material' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '当前资材', 'precision' => null, 'autoIncrement' => null],
        'Rep' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '当前威望', 'precision' => null, 'autoIncrement' => null],
        'DailyCost' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '每日维护费用', 'precision' => null, 'autoIncrement' => null],
        'Peace' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '当前安宁度', 'precision' => null, 'autoIncrement' => null],
        'Rank' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '当前排名(0表示还未排名)', 'precision' => null, 'autoIncrement' => null],
        'Tenet' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '宗旨', 'precision' => null],
        'Symbol' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '标志ULR', 'precision' => null],
        'CreateTime' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '创建时间', 'precision' => null],
        'GroupPurchase' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '帮派团购指数', 'precision' => null, 'autoIncrement' => null],
        'RemainSpreadTimes' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '帮务剩余发布次数', 'precision' => null, 'autoIncrement' => null],
        'Commendation' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '跑商嘉奖状态', 'precision' => null],
        'DailyRewardTakenTimes' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '公会各职务领取在线奖励次数，用于战场每日奖励的职位限制', 'precision' => null],
        'GuildValue1' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '策划需求数值1', 'precision' => null, 'autoIncrement' => null],
        'GuildValue2' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '策划需求数值2', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'ID' => 1,
            'Name' => 'Lorem ipsum dolor sit amet',
            'FounderNameID' => 1,
            'LeaderID' => 1,
            'SpecState' => 1,
            'Level' => 1,
            'HoldCity0' => 1,
            'HoldCity1' => 1,
            'HoldCity2' => 1,
            'Fund' => 1,
            'Material' => 1,
            'Rep' => 1,
            'DailyCost' => 1,
            'Peace' => 1,
            'Rank' => 1,
            'Tenet' => 'Lorem ipsum dolor sit amet',
            'Symbol' => 'Lorem ipsum dolor sit amet',
            'CreateTime' => '2016-01-09 13:21:51',
            'GroupPurchase' => 1,
            'RemainSpreadTimes' => 1,
            'Commendation' => 1,
            'DailyRewardTakenTimes' => 'Lorem ipsum dolor sit amet',
            'GuildValue1' => 1,
            'GuildValue2' => 1
        ],
    ];
}
