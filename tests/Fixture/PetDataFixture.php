<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PetDataFixture
 *
 */
class PetDataFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'pet_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '宠物id', 'precision' => null, 'autoIncrement' => null],
        'pet_name' => ['type' => 'string', 'length' => 32, 'null' => false, 'default' => null, 'comment' => '宠物名称', 'precision' => null, 'fixed' => null],
        'pet_value' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '宠物实力值', 'precision' => null, 'autoIncrement' => null],
        'pet_pm' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '宠物实力排名', 'precision' => null, 'autoIncrement' => null],
        'master_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '主人id', 'precision' => null, 'autoIncrement' => null],
        'type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '原型id', 'precision' => null, 'autoIncrement' => null],
        'quality' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '宠物品质', 'precision' => null],
        'aptitude' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '宠物资质', 'precision' => null, 'autoIncrement' => null],
        'potential' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '当前潜能', 'precision' => null, 'autoIncrement' => null],
        'cur_spirit' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '当前灵力', 'precision' => null, 'autoIncrement' => null],
        'cur_exp' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '当前经验', 'precision' => null, 'autoIncrement' => null],
        'step' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '阶', 'precision' => null],
        'grade' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '等', 'precision' => null],
        'talent_count' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '当前天资计数', 'precision' => null, 'autoIncrement' => null],
        'wuxing_energy' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '五行力', 'precision' => null, 'autoIncrement' => null],
        'pet_state' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '宠物状态', 'precision' => null, 'autoIncrement' => null],
        'pet_lock' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '宠物锁定', 'precision' => null],
        'RemoveFlag' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '删除标志位', 'precision' => null],
        'birthday' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '创建时间', 'precision' => null, 'autoIncrement' => null],
        'live' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '宠物生存状态', 'precision' => null, 'autoIncrement' => null],
        'lifeadded' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '附加寿命', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'master_id' => ['type' => 'index', 'columns' => ['master_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['pet_id'], 'length' => []],
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
            'pet_id' => 1,
            'pet_name' => 'Lorem ipsum dolor sit amet',
            'pet_value' => 1,
            'pet_pm' => 1,
            'master_id' => 1,
            'type_id' => 1,
            'quality' => 1,
            'aptitude' => 1,
            'potential' => 1,
            'cur_spirit' => 1,
            'cur_exp' => 1,
            'step' => 1,
            'grade' => 1,
            'talent_count' => 1,
            'wuxing_energy' => 1,
            'pet_state' => 1,
            'pet_lock' => 1,
            'RemoveFlag' => 1,
            'birthday' => '',
            'live' => 1,
            'lifeadded' => 1
        ],
    ];
}
