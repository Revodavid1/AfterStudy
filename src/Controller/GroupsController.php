<?php
// src/Controller/GroupsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM;
use Cake\ORM\ResultSet;
use  Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class GroupsController extends AppController
{
    public function addproject($groupid,$owner)
    {
        $this->layout= 'validuser'; 
        $groupid = $groupid;
        $groupproject = $this->Groups->Projects->newEntity();
        if ($this->request->is('post')) {
            $groupproject = $this->Groups->Projects->patchEntity($groupproject, $this->request->getData());

            $groupproject->user_id = $this->Auth->user('id');
            $groupproject->status = 'Open';
            $groupproject->collaborators = 0;
            $groupproject->privacy = 'Group';
            $groupproject->group_id = $groupid;
            if ($this->Groups->Projects->save($groupproject)) {
                //change redirect to my project to general view
                return $this->redirect(['action' => 'groupdetails',$groupid,$owner]);
            }
            $this->Flash->error(__('Unable to add your project.'));
        }
        $this->set('groupproject', $groupproject);
    }
    public function groupdetails($groupid,$owner) 
    {
        $this->layout= 'validuser';
        $this->set('groupid', $groupid);
        $this->set('owner', $owner);  
        $thisgroup = $this->Groups->findById($groupid)->contain(['Admins'])->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Groups->patchEntity($thisgroup, $this->request->getData());
            if ($this->Groups->save($thisgroup)) {
                $this->Flash->success(__('Successfully Updated'));
                return $this->redirect(['action' => 'groupdetails',$groupid,$owner]);
            }
            $this->Flash->error(__('Update Error.'));
        }
        $this->set('thisgroup', $thisgroup);

        $thisgroupMembers = $this->Groups->findById($groupid)->contain(['Admins','Users']);
        if ($this->request->is(['post', 'put'])) {
            $this->Groups->patchEntity($thisgroupMembers, $this->request->getData());
            if ($this->Groups->save($thisgroupMembers)) {
                $this->Flash->success(__('Successfully Updated'));
                return $this->redirect(['action' => 'groupdetails',$groupid,$owner]);
            }
            $this->Flash->error(__('Update Error'));
        }
        $this->set('thisgroupMembers', $thisgroupMembers);

        //rename, this is for listing who to add to the group from all users, minus the owner
        $allusers = $this->Groups->Users->find('list',[
            'keyField' => 'id',
            'valueField' => 'fullname',
            'order' => 'Users.fullname ASC'
        ])->where(['Users.id !='=>$owner]);
        $this->set(compact('allusers'));

        $options = array(
            'conditions' => array('projects.group_id' => $groupid)
        );
        $mygroupsproject = $this->Groups->Projects->find('all',$options)->select([
            'id_alias'=>'projects.id','slug'=>'projects.slug','short_title'=>'projects.short_title',
            'status'=>'projects.status','created'=>'projects.created',
            'user_id'=>'projects.user_id'
        ])->order(['projects.id'=> 'desc']);
        $this->set(compact('mygroupsproject'));

    }

    public function index() 
    {
        $this->layout= 'validuser'; 
        $this->loadComponent('Paginator');
        $addgroup = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $addgroup = $this->Groups->patchEntity($addgroup, $this->request->getData());
            $addgroup->owner = $this->Auth->user('id');
            if ($this->Groups->save($addgroup)) {
                $this->Flash->success(__('Your group has been created.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your project.'));
        }
        $this->set('addgroup', $addgroup);

        $this->layout= 'validuser'; 
        $this->loadComponent('Paginator');
        $ownedgroups = $this->Groups->find('all',array(
            'order' => array('groups.id' => 'desc')))
            ->where(['owner' => $this->Auth->user('id')])
            ->contain(['Admins'=>['fields'=>['fullname','id']]]);
        $groupsIBelong = $this->Groups->find()->contain(['Admins'=>['fields'=>['fullname','id']]]);
        $groupsIBelong->leftJoinWith('Users')
        ->where(['Users.id' => $this->Auth->user('id')]);
        $connection = ConnectionManager::get('default');
        $allgroups = $ownedgroups->union($groupsIBelong)->epilog(
            $connection
                ->newQuery()
        );

        $this->set('allgroups',$allgroups);
    }

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'index' ||
            $this->request->getParam('action') === 'groupdetails'||
            $this->request->getParam('action') === 'addproject') {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>