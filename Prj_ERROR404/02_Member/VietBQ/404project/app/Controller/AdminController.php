<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Admin';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    public function index() {
        $session_user_admin = $this->Session->read(SESSION_USER_ADMIN);
        if ($session_user_admin) {
           
            $this->redirect(ADMIN_ROOT_URL . 'adminauthor/index');
        } else {
            $this->redirect(ADMIN_HOME_URL . 'login');
        }
    }
    
    public function a() {
        $this->autoRender = false;
        echo 13;
        exit;
    }

    public function login() {
        if (isset($this->request->query['returnurl'])) {//$this->request['url']['returnurl']
            $returnurl = $this->request->query['returnurl'];
        } else {
            $returnurl = ADMIN_HOME_URL;
        }
        $session_user_admin = $this->Session->read(SESSION_USER_ADMIN);
        if ($session_user_admin) {
            $this->redirect($returnurl);
            return;
        }
        $this->set('returnurl', $returnurl);

        // If login (submit) button is press
        if ($this->request->isPost()) {
            $admin_access_list_arr = GlobalVar::read("admin_access_list_arr");

            $username = $this->data['username'];
            $password = sha1($this->data['password']);
            if (isset($this->data['returnurl']))
                $returnurl = $this->data['returnurl'];

            if (isset($admin_access_list_arr[$username]) && $admin_access_list_arr[$username] == $password) {
                $this->Session->write(SESSION_USER_ADMIN, $username); // save user to session   
                $this->redirect($returnurl);
            } 
        }
    }

    public function logout() {
        $this->Session->write(SESSION_USER_ADMIN, null);
        $this->redirect(ADMIN_HOME_URL);
    }

}