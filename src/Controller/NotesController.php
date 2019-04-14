<?php
// src/Controller/QuestionsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM;
use Cake\ORM\ResultSet;
use  Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;

class NotesController extends AppController
{
    public function add($projectid)
    {
        $this->layout= 'projectview'; 
        $this->set('id',$projectid); 
        $projectid = $projectid;
        $newNote = $this->Notes->newEntity();
        if ($this->request->is('post')) {
            $newNote = $this->Notes->patchEntity($newNote, $this->request->getData());
            $newNote->user_id = $this->Auth->user('id');
            $newNote->project_id = $projectid;
            $newNote->note = str_replace(array("\r\n", "\n", "\r"), ' ',addslashes($newNote->note));
            if ($this->Notes->save($newNote)) {
                $this->Flash->success(__('Your note has been saved.'));
                //change to my question list
                return $this->redirect(['action' => 'view',$projectid]);
            }
            $this->Flash->error(__('Unable to add your note.'));
        }
        $this->set('newNote',$newNote);
    }
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'add' ||
            $this->request->getParam('action') === 'view') {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function view($projectid)
    {
        $this->layout= 'projectview'; 
        $this->set('id',$projectid); 
        $projectid = $projectid;
        $allnotes = $this->Notes->findAllByProjectId($projectid)
                    ->order(['Notes.id'=>'desc'])
                    ->contain(['Users'=>['fields'=>['fullname','id']]]);
        $this->set('allnotes',$allnotes);  
    }
}
?>