<?php
// src/Controller/UsecasesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsecasesController extends AppController
{
    public function add($project_id)
    {
        $this->layout= 'projectview'; 
        $newusecase = $this->Usecases->newEntity();
        if ($this->request->is('post')) {
            $newusecase = $this->Usecases->patchEntity($newusecase, $this->request->getData());
            $newusecase->project_id = $project_id;
            $newusecase->created_by = $this->Auth->user('id');
            if ($this->Usecases->save($newusecase)) {
                return $this->redirect($this->request->referer());
            }
            $this->Flash->error(__('Unable to add your use case.'));
        }
        $this->set('newusecase', $newusecase);
    }
    public function index($project_id) 
    {
        $this->layout= 'projectview'; 
        $this->set('id',$project_id);
        $this->loadComponent('Paginator');
        $projects_usecases = $this->Paginator->paginate($this->Usecases->find('all')
        ->where(['project_id' => $project_id]));
        $this->set(compact('projects_usecases'));
        
    }
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'add' ||
            $this->request->getParam('action') === 'index' ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>