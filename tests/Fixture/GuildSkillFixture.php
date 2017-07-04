<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GuildSkillFixture
 *
 */
class GuildSkillFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'guild_skill';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'guild_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '帮派ID', 'precision' => null, 'autoIncrement' => null],
        'skill_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '技能ID', 'precision' => null, 'autoIncrement' => null],
        'progress' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '升级进度', 'precision' => null, 'autoIncrement' => null],
        'level' => ['type' => 'integer', 'length' => 2, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '当前等级', 'precision' => null, 'autoIncrement' => null],
        'researching' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '当前正在研究中', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '当前已经激活了,0表示未激活', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['guild_id', 'skill_id'], 'length' => []],
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
            'guild_id' => 1,
            'skill_id' => 1,
            'progress' => 1,
            'level' => 1,
            'researching' => 1,
            'active' => 1
        ],
    ];
}
