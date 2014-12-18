<?php

App::uses('AppController', 'Controller');
App::import('Lib', 'ImageUploader');

class AdminusersController extends AppController {

    public $name = 'Adminusers';
    public $uses = array('User');
    public $helpers = array('Paginator', 'Html', 'Form');
    public $components = array('Paginator', 'Session');

    public function beforeFilter() {
        $this->layout = 'bootstrap_admin';
        $session_user_admin = $this->Session->read(SESSION_USER_ADMIN);
        if (empty($session_user_admin) && $this->action != 'login') {
            $this->redirect(ADMIN_HOME_URL . 'login?returnurl=' . urlencode(RETURN_URL));
        }
    }

    public function index() {
        $searchword = isset($this->params['url']['searchword']) ? $this->params['url']['searchword'] : '';
        $searchfield = isset($this->params['url']['searchfield']) ? $this->params['url']['searchfield'] : '';
        $con = '';
        if (!empty($searchword)) {

            if ($searchfield == 'id_user') {
                $con = 'user.id_user like"%' . $searchword . '%"';
            } else {
                if ($searchfield == 'name') {
                    $con = 'user.username like"%' . $searchword . '%"';
                }
            }
            $con = 'user.id_user IN (select user.id_user from user where ' . $con . ')';
        }
        $this->paginate = array(
            'limit' => ROW_PER_PAGE,
            'order' => array('user.id_user' => 'asc'),
            'page' => 1
        );
        $this->set('searchfield', $searchfield);
        $data = $this->paginate('User', array($con));
        $this->set('Users', $data);
    }

    public function view($id = null) {
        $this->set('title_for_layout', ' Detail info User');
        $data = $this->User->find('first', array('conditions' => array('id_user' => $id)));
        if (isset($this->data['ok'])) {
            $this->redirect(ADMIN_ROOT_URL . 'adminusers/index');
            return;
        }
        if ($data) {
            $this->set('User', $data);
        } else {
            $msg = 'Not found this user!!';
            $this->Session->setFlash(GlobalVar::get_html_success($msg));
            $this->redirect(ADMIN_ROOT_URL . 'adminuser/index');
        }
    }

    public function edit($id = null) {
        $this->set('title_for_layout', ' Edit User');
        $success_message = '';
        if ($this->request->isPost()) {


            if (isset($this->data['cancel'])) {
                $this->redirect(ADMIN_ROOT_URL . 'adminusers/index');
                return;
            }
            if (isset($this->data['edituser'])) {

                if (isset($this->params['form']['image']['name']) && !empty($this->params['form']['image']['name'])) {

                    $new_name = $this->params['form']['image']['name'];
                    $uploader = new ImageUploader(IMAGE_UPLOAD_PATH_USER, $this->params['form']['image'], $id, $this->img_check_pattern);
                    $upload_result = $uploader->upload();
                    if (!$upload_result) {
                        $upload_image_err = $uploader->get_error_message();
                        $msg = "You can not upload images。";
                        $this->set('errors_image', $upload_image_err);
                    } else {
                        $img = $id . '.' . $this->img_check_pattern['ext'];
                        $this->User->save(array(
                            'id_user' => $id,
                            'avatar' => $img
                        ));
                    }
                }
                if (!empty($this->request->data('new_password'))) {
                    $pass = $this->request->data('new_password');
                } else {
                    $pass = $this->request->data('password');
                }
                if ($this->User->save(array(
                            'id_user' => $id,
                            'username' => $this->request->data('username'),
                            'password' => sha1($pass),
                            'birth' => $this->request->data('birth'),
                            'mail' => $this->request->data('mail'),
                            'sex' => $this->request->data('gender'),
                            'mail' => $this->request->data('mail'),
                            'facebook' => $this->request->data('facebook'),
                            'balance' => $this->request->data('balance'),
                            'created' => $this->request->data('created'),
                            'nearest' => $this->request->data('nearest')
                        ))) {
                    $success_message = 'Update succeed。';
                    $this->Session->setFlash(GlobalVar::get_html_success($success_message));
                } else {
                    $success_message = 'Update failed。';
                    $this->Session->setFlash(GlobalVar::get_html_success($success_message));
                }
            }
        }
        $userupdate = $this->User->find('first', array('conditions' => array('id_user' => $id)));
        $this->set('User', $userupdate);
    }

    public function add() {
        $this->set('title_for_layout', ' Add User');
        $success_message = '';
        if ($this->request->isPost()) {


            if (isset($this->data['cancel'])) {
                $this->redirect(ADMIN_ROOT_URL . 'adminusers/index');
                return;
            }
            if (isset($this->data['adduser'])) {

                if (isset($this->params['form']['image']['name']) && !empty($this->params['form']['image']['name'])) {

                    $new_name = $this->params['form']['image']['name'];
                    $uploader = new ImageUploader(IMAGE_UPLOAD_PATH_USER, $this->params['form']['image'], $this->request->data('id_user'), $this->img_check_pattern);
                    $upload_result = $uploader->upload();
                    if (!$upload_result) {
                        $upload_image_err = $uploader->get_error_message();
                        $msg = "You can not upload images。";
                        $this->set('errors_image', $upload_image_err);
                    } else {
                        $img = $this->request->data('id_user') . '.' . $this->img_check_pattern['ext'];
                        $this->User->save(array(
                            'id_user' => $this->request->data('id_user'),
                            'avatar' => $img
                        ));
                    }
                }

                if ($this->User->save(array(
                            'id_user' => $this->request->data('id_user'),
                            'username' => $this->request->data('username'),
                            'password' => sha1($this->request->data('password')),
                            'birth' => $this->request->data('birth'),
                            'mail' => $this->request->data('mail'),
                            'sex' => $this->request->data('gender'),
                            'mail' => $this->request->data('mail'),
                            'facebook' => $this->request->data('facebook'),
                            'balance' => $this->request->data('balance'),
                            'created' => $this->request->data('created'),
                            'nearest' => $this->request->data('nearest')
                        ))) {
                    $success_message = 'Add succeed。';
                    $this->Session->setFlash(GlobalVar::get_html_success($success_message));
                } else {
                    $success_message = 'Add failed。';
                    $this->Session->setFlash(GlobalVar::get_html_success($success_message));
                }
            }
        }
    }

    

}
