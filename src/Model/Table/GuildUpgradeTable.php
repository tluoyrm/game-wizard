<?php
namespace App\Model\Table;

use App\Model\Entity\Guild;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * GuildUpgrade Model
 */
class GuildUpgradeTable extends Table
{
    private $maxLevel = 5;
    private $itemTypeValue = 4294967295;

    public static function defaultConnectionName() {
        return 'sm_db';
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('guild_upgrade');
        $this->primaryKey(['guild_id', 'type']);
        $this->schema()->columnType('guild_id', 'float');
        $this->schema()->columnType('item_type_1', 'float');
        $this->schema()->columnType('item_type_2', 'float');
        $this->schema()->columnType('item_type_3', 'float');
        $this->schema()->columnType('item_type_4', 'float');
    }

    public function upgrade($guildID) {
        $guildUpgradeTable = TableRegistry::get($this->table());
        for ($i=0; $i<4; $i++) {
            $guildUpgrade = $guildUpgradeTable->newEntity();
            $guildUpgrade->guild_id = $guildID;
            $guildUpgrade->type = $i;
            $guildUpgrade->level = $this->maxLevel;
            $guildUpgrade->progress = 0;
            $guildUpgrade->item_type_1 = $this->itemTypeValue;
            $guildUpgrade->item_neednum_1 = 0;
            $guildUpgrade->item_type_2 = $this->itemTypeValue;
            $guildUpgrade->item_neednum_2 = 0;
            $guildUpgrade->item_type_3 = $this->itemTypeValue;
            $guildUpgrade->item_neednum_3 = 0;
            $guildUpgrade->item_type_4 = $this->itemTypeValue;
            $guildUpgrade->item_neednum_4 = 0;

            $guildUpgradeTable->save($guildUpgrade);
        }
    }
}
