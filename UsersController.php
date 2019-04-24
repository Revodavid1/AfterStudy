<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;

class UsersController extends AppController
{
    
    public function login()
    {
        $this->layout= 'home'; 

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($user['verified'] == 'yes') {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                else{
                    $this->Flash->error('User not verified, Please verify your email');
                    return $this->redirect(['action' => 'verifyemail',$user['email']]);
                }
            }
            else{
                $this->Flash->error('Your username or password is incorrect.');
            }
        }

        
        
    }
    public function register()
    {
        $this->layout= 'home';
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->verified = 'no';
            $random_hash = md5(uniqid(rand(), true));
            $user->verify_code = $random_hash;
            //$user->email = $user->email.'@wildcats.unh.edu';
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration saved successfully. 
                                            A verification link has been sent to your email'));
                $email = new Email('dev');
                $email->setViewVars(['verify_code' => $random_hash]);
                $email->from(['easytaskdev@gmail.com' => 'EasyTasks'])
                        ->to('david_omu@yahoo.com')
                        ->template('welcome')
                        ->emailFormat('html')
                        ->subject('EasyTasks Verification')
                        ->send();
                return $this->redirect(['action' => 'verifyemail',$user->email]);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
    public function verifyemail($email){
        $this->layout= 'home';
        $verifyuser = $this->Users->findByEmail($email)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($verifyuser, $this->request->getData());
            if(!empty($verifyuser->v_code != '')){
                if($verifyuser->v_code == $verifyuser->verify_code){ 
                    $verifyuser->verified = 'yes';
                    if ($this->Users->save($verifyuser)) {
                        $this->Flash->success(__('Verified successfully.'));
                        return $this->redirect(['action' => 'login']);
                    }
                }
                else{
                    $this->Flash->error(__('Invalid code'));
                }
            }
        }
        $this->set('verifyuser', $verifyuser);
    }
    public function verifyme($token){
        $this->layout= 'home';
        $theuser = $this->Users->findByVerifyCode($token)->first();
        if($theuser){
            $theuser->verified = 'yes';
            if ($this->Users->save($theuser)) {
                $this->Flash->success(__('Verified successfully.'));
                return $this->redirect(['action' => 'login']);
            }
        }
        else{
            $this->Flash->error(__('Verification failed.'));
            return $this->redirect(['action' => 'login']);
        }
    }
    public function recoverpassword(){
        $this->layout= 'home';
        if ($this->request->is(['post','put'])) {
            $useremail = $this->request->getData('email');
            $random_hash = md5(uniqid(rand(), true));
            $theuser = $this->Users->findByEmail($useremail)->first();
            if ($theuser){
                $theuser->verify_code = $random_hash;
                if ($this->Users->save($theuser)) {
                    $email = new Email('dev');
                    $email->setViewVars(['random_hash' => $random_hash]);
                    $email->setViewVars(['name' => $theuser->fullname]);
                    $email->from(['easytaskdev@gmail.com' => 'EasyTasks'])
                            ->to($useremail)
                            ->template('resetpassword')
                            ->emailFormat('html')
                            ->subject('EasyTasks Password Reset')
                            ->send();
                    $this->Flash->success(__('Reset password code has been sent to your email '.$useremail.''));
                }
            }
            else{
                $this->Flash->error(__('Email not found'));
            }
        }    
    }
    public function resetpassword($token){
        $this->layout= 'home';
        if ($this->request->is(['post'])) {
            $userpassword = $this->request->getData('password');
            $theuser = $this->Users->findByVerifyCode($token)->first();
            $theuser->password = $userpassword;
            if ($this->Users->save($theuser)) {
                $this->Flash->success(__('Password reset successful'));
                return $this->redirect(['action' => 'login']);
            }
            else{
                $this->Flash->error(__('Unable to reset password'));
            }
        }
    }

    public function dashboard()
    {
        $this->layout = 'validuser';
        $logged_in_user = $this->Auth->user('fullname'); 

        //project count
        $query = $this->Users->find()->innerJoinWith('Projects')
        ->select(['Users.id', 'Projects.User_id'])
        ->where(['Projects.User_id' =>$this->Auth->user('id')]);
        $myprojectcount = $query->count();
        $this->set('myprojectcount', $myprojectcount);

        $requestedquery = $this->Users->find()->innerJoinWith('Bids')
        ->select(['Users.id', 'Bids.user_id'])
        ->where(['Bids.user_id' =>$this->Auth->user('id')]);
        $requestedprojectcount = $requestedquery->count();
        $this->set('requestedprojectcount', $requestedprojectcount);
        
        //group count
        $query = $this->Users->find()->innerJoinWith('Groups')
        ->select(['Users.id', 'Groups.owner'])
        ->where(['Groups.owner' => $this->Auth->user('id')]);
        $mygroupcount = $query->count();
        $this->set('mygroupcount', $mygroupcount);

        $skillsadd = $this->Users->findById($this->Auth->user('id'))->contain(['Skills'])->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($skillsadd, $this->request->getData());
            if ($this->Users->save($skillsadd)) {
                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('Unable to add skills'));
        }
        $allskills = $this->Users->Skills->find('list',[
            'keyField' => 'id',
            'valueField' => 'skill_title',
            'order' => 'Skills.id ASC'
        ]);
        $this->set(compact('allskills'));
        $this->set('skillsadd', $skillsadd);
    }
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'register','verifyemail','recoverpassword','resetpassword','verifyme']);

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