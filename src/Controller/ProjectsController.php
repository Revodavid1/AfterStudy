<?php
// src/Controller/ProjectsController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ProjectsController extends AppController
{
    public function index()
    {
        $this->layout= 'validuser'; 

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    
}
?>