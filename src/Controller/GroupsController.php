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
    public function groupdetails($groupid) 
    {
        $this->layout= 'validuser'; 
        $thisgroup = $this->Groups->findById($groupid)->contain(['Admins'])->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Groups->patchEntity($thisgroup, $this->request->getData());
            if ($this->Groups->save($thisgroup)) {
                $this->Flash->success(__('Title updated successfully'));
                return $this->redirect(['action' => 'groupdetails',$groupid]);
            }
            $this->Flash->error(__('Unable to update your group title.'));
        }
        $this->set('thisgroup', $thisgroup);

        $thisgroupMembers = $this->Groups->findById($groupid)->contain(['Admins','Users']);
                /*look into restricting returned fields, currently throwing error
                ->contain(['Users'=> [
                    'fields' => [
                        'id',
                        'fullname']]
                    ]);*/
        $this->set('thisgroupMembers', $thisgroupMembers);
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
        $allgroups = $this->Paginator->paginate($this->Groups->find('all',array(
            'order' => array('groups.id' => 'desc')))->contain(['Admins'=>['fields'=>['fullname','id']]]));
        $this->set(compact('allgroups'));
    }

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'index' ||
            $this->request->getParam('action') === 'groupdetails') {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>