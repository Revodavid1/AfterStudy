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
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            $question->user_id = $this->Auth->user('id');
            $question->openclose = 'opened';
            $question->answered = 0;
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('Your Question has been saved.'));
                //change to my question list
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your question.'));
        }
        $this->set('question', $question); 
        $tags = $this->Questions->Tags->find('list');
        $this->set('tags', $tags); 

        $mycreatedprojects = $this->Questions->Projects->find('list',[
            'keyField' => 'id',
            'valueField' => 'short_title',
            'order' => 'Projects.id ASC'
        ])->where(['Projects.user_id' =>$this->Auth->user('id')]);
        $mycreatedprojects = $mycreatedprojects->toArray();
        $this->set('mycreatedprojects',$mycreatedprojects);

        $myjoinedprojects = $this->Questions->Projects->Bids->find('list',[
            'keyField' => 'project_id',
            'valueField' => 'project.short_title',
            'order' => 'project_id ASC'
        ])->contain(['Projects'])->where(['Bids.status' => 'Accepted']);
        $myjoinedprojects->leftJoinWith('Users')->where(['Users.id' => $this->Auth->user('id')]);
        $myjoinedprojects = $myjoinedprojects->toArray();

        $mygroupsandprojects = $this->Questions->Projects->Groups->find()->contain(['Projects']);
        $mygroupsandprojects->leftJoinWith('Users')->where(['Users.id' => $this->Auth->user('id')]);
        foreach($mygroupsandprojects as $mygroupsandproject){
            foreach($mygroupsandproject->projects as $groupproject){
                $projectlist[$groupproject->id] = $groupproject->short_title;
            }
        }
        $allmyprojects = $mycreatedprojects + $myjoinedprojects + $projectlist;
        asort($allmyprojects);
        $this->set('myprojects', $allmyprojects); 
    }
    public function edit($slug)
    {
        $this->layout= 'validuser'; 
        
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