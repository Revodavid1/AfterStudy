<?php
// src/Model/Table/QuestionsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\Utility\Text;

class QuestionsTable extends Table
{
    
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Tags');
        $this->addAssociations([
            'belongsTo' => [
                'Projects' => ['className' => 'App\Model\Table\ProjectsTable']
            ],
            'hasOne' => ['Project']
        ]);
        $this->addAssociations([
            'belongsTo' => [
                'Users' => ['className' => 'App\Model\Table\UsersTable']
            ],
            'hasOne' => ['User']
        ]);
    }
}
