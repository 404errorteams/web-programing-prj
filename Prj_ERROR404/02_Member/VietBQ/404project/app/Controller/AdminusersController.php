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

    public function test() {
        $to = 'vietbq93@gmail.com';
        $subject = 'BẢN KIỂM ĐIỂM';

        $headers = 'From: buiquocviet1993@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


        $message = '<div style="text-align: center">
                <hr/>
                <div >
                    <img src="http://media.tumblr.com/tumblr_m325dewqtk1r7rd5w.jpg" >
                </div>
                <hr/>
                <h3><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></h3>
                <h4>Độc Lập - Tự Do - Hạnh Phúc</h4>
                <hr/>
                <br>
                <h2><b>BẢN KIỂM ĐIỂM</b></h2><br>
                <table style="border: solid black ; margin: auto">
                    <tbody style="border: solid black ;">
                        <tr >
                            <td style="width:250px;text-align: left"> 
                                <div style="margin-left: 5px">
                                    <b>
                                        <h4>Kính gửi 2 BGs yêu quý đã bắt I phải viết BKĐ này...</h4><br>
                                        But I chẳng biết là đã vi phạm lỗi gì cả @@.... 

                                    </b>
                                </div>
                                <br>
                            </td>
                            <td  style="border-left:  solid black ;width:250px">
                                <div style="margin-left: 5px">
                                    <b>
                                        Nhưng dù sao thì mình cũng xin hứa sẽ không vi pham lỗi mà các bạn đã nghĩ ra nữa <3
                                    </b>
                                </div>
                                <br>

                            </td>
                            <td  style="border-left:  solid black ;width:250px;text-align: right">
                                <div style="margin-right: 5px">
                                    <b>
                                        Nếu còn tái phạm .... thì sẽ chấp nhận mọi hình thức kỷ luật của 2 bạn ... Hihihi =)) @@
                                    </b>
                                    
                                </div>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td  >
                                <img height="250px" width="250px" src="https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10376827_685050488269531_2900817889190237809_n.jpg?oh=aed94f8f1415ddbebfe8aaf3c33cbcb8&oe=550C54CE&__gda__=1426454390_146b4d9f3ceb7844be61826496e88e79" >
                            </td>
                            <td  style="border-left:  solid black ;">
                                <img height="250px" width="250px" src="https://scontent-b-hkg.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/10393985_676053402510355_7252944416185274188_n.jpg?oh=df668ea0d1794067f7883081b5f832c7&oe=55194C4F" >
                            </td>
                            <td style="border-left:  solid black ;">
                                <img height="250px" width="250px" src="https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xfa1/v/t1.0-9/1901247_784536714925868_1310998140567156085_n.jpg?oh=afd9ce6ced476ac29cc8bcb656869b00&oe=550F2AF7&__gda__=1423475111_6e2083025a51a49ecbdf1740f328a922" >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <h2>Friendship flourishes at the fountain of forgiveness.</h2><br>
                                <i>William Arthur Ward</i>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr/>
                
<br><br>
            </div>-- 
Kind regards.<br>
===========================================<br>
   Bùi Quốc Việt   ˹ ブー　クオック　ヴィエット  ˼<br>
   Hanoi University of Science and Technology<br>
   Higher Education Development Support Project on ICT (HEDSPI)<br>
   Mobile: (+84)988 707 937<br>
   Email: buiquocviet1993@gmail.com<br>
   Skype: vietbq93<br>
===========================================<br><hr/>';
        $status = mail($to, $subject, $message, $headers);
        if (!$status) {
            $this->Session->setFlash('Sent email fail');
            $fail = 2;
        } else {
            $this->Session->setFlash('Sent email succeed');
        }
    }

}
