<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FamilySpriteFixture
 *
 */
class FamilySpriteFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'family_sprite';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'FamilyID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '家族ID', 'precision' => null, 'autoIncrement' => null],
        'Level' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '守护妖精等级', 'precision' => null, 'autoIncrement' => null],
        'Exp' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '守护妖精成长度', 'precision' => null, 'autoIncrement' => null],
        'Name' => ['type' => 'string', 'length' => 32, 'null' => false, 'default' => null, 'comment' => '守护妖精名称', 'precision' => null, 'fixed' => null],
        'HP' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '体力能力', 'precision' => null, 'autoIncrement' => null],
        'EXAttack' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '物理攻击能力', 'precision' => null, 'autoIncrement' => null],
        'InAttack' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '法术攻击', 'precision' => null, 'autoIncrement' => null],
        'EXDefense' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '物理防御', 'precision' => null, 'autoIncrement' => null],
        'InDefense' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '法术防御', 'precision' => null, 'autoIncrement' => null],
        'EXAttackDeeper' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '物理伤害加深', 'precision' => null, 'autoIncrement' => null],
        'InAttackDeeper' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '法术伤害加深', 'precision' => null, 'autoIncrement' => null],
        'EXAttackResistance' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '物理伤害减免', 'precision' => null, 'autoIncrement' => null],
        'InAttackResistance' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '法术伤害减免', 'precision' => null, 'autoIncrement' => null],
        'Toughness' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '韧性', 'precision' => null, 'autoIncrement' => null],
        'CritDes' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '暴击抵消', 'precision' => null, 'autoIncrement' => null],
        'ControleffectDeepen' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '控制效果加深', 'precision' => null, 'autoIncrement' => null],
        'ControleffectResistance' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '控制效果抵抗', 'precision' => null, 'autoIncrement' => null],
        'SlowingeffectDeepen' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '减速效果强化', 'precision' => null, 'autoIncrement' => null],
        'SlowingeffectResistance' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '减速效果抵抗', 'precision' => null, 'autoIncrement' => null],
        'FixedeffectDeepen' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '固定伤害强化', 'precision' => null, 'autoIncrement' => null],
        'FixedeffectResistance' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '固定伤害抵抗', 'precision' => null, 'autoIncrement' => null],
        'AgingeffectDeepen' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '衰弱效果强化', 'precision' => null, 'autoIncrement' => null],
        'AgingeffectResistance' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '衰弱效果抵抗', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['FamilyID'], 'length' => []],
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
            'FamilyID' => 1,
            'Level' => 1,
            'Exp' => '',
            'Name' => 'Lorem ipsum dolor sit amet',
            'HP' => 1,
            'EXAttack' => 1,
            'InAttack' => 1,
            'EXDefense' => 1,
            'InDefense' => 1,
            'EXAttackDeeper' => 1,
            'InAttackDeeper' => 1,
            'EXAttackResistance' => 1,
            'InAttackResistance' => 1,
            'Toughness' => 1,
            'CritDes' => 1,
            'ControleffectDeepen' => 1,
            'ControleffectResistance' => 1,
            'SlowingeffectDeepen' => 1,
            'SlowingeffectResistance' => 1,
            'FixedeffectDeepen' => 1,
            'FixedeffectResistance' => 1,
            'AgingeffectDeepen' => 1,
            'AgingeffectResistance' => 1
        ],
    ];
}
