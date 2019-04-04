<?php
// src/Model/Table/groupsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class GroupsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Projects');
        $this->belongsToMany('Users',['joinTable' => 'groups_users','dependent' => true]);
        $this->addAssociations([
            'belongsTo' => [
                'Admins' => ['className' => 'App\Model\Table\UsersTable','foreignKey'=>'owner']
            ],
            'hasOne' => ['User']
        ]);
    }
}
