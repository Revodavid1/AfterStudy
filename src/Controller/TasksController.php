<?php
// src/Controller/TasksController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class TasksController extends AppController
{
    public function add($project_id)
    {
        $this->layout= 'projectview';
        $this->set('id',$project_id); 
        $newtask = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $newtask = $this->Tasks->patchEntity($newtask, $this->request->getData());
            $newtask->status = 'New';
            $newtask->project_id = $project_id;
            $newtask->created_by = $this->Auth->user('id');
            if ($this->Tasks->save($newtask)) {
                return $this->redirect(['action' => 'index',$project_id]);
            }
            $this->Flash->error(__('Unable to add your new task.'));
        }
        $this->set('newtask', $newtask);

        //gets individual project members
        $allmembers = $this->Tasks->Projects->Bids->find('list',[
            'keyField' => 'user_id',
            'valueField' => 'user.fullname',
            'order' => 'Users.fullname ASC'])
            ->contain(['Users'])
            ->where(['Bids.project_id' => $project_id])
            ->where(['Bids.status' => 'Accepted']);
        $allmembers = $allmembers->toArray();
        //add project owner to memberlist
        $individualprojectowner = $this->Tasks->Projects->findById($project_id)
            ->select(['Projects.user_id'])    
            ->contain(['Users'=> [
                'fields' => [
                    'id',
                    'fullname']]]);
        $individualprojectowner = $individualprojectowner->toArray();
        foreach ($individualprojectowner as $individualprojectowner){
            $allmembers[$individualprojectowner->user->id]=$individualprojectowner->user->fullname;
        } 
        //end -- add project owner to memberlist
        $this->set('allmembers',$allmembers);
        //end -- gets individual project members
        
        $thisprojectgroup = $this->Tasks->Projects->findById($project_id)
            ->select(['Projects.group_id']);
        $thisprojectgroup = $thisprojectgroup->toArray();
        foreach($thisprojectgroup as $thisprojectgroup){
            $thisgroup =  $thisprojectgroup->group_id;
        }

        if(!empty($thisgroup)){
            //gets project group members
            $thisgroupMembers = $this->Tasks->Projects->Groups->findById($thisgroup)->contain(['Admins','Users']);
            $groupMembersList= [];
            foreach ($thisgroupMembers as $thisgroupMember){
                $groupMembersList[$thisgroupMember->admin['id']] = $thisgroupMember->admin['fullname'];
            }
            foreach ($thisgroupMember->users as $othermembers){
                $groupMembersList[$othermembers['id']] = $othermembers['fullname'];
            }      
            //end -- gets project group members            
            $this->set('allmembers', $groupMembersList);
        }
        
        $alltasksgroups = $this->Tasks->Taskgroups->find('list',[
            'keyField' => 'id',
            'valueField' => 'title',
            'order' => 'title'])
            ->where(['project_id' => $project_id]);
        $alltasksgroups = $alltasksgroups->toArray();
        $this->set('alltasksgroups',$alltasksgroups);
    }
    public function all($project_id){
        $this->layout= 'projectview';
        $this->set('id',$project_id); 
        $this->loadComponent('Paginator');
        $projects_alltasks = $this->Paginator->paginate($this->Tasks->find('all')
        ->contain(['Assignees'=>['fields'=>['fullname','id']],'Taskgroups',
        'Creators' =>['fields'=>['fullname','id']]])
        ->where(['tasks.project_id' => $project_id])
        ->order('tasks.id DESC'));
        $this->set(compact('projects_alltasks'));
    }
    public function createdlist($project_id){
        $this->layout= 'projectview';
        $this->set('id',$project_id); 
        $this->loadComponent('Paginator');
        $mycreatedtasks = $this->Paginator->paginate($this->Tasks->find('all')
        ->contain(['Assignees'=>['fields'=>['fullname','id']],'Taskgroups',
        'Creators' =>['fields'=>['fullname','id']]])
        ->where(['tasks.project_id' => $project_id])
        ->where(['tasks.created_by' =>$this->Auth->user('id')])
        ->order('tasks.id DESC'));
        $this->set(compact('mycreatedtasks'));
    }
    public function edit($project_id,$task_id,$status)
    {
        $tasksTable = TableRegistry::get('Tasks');
        $currentTask = $tasksTable->get($task_id);
        $currentTask->status = $status;

        if ($tasksTable->save($currentTask)) {
            return $this->redirect($this->request->referer($project_id));
        }
    }
    public function index($project_id){
        $this->layout= 'projectview';
        $this->set('id',$project_id); 
        $this->loadComponent('Paginator');
        $projects_tasks = $this->Paginator->paginate($this->Tasks->find('all')
        ->contain(['Assignees'=>['fields'=>['fullname','id']],'Taskgroups',
                    'Creators' =>['fields'=>['fullname','id']]])
        ->where(['tasks.project_id' => $project_id])
        ->where(['tasks.assigned_to' =>$this->Auth->user('id')])
        ->order('tasks.id DESC'));
        $this->set(compact('projects_tasks'));
    }
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'add'||
            $this->request->getParam('action') === 'index'||
            $this->request->getParam('action') === 'all'||
            $this->request->getParam('action') === 'edit'||
            $this->request->getParam('action') === 'createdlist'||
            $this->request->getParam('action') === 'update' ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function update($project_id,$task_id)
    {
        $this->layout= 'projectview'; 
        $this->set('id',$project_id); 
        $edittask = $this->Tasks->findById($task_id)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Tasks->patchEntity($edittask, $this->request->getData());
            if ($this->Tasks->save($edittask)) {
                return $this->redirect(['action' => 'createdlist',$project_id]);
            }
            $this->Flash->error(__('Unable to update your project.'));
        }
        $this->set('edittask', $edittask);

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
}
?>