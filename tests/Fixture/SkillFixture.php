<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillFixture
 *
 */
class SkillFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'skill';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'RoleID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'BiddenLevel' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '投点等级', 'precision' => null, 'autoIncrement' => null],
        'SelfLevel' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '固有等级', 'precision' => null, 'autoIncrement' => null],
        'Proficiency' => ['type' => 'integer', 'length' => 8, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '技能熟练程度', 'precision' => null, 'autoIncrement' => null],
        'CoolDown' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'buff作用时间(单位:毫秒)', 'precision' => null, 'autoIncrement' => null],
        'active_time' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => '激活时间', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['RoleID', 'ID'], 'length' => []],
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
            'RoleID' => 1,
            'ID' => 1,
            'BiddenLevel' => 1,
            'SelfLevel' => 1,
            'Proficiency' => 1,
            'CoolDown' => 1,
            'active_time' => 1
        ],
    ];
}
