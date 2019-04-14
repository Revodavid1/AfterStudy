<?php
// src/Model/Table/ProjectsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\Utility\Text;

class ProjectsTable extends Table
{
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->short_title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Skills',['joinTable' => 'projects_skills','dependent' => true]);
        $this->hasMany('Bids');
        $this->hasMany('Taskgroups');
        $this->hasMany('Questions');
        $this->hasMany('Notes');
        $this->addAssociations([
            'belongsTo' => [
                'Users' => ['className' => 'App\Model\Table\UsersTable']
            ],
            'hasOne' => ['User']
        ]);
        $this->addAssociations([
            'belongsTo' => [
                'Groups' => ['className' => 'App\Model\Table\GroupsTable']
            ],
            'hasOne' => ['Group']
        ]);
    }
}
