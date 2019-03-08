<?php
// src/Controller/TaskgroupsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class TaskgroupsController extends AppController
{
    public function add($project_id)
    {
        $this->layout= 'projectview';
        $this->set('id',$project_id); 
        $newtaskgroup = $this->Taskgroups->newEntity();
        if ($this->request->is('post')) {
            $newtaskgroup = $this->Taskgroups->patchEntity($newtaskgroup, $this->request->getData());
            $newtaskgroup->project_id = $project_id;
            $newtaskgroup->created_by = $this->Auth->user('id');
            if ($this->Taskgroups->save($newtaskgroup)) {
                return $this->redirect($this->request->referer());
            }
            $this->Flash->error(__('Unable to add your use case.'));
        }
        $this->set('newtaskgroup', $newtaskgroup);
    }
    public function index($project_id) 
    {
        $this->layout= 'projectview'; 
        $this->set('id',$project_id);
        $this->loadComponent('Paginator');
        $projects_taskgroups = $this->Paginator->paginate($this->Taskgroups->find('all')
        ->where(['project_id' => $project_id]));
        $this->set(compact('projects_taskgroups'));
        
    }
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'add' ||
            $this->request->getParam('action') === 'index'||
            $this->request->getParam('action') === 'view' ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function view($project_id,$taskgroup_id) 
    {
        $this->layout= 'projectview'; 
        $this->set('id',$project_id);
        $this->loadComponent('Paginator');
        $this_taskgroup = $this->Paginator->paginate($this->Taskgroups->findById($taskgroup_id));
        $this->set(compact('this_taskgroup'));
    }
}
?>