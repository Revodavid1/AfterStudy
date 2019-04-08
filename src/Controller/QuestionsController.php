<?php
// src/Controller/QuestionsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM;
use Cake\ORM\ResultSet;
use  Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class QuestionsController extends AppController
{
    public function add()
    {
        $this->layout= 'validuser'; 
        /*$project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());

            $project->user_id = $this->Auth->user('id');
            $project->status = 'Open';
            if ($this->Projects->save($project)) {
                //change redirect to my project to general view
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your project.'));
        }
        $this->set('project', $project);


        $allskills = $this->Projects->Skills->find('list',[
            'keyField' => 'id',
            'valueField' => 'skill_title',
            'order' => 'Skills.id ASC'
        ]);
        $this->set(compact('allskills'));

        $mygroups = $this->Projects->Groups->find('list',[
            'keyField' => 'id',
            'valueField' => 'title',
            'order' => 'Groups.id ASC'
        ])->where(['owner' => $this->Auth->user('id')]);
        $mygroups = $mygroups->toArray();
        $this->set(compact('mygroups'));*/
    }
    public function edit($slug)
    {
        $this->layout= 'validuser'; 
        $project = $this->Projects->findBySlug($slug)->contain(['Skills'])->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your project.'));
        }
        $allskills = $this->Projects->Skills->find('list',[
            'keyField' => 'id',
            'valueField' => 'skill_title',
            'order' => 'Skills.id ASC'
        ]);
        $this->set(compact('allskills'));
        $this->set('project', $project);
    }
    public function index() 
    {
        $this->layout= 'validuser'; 
        $this->loadComponent('Paginator');
        
         
    }

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'index' ||
            $this->request->getParam('action') === 'add' ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>