<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('EbookController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class TestController extends EbookController {

    public function test_email() {
        $Email = new CakeEmail('gmail');
        $Email->to('buiquocviet1993@gmail.com')
                ->emailFormat('html')
                ->template('register')->viewVars(array('username' => 'VietBui', 'active_code' => 'VIET', 'id' => 10))
                ->from(array('test5codeloves@gmail.com' => 'Sugutomo'))
                ->subject('[SUGUTOMO] ACTIVE CODE');
        if ($Email->send()) {
            die('OK');
        } else {
            die('fail');
        }
    }

}
