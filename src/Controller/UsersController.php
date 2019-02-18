<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function login()
    {
        $this->layout= 'home'; 

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    public function register()
    {
        $this->layout= 'home';
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->verified = 'yes';
            $user->email = $user->email.'@wildcats.unh.edu';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration saved successfully.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
    public function dashboard()
    {
        $this->layout = 'validuser';
        $logged_in_user = $this->Auth->user('fullname'); 

        $query = $this->Users->find()->innerJoinWith('Projects')
        ->select(['Users.id', 'Projects.User_id'])
        ->where(['Projects.User_id' =>$this->Auth->user('id')]);
        $myprojectcount = $query->count();
        $this->set('myprojectcount', $myprojectcount);
    }
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'register']);

    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    /*public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['register', 'logout']);
    }*/
    
}
?>