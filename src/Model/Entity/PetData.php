<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PetData Entity.
 *
 * @property int $pet_id
 * @property \App\Model\Entity\Pet $pet
 * @property string $pet_name
 * @property int $pet_value
 * @property int $pet_pm
 * @property int $master_id
 * @property \App\Model\Entity\Master $master
 * @property int $type_id
 * @property \App\Model\Entity\Type $type
 * @property bool $quality
 * @property int $aptitude
 * @property int $potential
 * @property int $cur_spirit
 * @property int $cur_exp
 * @property bool $step
 * @property bool $grade
 * @property int $talent_count
 * @property int $wuxing_energy
 * @property int $pet_state
 * @property bool $pet_lock
 * @property bool $RemoveFlag
 * @property int $birthday
 * @property int $live
 * @property int $lifeadded
 */
class PetData extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'pet_id' => false,
    ];
}
