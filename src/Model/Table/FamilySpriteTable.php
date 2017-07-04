<?php
namespace App\Model\Table;

use App\Model\Entity\FamilySprite;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * FamilySprite Model
 *
 */
class FamilySpriteTable extends Table
{

    private $upgradedSprite = [
        'Level' => 100,
        'Exp'   => 125000,
        'HP'    => 100000,
        'EXAttack'  => 3515,
        'InAttack'  => 3515,
        'EXDefense' => 6327,
        'InDefense' => 6327,
        'EXAttackDeeper'    => 350,
        'InAttackDeeper'    => 350,
        'EXAttackResistance'=> 600,
        'InAttackResistance'=> 600,
        'Toughness' => 410,
        'CritDes'   => 4100,
        'ControleffectDeepen'  => 126,
        'ControleffectResistance'  => 84,
        'SlowingeffectDeepen'   => 126,
        'SlowingeffectResistance'   => 84,
        'FixedeffectDeepen' => 126,
        'FixedeffectResistance' => 84,
        'AgingeffectDeepen' => 126,
        'AgingeffectResistance' => 84
    ];


    public static function defaultConnectionName() {
        return 'sm_db';
    }

    private function getUpgradedSprite() {
        return $this->upgradedSprite;
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

        $this->table('family_sprite');
        $this->displayField('FamilyID');
        $this->primaryKey('FamilyID');
        $this->schema()->columnType('FamilyID', 'float');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('FamilyID', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('FamilyID', 'create');

        $validator
            ->add('Level', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Level', 'create')
            ->notEmpty('Level');

        $validator
            ->requirePresence('Exp', 'create')
            ->notEmpty('Exp');

        $validator
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->add('HP', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('HP');

        $validator
            ->add('EXAttack', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('EXAttack');

        $validator
            ->add('InAttack', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('InAttack');

        $validator
            ->add('EXDefense', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('EXDefense');

        $validator
            ->add('InDefense', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('InDefense');

        $validator
            ->add('EXAttackDeeper', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('EXAttackDeeper');

        $validator
            ->add('InAttackDeeper', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('InAttackDeeper');

        $validator
            ->add('EXAttackResistance', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('EXAttackResistance');

        $validator
            ->add('InAttackResistance', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('InAttackResistance');

        $validator
            ->add('Toughness', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('Toughness');

        $validator
            ->add('CritDes', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('CritDes');

        $validator
            ->add('ControleffectDeepen', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ControleffectDeepen');

        $validator
            ->add('ControleffectResistance', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ControleffectResistance');

        $validator
            ->add('SlowingeffectDeepen', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('SlowingeffectDeepen');

        $validator
            ->add('SlowingeffectResistance', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('SlowingeffectResistance');

        $validator
            ->add('FixedeffectDeepen', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('FixedeffectDeepen');

        $validator
            ->add('FixedeffectResistance', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('FixedeffectResistance');

        $validator
            ->add('AgingeffectDeepen', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('AgingeffectDeepen');

        $validator
            ->add('AgingeffectResistance', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('AgingeffectResistance');

        return $validator;
    }

    public function upgrade($familyID) {
        $familySprite = TableRegistry::get('family_sprite');
        $familySprite->find()->update()
            ->set($this->getUpgradedSprite())
            ->where(['FamilyID' => $familyID])
            ->execute();
    }
}
