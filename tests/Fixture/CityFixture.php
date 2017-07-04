<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CityFixture
 *
 */
class CityFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'city';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '城市id', 'precision' => null, 'autoIncrement' => null],
        'guild_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => '4294967295', 'comment' => '帮派id', 'precision' => null, 'autoIncrement' => null],
        'defence' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '3000', 'comment' => '防御度', 'precision' => null, 'autoIncrement' => null],
        'eudemon_tally' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '守护神契合度', 'precision' => null, 'autoIncrement' => null],
        'tax_rate' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '税率', 'precision' => null, 'autoIncrement' => null],
        'tax_rate_time' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => '最近一次更新税率的时间', 'precision' => null, 'autoIncrement' => null],
        'taxation' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '税金', 'precision' => null, 'autoIncrement' => null],
        'prolificacy' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '500', 'comment' => '生产力', 'precision' => null, 'autoIncrement' => null],
        'signup_list' => ['type' => 'binary', 'length' => null, 'null' => true, 'default' => null, 'comment' => '报名列表', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'id' => 1,
            'guild_id' => 1,
            'defence' => 1,
            'eudemon_tally' => 1,
            'tax_rate' => 1,
            'tax_rate_time' => 1,
            'taxation' => 1,
            'prolificacy' => 1,
            'signup_list' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
