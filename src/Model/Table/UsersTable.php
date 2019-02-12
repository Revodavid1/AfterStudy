<?php
// src/Model/Table/usersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Projects');
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('email', 'An email is required')
            ->notEmpty('password', 'A password is required')
                ->add('password', [
                    'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'Passwords must be at least 2 characters long.',
                ]
            ])
            ->notEmpty('fullname', 'A full name is required')
            ->notEmpty('phone', 'A phone number is required')
            ->notEmpty('zip_code', 'A zip code is required')
            ->notEmpty('dob', 'A date of birth is required')
            ->notEmpty('major', 'A major is required')
            ->notEmpty('class_standing', 'A class standing is required')
            ->notEmpty('residential_status', 'A residential status is required')
            ->notEmpty('country_of_origin', 'A country of origin status is required')
            ->notEmpty('state_resident', 'A state of resident of origin status is required');
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']),['message' => 'Email currently exists']);
        return $rules;
    }
}
