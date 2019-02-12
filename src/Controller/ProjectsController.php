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

    }
    public function index()
    {
        $this->layout= 'validuser'; 
        $this->loadComponent('Paginator');
        $projects = $this->Paginator->paginate($this->Projects->find());
        $this->set(compact('projects'));
    }
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->Auth->allow(['add', 'index']);
    }
    
}
?>