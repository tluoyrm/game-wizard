<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CommerceRankFixture
 *
 */
class CommerceRankFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'commerce_rank';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'role_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '玩家ID', 'precision' => null, 'autoIncrement' => null],
        'guild_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '帮派ID', 'precision' => null, 'autoIncrement' => null],
        'times' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '完成跑商次数', 'precision' => null, 'autoIncrement' => null],
        'tael' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '为帮派贡献的商银', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'guild_id' => ['type' => 'index', 'columns' => ['guild_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['role_id'], 'length' => []],
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
            'role_id' => 1,
            'guild_id' => 1,
            'times' => 1,
            'tael' => 1
        ],
    ];
}
