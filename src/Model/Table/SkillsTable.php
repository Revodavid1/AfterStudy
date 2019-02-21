<?php
// src/Model/Table/SkillsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\Utility\Text;

class SkillsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsToMany('Projects');
    }
}
