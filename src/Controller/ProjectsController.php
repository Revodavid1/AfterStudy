<?php
// src/Controller/ProjectsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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
        $project = $this->Projects->findBySlug($slug)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your project.'));
        }

        $this->set('project', $project);
    }
    public function index() 
    {
        $this->layout= 'validuser'; 
        $this->loadComponent('Paginator');
        $projects = $this->Paginator->paginate($this->Projects->find('all',array(
            'order' => array('projects.id' => 'desc')))->contain(['Users']));
        $this->set(compact('projects'));

        $options = array(
            'conditions' => array('projects.user_id' => $this->Auth->user('id')),
            'order' => array('projects.id' => 'desc')
        );
        $this->loadComponent('Paginator');
        $myprojects = $this->Paginator->paginate($this->Projects->find('all',$options));
        $this->set(compact('myprojects'));
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
            $this->request->getParam('action') === 'edit'  ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>