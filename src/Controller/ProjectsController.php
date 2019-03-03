<?php
// src/Controller/ProjectsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM;
use Cake\ORM\ResultSet;
use  Cake\ORM\Table;

class ProjectsController extends AppController
{
    public function add()
    {
        $this->layout= 'validuser'; 
        $project = $this->Projects->newEntity();
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
        $projects = $this->Paginator->paginate($this->Projects->find('all',array(
            'order' => array('projects.id' => 'desc')))->contain(['Users','Skills','Bids']));
        $this->set(compact('projects'));

        $joinedprojects = $this->Projects->find('all')->select([
            'id','slug','short_title','status','created','user_id'
        ]);
        $joinedprojects->matching('Bids',function ($q) {
            return $q->where(['Bids.user_id' => $this->Auth->user('id')])
                    ->where(['Bids.status' => 'Accepted']);
        });
        $this->set(compact('joinedprojects'));
        $options = array(
            'conditions' => array('projects.user_id' => $this->Auth->user('id')),
            'order' => array('projects.id' => 'desc')
        );
        $this->loadComponent('Paginator');
        $myprojects = $this->Projects->find('all',$options)->select([
            'id','slug','short_title','status','created','user_id'
        ]);
        $myprojects->union($joinedprojects);
        $this->set(compact('myprojects'));

        $query  = $this->Projects->find('all',array(
            'order' => array('Bids.created' => 'desc')))->contain(['Users']);
        $query ->matching('Bids',function ($q) {
            return $q->where(['Bids.user_id' => $this->Auth->user('id')]);
        });
        $this->set('projectrequests',$query);
    }

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'index' || 
            $this->request->getParam('action') === 'add' ||
            $this->request->getParam('action') === 'edit'||
            $this->request->getParam('action') === 'manage'||
            $this->request->getParam('action') === 'request'  ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function manage($id = null)
    {
        $this->layout='validuser';
        if (!$id) {
            throw new NotFoundException(__('Invalid Project'));
        }
        $thisproject = $this->Projects->findById($id)->contain(['Users','Bids','Skills']);
        if (!$thisproject) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('thisproject', $thisproject);

        $bidders = $this->Projects->Bids->findAllByProjectId($id)->contain(['Users'=>'Skills'])
        ->order(['Bids.id'=> 'desc']);
        $this->set(compact('bidders'));
    }
}
?>