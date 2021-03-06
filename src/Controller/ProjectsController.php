<?php
// src/Controller/ProjectsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM;
use Cake\ORM\ResultSet;
use  Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;

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

        $mygroups = $this->Projects->Groups->find('list',[
            'keyField' => 'id',
            'valueField' => 'title',
            'order' => 'Groups.id ASC'
        ])->where(['owner' => $this->Auth->user('id')]);
        $mygroups = $mygroups->toArray();
        $this->set(compact('mygroups'));
    }
    public function questions($projectid)
    {
        $this->layout= 'projectview'; 
        $this->set('id',$projectid); 
        $projectquestions = $this->Projects->Questions->findAllByProjectId($projectid);
        $this->set('projectquestions',$projectquestions);
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
            'order' => array('projects.id' => 'desc')))
            ->contain(['Users','Skills','Bids'])
            ->where(['Projects.privacy' => 'All']));
        $this->set(compact('projects'));
    }
    public function mybids() 
    {
        $this->layout= 'validuser'; 
        $this->loadComponent('Paginator');
        $query  = $this->Projects->find('all',array(
            'order' => array('Bids.created' => 'desc')))->contain(['Users']);
        $query ->matching('Bids',function ($q) {
            return $q->where(['Bids.user_id' => $this->Auth->user('id')]);
        });
        $this->set('projectrequests',$query);
    }
    public function myprojects() 
    {
        $this->layout= 'validuser'; 
        $this->loadComponent('Paginator');
        $joinedprojects = $this->Projects->find('all')->select([
            'id_alias'=>'projects.id','slug'=>'projects.slug','short_title'=>'projects.short_title',
            'status'=>'projects.status','created'=>'projects.created',
            'user_id'=>'projects.user_id'
        ])->order(['projects.id'=> 'desc']);
        $joinedprojects->matching('Bids',function ($q) {
            return $q->where(['Bids.user_id' => $this->Auth->user('id')])
                    ->where(['Bids.status' => 'Accepted'])
                    ->order(['Projects.id'=> 'desc']);
        });
        $options = array(
            'conditions' => array(array('projects.user_id' => $this->Auth->user('id')),
                            array('projects.privacy !=' => 'Group'))
        );
        $this->loadComponent('Paginator');
        $myprojectsall = $this->Projects->find('all',$options)->select([
            'id_alias'=>'projects.id','slug'=>'projects.slug','short_title'=>'projects.short_title',
            'status'=>'projects.status','created'=>'projects.created',
            'user_id'=>'projects.user_id'
        ])->order(['projects.id'=> 'desc']);
        $connection = ConnectionManager::get('default');
        $myprojects = $myprojectsall->union($joinedprojects)->epilog(
            $connection
                ->newQuery()
                ->order(['id_alias' => 'desc'])
        );
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
            $this->request->getParam('action') === 'edit'||
            $this->request->getParam('action') === 'members'||
            $this->request->getParam('action') === 'projectmode'||
            $this->request->getParam('action') === 'request'||
            $this->request->getParam('action') === 'questions' ||
            $this->request->getParam('action') === 'myprojects'||
            $this->request->getParam('action') === 'mybids'  ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
    public function members($id = null)
    {
        $this->layout='validuser';
        if (!$id) {
            throw new NotFoundException(__('Invalid Project'));
        }
        else{
            $thisproject = $this->Projects->findById($id)->contain(['Users','Bids','Skills']);
            if (!$thisproject->count()) {
                throw new NotFoundException(__('Invalid post'));
            }
            else{
                $this->set('thisproject', $thisproject);
                $bidders = $this->Projects->Bids->findAllByProjectId($id)->contain(['Users'=>'Skills'])
                ->order(['Bids.id'=> 'desc']);
                $bidderscount = $bidders->count();
                $this->set(compact('bidders'));
                $this->set('bidderscount',$bidderscount);
            }          
        }
    }
    public function projectmode($id = null)
    {
        $this->layout='projectview';
        $this->set('id',$id);
        if (!$id) {
            throw new NotFoundException(__('Invalid Project'));
        }
        $thisproject = $this->Projects->findById($id)->contain(['Users','Bids','Skills']);
        if (!$thisproject) {
            throw new NotFoundException(__('Invalid post'));
        }
        foreach($thisproject as $currentproject){
            $thisprojectname = $currentproject->short_title;
        }
        $this->set('thisproject', $thisproject);
        $this->set('thisprojectname', $thisprojectname);

        $bidders = $this->Projects->Bids->findAllByProjectId($id)->contain(['Users'=>'Skills'])
        ->order(['Bids.id'=> 'desc']);
        $bidderscount = $bidders->count();
        $this->set(compact('bidders'));
        $this->set('bidderscount',$bidderscount);
    }
}
?>