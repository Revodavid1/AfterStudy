<?php
// src/Model/Table/tasksTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\Utility\Text;

class TasksTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->addAssociations([
            'belongsTo' => [
                'Users' => ['className' => 'App\Model\Table\UsersTable']
            ],
            'hasOne' => ['User']
        ]);
        $this->addAssociations([
            'belongsTo' => [
                'Projects' => ['className' => 'App\Model\Table\ProjectsTable']
            ],
            'hasOne' => ['Project']
        ]);
        $this->addAssociations([
            'belongsTo' => [
                'Taskgroups' => ['className' => 'App\Model\Table\TaskgroupsTable']
            ],
            'hasOne' => ['Taskgroup']
        ]);
    }
}
