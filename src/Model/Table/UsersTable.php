<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 */

class UsersTable extends Table
{

    public static function defaultConnectionName() {
        return 'wizard_db';
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

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator->notEmpty('username');
        $validator->add('username', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table',
            'message' => __('This username has already been taken')
        ]);
        $validator->add('username', 'length', [
            'rule' => ['lengthBetween', 3, 50],
            'message' => __('Username length should be from 3 to 50 characters')
        ]);
        $validator->notEmpty('password');
        $validator->add('password', 'length', [
            'rule' => ['lengthBetween', 4, 50],
            'message' => __('Password length should be from 4 to 50 characters')
        ]);
        $validator->notEmpty('role');
        $validator->add('role', 'inList', [
            'rule' => ['inList', ['admin', 'view']],
            'message' => __('Please enter a valid role')
        ]);

        $validator->notEmpty('password2');
        $validator->add('password2', [
            'compare' => [
                'rule' => function($value, $context) {
                    return $value == $context['data']['password'];
                },
                'message' => __('Passwords not equal')
            ]
        ]);

        return $validator;
    }

}