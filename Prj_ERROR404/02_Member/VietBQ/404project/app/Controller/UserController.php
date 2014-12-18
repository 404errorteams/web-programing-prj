<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('EbookController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('User', 'Model');

class UserController extends EbookController {

    public $name = 'User';
    public $uses = array('User');
    public $helpers = array('Paginator', 'Html', 'Form');
    public $components = array('Paginator', 'Session');

    public function login() {
        if ($this->request->isPost()) {
            $data = $this->request->data('login');
            if ($user = $this->User->find('first', array('conditions' => array('username' => $data['User']['email'], 'password' => md5($data['User']['password']))))) {
                $this->Session->write(SESSION_USER, $user['User']['username']); // save user to session   
                $this->Session->write(SESSION_ID_USER, $user['User']['id_user']); // save id user to session   
                $this->redirect(ROOT_URL . 'book/index');
            } else {
                 $this->Session->setFlash(GlobalVar::get_html_error('User or password is incorrect'));
                $this->redirect('register');
            }
        }
    }

    public function register() {
        if ($this->request->isPost()) {
            $data = $this->request->data('register');
            $active_code = $this->generate_active_code();
            $data['User']['active_code'] = $active_code;
            $data['User']['sex'] = (int) $data['User']['sex'];
            $Email = new CakeEmail('gmail');
            $Email->to($data['User']['mail'])
                    ->emailFormat('html')
                    ->template('register')->viewVars(array('username' => $data['User']['username'], 'active_code' => $data['User']['active_code']))
                    ->from(array('404ebook@gmail.com' => '404Ebook'))
                    ->subject('[404EBOOK] ACTIVE ACCOUNT');
            if ($Email->send()) {

                if ($this->User->save(array(
                            'id_user' => 'US' . $this->generate_id_user() . $this->generate_active_code(),
                            'username' => $data['User']['username'],
                            'password' => md5($data['User']['password']),
                            'mail' => $data['User']['mail'],
                            'sex' => (int) $data['User']['sex'],
                            'active_code' => $data['User']['active_code'],
                            'birth' => date("Y-m-d H:i:s")
                        ))) {
                    $this->Session->setFlash(GlobalVar::get_html_success('Register account successful'));
                } else {
                    $this->Session->setFlash(GlobalVar::get_html_error('Register account failed'));
                }
            } else {
                die('fail');
            }
        }
    }

    public function logout() {
        $this->Session->write(SESSION_USER, null);
        $this->redirect(ROOT_URL);
    }

    public function profile($id_user) {
        $user = $this->User->find('first', array('conditions' => array(
                'id_user' => $id_user
        )));
        $this->set('Profile', $user);
    }

    public function edit($id_user) {
        if ($this->request->isPost()) {
            $data = $this->request->data('user');
            $pass = $this->request->data('password');
            if ($pass != '') {
                $data['User']['password'] = md5($pass);
            }
            if ($this->User->save($data)) {
                $this->Session->setFlash(GlobalVar::get_html_success('Update profile successful'));
            } else {
                $this->Session->setFlash(GlobalVar::get_html_error('Update profile failed'));
            }
        }
        if ($user = $this->User->find('first', array('conditions' => array(
                'id_user' => $id_user
            )))) {
            $this->set('Profile', $user);
        } else {
            $this->redirect(ROOT_URL . 'book/index');
        }
    }

    private function generate_active_code() {
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $active_code = '';
        for ($i = 0; $i < $length; $i++) {
            $active_code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $active_code;
    }

    private function generate_id_user() {
        $length = 3;
        $characters = '0123456789';
        $active_code = '';
        for ($i = 0; $i < $length; $i++) {
            $active_code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $active_code;
    }

}
