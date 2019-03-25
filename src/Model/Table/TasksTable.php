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
        /*$this->belongsTo('Users')
        ->setForeignKey([
            'created_by',
            'assigned_to'
        ])
        ->setBindingKey([
            'id',
            'id'
        ]);*/
        $this->addAssociations([
            'belongsTo' => [
                'Creators' => ['className' => 'App\Model\Table\UsersTable',
                            'foreignKey'=>'created_by']
            ],
            'hasOne' => ['Creator']
        ]);
        $this->addAssociations([
            'belongsTo' => [
                'Assignees' => ['className' => 'App\Model\Table\UsersTable','foreignKey'=>'assigned_to']
            ],
            'hasOne' => ['Assignee']
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
