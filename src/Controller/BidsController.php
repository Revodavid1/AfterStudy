<?php
// src/Controller/BidsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class BidsController extends AppController
{
    public function add($id)
    {
        $bid = $this->Bids->newEntity();
        if ($this->request->is('post')) {
            $bid = $this->Bids->patchEntity($bid, $this->request->getData());
            $bid->project_id = $id;
            $bid->status = 'Requested';
            $bid->user_id = $this->Auth->user('id');
            if ($this->Bids->save($bid)) {
                return $this->redirect(['controller'=>'projects','action' => 'index',
                '#' => 'myrequests', 'escape' => false]);
            }
            $this->Flash->error(__('Unable to add your bid.'));
        }
        $this->set('bid', $bid);
    }
    public function acceptbid($id)
    {
        $this->layout= 'validuser'; 
        $bidtoedit = $this->Bids->findById($id)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Bids->patchEntity($bidtoedit, $this->request->getData());
            $bidtoedit->status = 'Accepted';
            if ($this->Bids->save($bidtoedit)) {
                return $this->redirect($this->request->referer());
            }
        }
    }
    public function rejectbid($id)
    {
        $this->layout= 'validuser'; 
        $bidtoedit = $this->Bids->findById($id)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Bids->patchEntity($bidtoedit, $this->request->getData());
            $bidtoedit->status = 'Rejected';
            if ($this->Bids->save($bidtoedit)) {
                return $this->redirect($this->request->referer());
            }
        }
    }
    public function ignorebid($id)
    {
        $this->layout= 'validuser'; 
        $bidtoedit = $this->Bids->findById($id)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Bids->patchEntity($bidtoedit, $this->request->getData());
            $bidtoedit->status = 'Ignored';
            if ($this->Bids->save($bidtoedit)) {
                return $this->redirect($this->request->referer());
            }
        }
    }
    public function delete($id)
    {
        $this->layout= 'validuser'; 
        $this->request->allowMethod(['post', 'delete']);
        $bidtodelete = $this->Bids->findById($id)->firstOrFail();
        if ($this->Bids->delete($bidtodelete)) {
            $this->Flash->success(__('Your request has been deleted.'));
            return $this->redirect(['controller'=>'projects','action' => 'index',
                '#' => 'myrequests', 'escape' => false]);
        }
        else {
        $this->Flash->error(
            __('Reqeust not deleted'));
        }
    }   
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'add' ||
            $this->request->getParam('action') === 'delete'||
            $this->request->getParam('action') === 'acceptbid'
            ||
            $this->request->getParam('action') === 'rejectbid'||
            $this->request->getParam('action') === 'ignorebid' ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>