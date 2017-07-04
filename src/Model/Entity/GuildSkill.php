<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GuildSkill Entity.
 */
class GuildSkill extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     * Note that '*' is set to true, which allows all unspecified fields to be
     * mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'guild_id' => false,
        'skill_id' => false,
    ];
}
