<?php

App::import('Sanitize');
App::uses('AppController', 'Controller');
App::import('Lib', 'ImageUploader');

class AdminauthorController extends AppController {

    public $name = 'Adminauthor';
    public $helpers = array('Paginator', 'Html', 'Form');
    public $components = array('Paginator', 'Session');
    public $uses = array('Author', 'Wrote');
    protected $img_check_pattern = array('ext' => 'jpg', 'size' => '5000x5000');

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

            if ($searchfield == 'id_author') {
                
                $con = 'author.id_author like"%' . $searchword . '%"';
            } else {
                if ($searchfield == 'name') {
                    $con = 'author.name like"%' . $searchword . '%"';
                }
            }
            $con = 'Author.id_author IN (select author.id_author from author where ' . $con . ')';
        }
        $this->paginate = array(
            'limit' => ROW_PER_PAGE,
            'order' => array('Author.id_authors' => 'asc'),
            'page' => 1
        );
        $this->set('searchfield', $searchfield);
        $data = $this->paginate('Author', array($con));
        
        $this->set('Authors', $data);
    }

    public function add() {
        $this->set('title_for_layout', ' Add Author');
        $success_message = '';
        if ($this->request->isPost()) {


            if (isset($this->data['cancel'])) {
                $this->redirect(ADMIN_ROOT_URL . 'adminauthor/index');
                return;
            }
            if (isset($this->data['addauthor'])) {
                if ($this->Author->find('first', array('conditions' => array('id_author' => $this->request->data('id_author'))))) {
                    $success_message = 'This Id already exists。';
                    $this->Session->setFlash(GlobalVar::get_html_success($success_message));
                } else {
                    $img = '';
                    if (isset($this->params['form']['image']['name']) && !empty($this->params['form']['image']['name'])) {

                        $new_name = $this->params['form']['image']['name'];
                        $uploader = new ImageUploader(IMAGE_UPLOAD_PATH_AUTHOR, $this->params['form']['image'], $this->request->data('id_author'), $this->img_check_pattern);
                        $upload_result = $uploader->upload();
                        if (!$upload_result) {
                            $upload_image_err = $uploader->get_error_message();

                            $this->set('errors_image', $upload_image_err);
                        } else {
                            $img = $this->request->data('id_author') . '.' . $this->img_check_pattern['ext'];
                        }
                    }

                    $result = $this->Author->save(array(
                        'id_author' => $this->request->data('id_author'),
                        'name' => $this->request->data('name'),
                        'biography' => $this->request->data('biography'),
                        'img' => $img
                    ));
                    if ($result) {
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

    public function edit($id = null) {
        $this->set('title_for_layout', ' Edit Author');

        $success_message = '';
        if ($this->request->isPost()) {


            if (isset($this->data['cancel'])) {
                $this->redirect(ADMIN_ROOT_URL . 'adminauthor/index');
                return;
            }
            if (isset($this->data['editauthor'])) {

                if (isset($this->params['form']['image']['name']) && !empty($this->params['form']['image']['name'])) {

                    $new_name = $this->params['form']['image']['name'];
                    $uploader = new ImageUploader(IMAGE_UPLOAD_PATH_AUTHOR, $this->params['form']['image'], $id, $this->img_check_pattern);
                    $upload_result = $uploader->upload();
                    if (!$upload_result) {
                        $upload_image_err = $uploader->get_error_message();
                        $msg = "You can not upload images。";
                        $this->set('errors_image', $upload_image_err);
                    } else {
                        $img = $id . '.' . $this->img_check_pattern['ext'];
                        $this->Author->save(array(
                            'id_author' => $id,
                            'img' => $img
                        ));
                    }
                }

                $this->Author->save(array(
                    'id_author' => $id,
                    'name' => $this->request->data('name'),
                    'biography' => $this->request->data('biography')
                ));
                $success_message = 'Update succeed。';
                $this->Session->setFlash(GlobalVar::get_html_success($success_message));
            }
        }
        $authorupdate = $this->Author->find('first', array('conditions' => array('id_author' => $id)));
        $this->set('Author', $authorupdate);
    }

    public function del() {
        $this->autoRender = FALSE;
        $reselt = $this->Author->find('first', array('conditions' => array('id_author' => $this->request->data('id'))));
        if (isset($reselt['Author']['img']) && !empty($reselt['Author']['img'])) {
            $img_name = IMAGE_UPLOAD_PATH_AUTHOR . $reselt['Author']['img'];
            if (file_exists($img_name)) {
                unlink($img_name);
            }
        }
        $wrotes = $this->Wrote->find('all', array('conditions' => array('id_author' => $this->request->data('id'))));
        {
            foreach ($wrotes as $wrote) {
                $this->Wrote->set(array(
                    'id_author' => $wrote['Wrote']['id_author'],
                    'id_book' => $wrote['Wrote']['id_book']
                ));
                $this->Wrote->delete();
            }
        }
        $this->Author->set(array(
            'id_author' => $this->request->data('id')
        ));


        $this->Author->delete();

        echo json_encode(array("ret" => "OK"));
        exit();
    }

}
