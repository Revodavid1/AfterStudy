<?php
// src/Controller/TasksController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class TasksController extends AppController
{
    public function add($project_id)
    {
        $this->layout= 'projectview';
        $this->set('id',$project_id); 
        $newtask = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $newtask = $this->Tasks->patchEntity($newtask, $this->request->getData());
            $newtask->status = 'new';
            $newtask->project_id = $project_id;
            $newtask->created_by = $this->Auth->user('id');
            if ($this->Tasks->save($newtask)) {
                return $this->redirect($this->request->referer());
            }
            $this->Flash->error(__('Unable to add your new task.'));
        }
        $this->set('newtask', $newtask);

        $allmembers = $this->Tasks->Projects->Bids->find('list',[
            'keyField' => 'user_id',
            'valueField' => 'user.fullname',
            'order' => 'Users.fullname ASC'])
            ->contain(['Users'])
            ->where(['Bids.project_id' => $project_id])
            ->where(['Bids.status' => 'Accepted']);
        $allmembers = $allmembers->toArray();
        $this->set('allmembers',$allmembers);

        $alltasksgroups = $this->Tasks->Taskgroups->find('list',[
            'keyField' => 'id',
            'valueField' => 'title',
            'order' => 'title'])
            ->where(['project_id' => $project_id]);
        $alltasksgroups = $alltasksgroups->toArray();
        $this->set('alltasksgroups',$alltasksgroups);
    }
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'add' ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>