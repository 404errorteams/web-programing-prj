<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
require_once '../../lib/Cake/Model/ConnectionManager.php';
App::import('Lib', 'ImageUploader');
class AdminbookController extends AppController {

    public $name = 'Adminbook';
    public $uses = array('Book', 'Author', 'Wrote', 'OfCategory');
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
        $this->set('title_for_layout', "Book's listing ");
        $searchword = isset($this->params['url']['searchword']) ? $this->params['url']['searchword'] : '';
        $searchfield = isset($this->params['url']['searchfield']) ? $this->params['url']['searchfield'] : '';
        $this->set('searchword', $searchword);
        $this->set('searchfield', $searchfield);
        $con = '';
        if ($searchword != '') {
            $item_search = GlobalVar::read('search_book');
            $v = $item_search[$searchfield];
            if ($con == '') {
                $con = $con . " ( book." . $v . " like '%" . $searchword . "%' ) ";
            }
            $con = " Book.id_book IN ( select id_book from book where " . $con . " )";
        }

        $this->Paginator->settings = array(
            'fields' => array(
                'Book.id_book',
                'Book.img',
                'Book.price',
                'Book.name',
                'wrote.id_author',
                'Author.name'
            ),
            'joins' => array(
                array(
                    'table' => 'wrote',
                    'alias' => 'Wrote',
                    'foreignKey' => false,
                    'conditions' => array('book.id_book = Wrote.id_book')
                ),
                array(
                    'table' => 'author',
                    'alias' => 'Author',
                    'foreignKey' => false,
                    'conditions' => array('author.id_author = wrote.id_author')
                ),
            ),
            'conditions' => array(
                'Book.id_book = wrote.id_book',
            ),
            'limit' => ROW_PER_PAGE,
            'page' => 1,
        );
        $data = $this->Paginator->paginate('Book', array($con));
        $this->set('Books', $data);
    }

    public function add() {
        $this->set('title_for_layout', 'Add Book');
        if ($this->request->isPost()) {

            if ($this->Author->find('first', array('conditions' => array('id_author' => $this->request->data['id_author'])))) {
                if (!$this->Book->find('first', array('conditions' => array('id_book' => $this->request->data['id_book'])))) {

                    if (isset($this->params['form']['image']['name']) && !empty($this->params['form']['image']['name'])) {
                        $new_name = $this->params['form']['image']['name'];
                        $uploader = new ImageUploader(IMAGE_UPLOAD_PATH_BOOK, $this->params['form']['image'], $this->request->data('id_user'), $this->img_check_pattern);
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
                        if ($this->Wrote->save(array(
                                    'id_author' => $this->request->data('id_author'),
                                    'id_book' => $this->request->data('id_book')
                                ))) {
                            $remain = $this->request->data('price') * (100 - $this->request->data('remain')) / 100;
                            if (!$this->request->data('adult')) {
                                $adult = 0;
                            } else {
                                $adult = $this->request->data('adult');
                            }
                            if (!$this->request->data('ebook')) {
                                $adult = 0;
                            } else {
                                $adult = $this->request->data('ebook');
                            }
                            if ($this->request->data('book')) {
                                $adult = 1;
                            } else {
                                $adult = $this->request->data('book');
                            }
                            if ($this->Book->save(array(
                                        'id_book' => $this->request->data('id_book'),
                                        'name' => $this->request->data('name'),
                                        'description' => $this->request->data('description'),
                                        'descriptionpro' => $this->request->data('descriptionpro'),
                                        'description404' => $this->request->data('description404'),
                                        'sale'=> $this->request->data('remain'),
                                        'price' => $this->request->data('price'),
                                        'remain' => $remain,
                                        'adult' => $this->request->data('adult'),
                                        'ebook' => $this->request->data('ebook'),
                                        'book' => $this->request->data('book'),
                                    ))) {
                                $this->Session->setFlash(GlobalVar::get_html_success("Add Book succeed"));
                                $this->redirect(ADMIN_ROOT_URL . 'adminbook/index');
                                exit();
                            } else {
                                $this->Session->setFlash(GlobalVar::get_html_error("This author's id  not existed "));
                                exit();
                            }
                        } else {
                            $this->Session->setFlash(GlobalVar::get_html_error("This author's id  not existed "));
                            exit();
                        }
                    }
                }
            } else {
                $this->Session->setFlash(GlobalVar::get_html_error("This author's id  not existed "));
                exit();
            }
        }
    }

    public function del() {
        $this->autoRender = FALSE;
        $id = $this->request->data['id'];
        $this->Book->set(array(
            'id_book' => $id
        ));
        $this->Book->delete();
        echo json_encode(array("ret" => "OK"));
        exit();
    }

    public function sent() {
        $Email = new CakeEmail();
        $Email->config('gmail');
        $Email->from(array('buiquocviet1993@gmail.com' => 'My Site'))
                ->to('vietbq93@gmail.com')
                ->subject('Test')
                ->send('My message');
    }

}
