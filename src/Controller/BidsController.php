<?php
// src/Controller/BidsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class BidsController extends AppController
{
    public function add($id)
    {
        $this->layout= 'validuser'; 
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
            $this->Flash->error(__('Unable to update your project.'));
        }
        $this->set('bid', $bid);
    }

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function isAuthorized($user) {
        if ($this->request->getParam('action') === 'add' ) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
?>