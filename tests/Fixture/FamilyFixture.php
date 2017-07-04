<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FamilyFixture
 *
 */
class FamilyFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'family';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'FamilyID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '家族ID', 'precision' => null, 'autoIncrement' => null],
        'FamilyName' => ['type' => 'string', 'length' => 32, 'null' => false, 'default' => null, 'comment' => '家族名字', 'precision' => null, 'fixed' => null],
        'LeaderID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '族长ID', 'precision' => null, 'autoIncrement' => null],
        'FounderID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '创始人ID', 'precision' => null, 'autoIncrement' => null],
        'Active' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '家族活跃度', 'precision' => null, 'autoIncrement' => null],
        'CreateTime' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '家族创建时间', 'precision' => null],
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
            'FamilyName' => 'Lorem ipsum dolor sit amet',
            'LeaderID' => 1,
            'FounderID' => 1,
            'Active' => 1,
            'CreateTime' => '2015-12-27 14:24:31'
        ],
    ];
}
